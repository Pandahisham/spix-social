<?php

/**
 * Controller
 */
class PersonsController extends \BaseController {

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
	 * Method
	 */
	public function index()
	{

		// Retrieving all the persons available
		$persons = User::all();

		// Path: app/views/home.blade.php
		$this->layout->content = View::make('persons.index')
									->with('persons', $persons);

	}

	/**
	 * Method
	 */
	public function show($id)
	{
	}

}
