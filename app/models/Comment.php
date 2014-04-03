<?php

/**
 * Model responsible for comments on timeline
 */
class Comment extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

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
		'body'=>'required',
		'timeline_id'=>'required'
	);

	/**
	 * Method responsible for a relation
	 *
	 * @see http://laravel.com/docs/eloquent#relationships
	 */
	public function timeline()
	{
		return $this->belongsTo('Timeline');
	}

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
