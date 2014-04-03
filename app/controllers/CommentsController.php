<?php

/**
 * Controller responsible for comments on timeline
 */
class CommentsController extends \BaseController {

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
	 * Method responsible for store the new comment on post from timeline
	 *
	 * POST: comments
	 */
	public function store()
	{

		// Validate the inputs on HTML form
		$validator = Validator::make(Input::all(), Comment::$rules);

		// Check if validation passed
		if ($validator->passes())
		{

			// Create a new comment
			$comment = new Comment;
			$comment->body = Input::get('body');
			$comment->timeline_id = Input::get('timeline_id');
			$comment->user_id = Auth::user()->id;
			$comment->save();

			// GET: /
			return Redirect::to('/')
					->with('message', 'Thanks for the feedback.');

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
	 * Method responsible for show the comments on post from timeline
	 *
	 * GET: /comments/{id}
	 */
	public function show($id)
	{

		// Retrieving all the comments available
		$comments = Comment::with('user')
						->where('timeline_id', '=', $id)
						->get();

		// JSON \o/
		return Response::json($comments);

	}

	/**
	 * @todo Task to be started
	 */
	public function destroy($id)
	{
	}

}
