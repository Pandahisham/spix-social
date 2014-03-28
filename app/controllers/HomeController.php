<?php

/**
 * Controller responsible for home page
 */
class HomeController extends BaseController {

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
	 * Method responsible for render content page
	 *
	 * GET: /
	 */
	public function getHome()
	{

		// Path: app/views/home.blade.php
		$this->layout->content = View::make('home');

	}

}
