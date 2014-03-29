<?php

/**
 * Model responsible for timeline
 */
class Timeline extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'timelines';

	/**
	 * Mass Assignment
	 */
	protected $fillable = [];

	/**
	 * Property responsible for validations
	 *
	 * @see http://laravel.com/docs/validation#available-validation-rules
	 */
	public static $rules = array(
		'body'=>'required'
	);

	/**
	 * Method responsible for a relation
	 *
	 * @see http://laravel.com/docs/eloquent#relationships
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

}
