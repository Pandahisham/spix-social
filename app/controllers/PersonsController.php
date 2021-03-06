<?php

/**
 * Controller responsible for persons on Spix Social
 */
class PersonsController extends \BaseController {

	/**
	 * Method responsible for list all the persons
	 *
	 * GET: persons
	 */
	public function index()
	{

		// Retrieving all the persons available
		$persons = User::all();

		// Path: app/views/persons/index.blade.php
		$this->layout->content = View::make('persons.index')
									->with('persons', $persons);

	}

	/**
	 * Method responsible for show the person
	 *
	 * GET: persons/{id}
	 */
	public function show($id)
	{

		// Retrieving the person available
		$person = User::find($id);

		// Retrieving the friendship
		$friendship = Friend::where('user_id', '=', Auth::user()->id)
						->where('has_friendship', '=', $person->id)
						->get();

		// Path: app/views/persons/show.blade.php
		$this->layout->content = View::make('persons.show')
									->with('person', $person)
									->with('friendship', $friendship);

	}

}
