<?php

/**
 * Controller responsible for home page
 */
class HomeController extends BaseController {

	/**
	 * Property responsible for define the default layout
	 *
	 * Path: app/views/layouts/main.blade.php
	 */
	protected $layout = 'layouts.main';

	/**
	 * Method responsible for bootstrap Controller
	 */
	public function __construct()
	{

		// Controller Filter
		$this->beforeFilter('csrf', array('on'=>'post'));

	}

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

			// Retrieve all the timeline available
			$timelines = Timeline::where('user_id', '=', Auth::user()->id)
							->orderBy('created_at', 'desc')
							->get();

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
