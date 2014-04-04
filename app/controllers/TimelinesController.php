<?php

/**
 * Controller responsible for timeline
 */
class TimelinesController extends \BaseController {

	/**
	 * Method responsible for render all timeline
	 *
	 * GET: timelines
	 */
	public function index()
	{

		// Check if will reorder the timeline
		// Retrieving all the posts available
		if(Input::get('order_by') == 'user')
		{
			$timelines = Timeline::where('user_id', '=', Auth::user()->id)
							->orderBy('user_id', 'desc')
							->get();
		}

		// Otherwise
		else
		{
			$timelines = Timeline::where('user_id', '=', Auth::user()->id)
							->orderBy('created_at', 'desc')
							->get();
		}

		// Path: app/views/timelines/index.blade.php
		$this->layout->content = View::make('timelines.index')
									->with('timelines', $timelines);

	}

	/**
	 * Method responsible for store the new post on timeline
	 *
	 * POST: timelines
	 */
	public function store()
	{

		// Validate the inputs on HTML form
		$validator = Validator::make(Input::all(), Timeline::$rules);

		// Check if validation passed
		if ($validator->passes())
		{

			// Create a new timeline
			$timeline = new Timeline;
			$timeline->body = Input::get('body');
			$timeline->user_id = Auth::user()->id;
			$timeline->save();

			// GET: timelines
			return Redirect::to('timelines')
					->with('message', 'You make me feel so up to date.');

		}

		// Otherwise
		else
		{

			// GET: timelines
			return Redirect::to('timelines')
						->with('message', 'Ops, you tried to tell me something?')
						->withErrors($validator)
						->withInput();

		}

	}

}
