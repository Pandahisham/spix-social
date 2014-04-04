<?php

/**
 * Controller responsible for friends on Spix Social
 */
class FriendsController extends \BaseController {

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
	 * Method responsible for list all the friends
	 *
	 * GET: /friends
	 */
	public function index()
	{

		// Retrieving all the friends available
		$friends = Friend::where('user_id', '=', Auth::user()->id)
						->with('friend')
						->orderBy('has_friendship', 'desc')
						->get();

		// Path: app/views/friends/index.blade.php
		$this->layout->content = View::make('friends.index')
		 							->with('friends', $friends);

	}

	/**
	 * Method responsible for store the friendship
	 *
	 * POST: friends
	 */
	public function store()
	{

		// Validate the inputs on HTML form
		$validator = Validator::make(Input::all(), Friend::$rules);

		// Check if validation passed
		if ($validator->passes())
		{

			// Create a new post
			$friend = new Friend;
			$friend->user_id = Input::get('user_id');
			$friend->has_friendship = Input::get('has_friendship');
			$friend->save();

			// GET: /
			return Redirect::to('/')
					->with('message', 'Nice to meet you!');

		}

		// Otherwise
		else
		{

			// GET: /
			return Redirect::to('/persons')
						->with('message', 'Ops, you tried to be my friend?')
						->withErrors($validator)
						->withInput();

		}

	}

}
