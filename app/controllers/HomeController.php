<?php

/**
 * Controller responsible for home page
 */
class HomeController extends BaseController {

	/**
	 * Method responsible for render content page
	 *
	 * GET: /
	 */
	public function getHome()
	{

		// Check if user is authenticated
		if (Auth::check())
		{

			// Check if will reorder the timeline
			// Retrieving all the posts available
			if(Input::get('order_by') == 'user')
			{
				$timelines = Timeline::where('user_id', '=', Auth::user()->id)
								->orderBy('user_id', 'desc')
								->get();
			}

			else
			{
				$timelines = Timeline::where('user_id', '=', Auth::user()->id)
								->orderBy('created_at', 'desc')
								->get();
			}

			// Path: app/views/home.blade.php
			$this->layout->content = View::make('home')
										->with('timelines', $timelines);

		}

		// Otherwise
		else {

			// Path: app/views/home.blade.php
			$this->layout->content = View::make('home');

		}

	}

}
