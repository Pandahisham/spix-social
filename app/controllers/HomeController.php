<?php

/**
 * Controller responsible for home page
 */
class HomeController extends BaseController {

	/**
	 * Method responsible for render content page
	 *
	 * GET: /
	 */
	public function index()
	{

		// Path: app/views/home/index.blade.php
		$this->layout->content = View::make('home.index');

	}

}
