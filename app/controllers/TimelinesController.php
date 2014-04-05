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

		// Retrieving all the friends available
		$friends = Friend::where('user_id', '=', Auth::user()->id)
						->lists('has_friendship');

		// Check if will reorder the timeline
		// Retrieving all the posts available
		if(Input::get('order_by') == 'user')
		{
			$timelines = Timeline::orderBy('user_id', 'desc')
							->where('user_id', '=', Auth::user()->id)
							->orWhereIn('user_id', $friends)
							->get();
		}

		// Otherwise
		else
		{
			$timelines = Timeline::orderBy('created_at', 'desc')
							->where('user_id', '=', Auth::user()->id)
							->orWhereIn('user_id', $friends)
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
					->with('message_info', 'You make me feel so up to date');

		}

		// Otherwise
		else
		{

			// GET: timelines
			return Redirect::to('timelines')
						->with('message_warning', 'Ops, you tried to tell me something?')
						->withErrors($validator)
						->withInput();

		}

	}

}
