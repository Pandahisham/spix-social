<?php

/**
 * Model responsible for timeline
 */
class Timeline extends \Eloquent {

	/**
	 * Mass Assignment
	 */
	protected $fillable = [];

	/**
	 * Property responsible for validations
	 */
	public static $rules = array(
		'body'=>'required'
	);

}
