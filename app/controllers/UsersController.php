<?php

/**
 * Controller responsible for authentication
 */
class UsersController extends \BaseController {

	/**
	 * Method responsible for render sign up page
	 *
	 * GET: users/signup
	 */
	public function getSignup()
	{

		// Path: app/views/users/signup.blade.php
		$this->layout->content = View::make('users.signup');

	}

	/**
	 * Method responsible for render log in page
	 *
	 * GET: users/login
	 */
	public function getLogin()
	{

		// Path: app/views/users/login.blade.php
		$this->layout->content = View::make('users.login');

	}

	/**
	 * Method responsible for log out process
	 *
	 * GET: users/logout
	 */
	public function getLogout()
	{

		// Kill the session :-P
		Auth::logout();

		// GET: /
		return Redirect::to('/')
					->with('message', 'See you dude.');

	}

	/**
	 * Method responsible for sign up process
	 *
	 * POST: users/signup
	 */
	public function postSignup()
	{

		// Validate the inputs on HTML form
		$validator = Validator::make(Input::all(), User::$rules);

		// Check if validation passed
		if ($validator->passes())
		{

			// Create a user
			$user = new User;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			// GET: users/login
			return Redirect::to('users/login')
						->with('message', 'At last, type your new account.');

		}

		// Otherwise
		else
		{

			// GET: users/signup
			return Redirect::to('users/signup')
						->with('message', 'Ops, the following erros ocurred.')
						->withErrors($validator)
						->withInput();

		}

	}

	/**
	 * Method responsible for log in process
	 *
	 * POST: users/login
	 */
	public function postLogin()
	{

		// Check if authentication passed
		if (Auth::attempt(

				// Getting the inputs on HTML form
				array(
					'email'=>Input::get('email'),
					'password'=>Input::get('password')
				)

			)
		)
		{

			// GET: /
			return Redirect::to('/')
						->with('message', 'What is up dude.');

		}

		// Otherwise
		else {

			// GET: users/login
			return Redirect::to('users/login')
						->with('message', 'Ops, your credential is incorrect.');

		}

	}

}
