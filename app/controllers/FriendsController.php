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
						->orderBy('has_friendship', 'desc')
						->get();

		// Path: app/views/friends/index.blade.php
		$this->layout->content = View::make('friends.index')
		 							->with('friends', $friends);

	}

	/**
	 * Method
	 */
	public function show($id)
	{
	}

}
