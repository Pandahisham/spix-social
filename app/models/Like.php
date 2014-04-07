<?php

/**
 * Model responsible for friends
 */
class Like extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'likes';

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
		'user_id'=>'required',
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
	public function comment()
	{
		return $this->belongsTo('Comment');
	}

}
