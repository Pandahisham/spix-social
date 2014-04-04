<?php

/**
 * Model responsible for friends
 */
class Friend extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'friends';

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
		'has_friendship'=>'required'
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
	public function friend()
	{
		return $this->belongsTo('User', 'has_friendship');
	}

}
