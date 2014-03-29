<?php

/**
 * Controller responsible for timeline
 */
class TimelinesController extends \BaseController {

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
	 * Method responsible for store the new post on timeline
	 *
	 * POST: timeline
	 */
	public function store()
	{

		// Validate the inputs on HTML form
		$validator = Validator::make(Input::all(), Timeline::$rules);

		// Check if validation passed
		if ($validator->passes())
		{

			// Create a new post
			$timeline = new Timeline;
			$timeline->body = Input::get('body');
			$timeline->user_id = Auth::user()->id;
			$timeline->save();

			// GET: /
			return Redirect::to('/')
					->with('message', 'You make me feel so up to date.');

		}

		// Otherwise
		else
		{

			// GET: /
			return Redirect::to('/')
						->with('message', 'Ops, you tried to tell me something?')
						->withErrors($validator)
						->withInput();

		}

	}

	/**
	 * @todo Task to be started
	 */
	public function destroy($id)
	{
	}

}
