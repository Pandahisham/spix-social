<?php

/**
 * Controller responsible for friends on Spix Social
 */
class FriendsController extends \BaseController {

	/**
	 * Method responsible for list all the friends
	 *
	 * GET: friends
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

			// Create a new friend
			$friend = new Friend;
			$friend->user_id = Input::get('user_id');
			$friend->has_friendship = Input::get('has_friendship');
			$friend->save();

			// GET: persons
			return Redirect::to('persons/'.$friend->has_friendship)
					->with('message_info', 'Nice to meet you');

		}

		// Otherwise
		else
		{

			// GET: persons
			return Redirect::to('persons')
						->with('message_warning', 'Ops, you tried to be my friend?')
						->withErrors($validator)
						->withInput();

		}

	}

}
