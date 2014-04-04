<?php

class BaseController extends Controller {

	/**
	 * Property responsible for define the default layout
	 *
	 * Path: app/views/layouts/main.blade.php
	 */
	protected $layout = 'layouts.main';

	/**
	 * Method responsible for setup the layout used by the controller.
	 */
	protected function setupLayout()
	{

		// Set Layout
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

	}

	/**
	 * Method responsible for bootstrap Controller
	 */
	public function __construct()
	{

		// Controller Filter
		$this->beforeFilter('csrf', array('on'=>'post',));

	}

}