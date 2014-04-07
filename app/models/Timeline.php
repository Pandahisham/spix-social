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
		'body'=>'required',
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
	 * Method responsible for retrieve all the timeline order order by created at
	 *
	 * @todo As soon as possible try to apply a better Eloquent::Relationships
	 */
	public static  function orderByUser($id)
	{

		// Retrieving all the friends available
		$friends = Friend::where('user_id', '=', $id)
						->lists('has_friendship');

		// Fix SQL WHERE condition
		$friends = (count($friends) > 0) ? $friends : [0];

		// Retrieving all the timeline available
		$timelines = Timeline::orderBy('user_id', 'desc')
						->where('user_id', '=', $id)
						->orWhere(function($query)
						{
							$query->where('privacy', '=', 'ANYONE');
						})
						->orWhere(function($query)
						{
							$friends = Friend::where('user_id', '=', Auth::user()->id)->lists('has_friendship');
							$friends = (count($friends) > 0) ? $friends : [0];
							$query->where('privacy', '=', 'ME_FRIENDS');
							$query->whereIn('user_id', $friends);
						})
						->get();

		// Dispatch it!
		return $timelines;

	}

	/**
	 * Method responsible for retrieve all the timeline order by created at
	 *
	 * @todo As soon as possible try to apply a better Eloquent::Relationships
	 */
	public static function orderByCreatedAt($id)
	{

		// Retrieving all the timeline available
		$timelines = Timeline::orderBy('created_at', 'desc')
						->where('user_id', '=', $id)
						->orWhere(function($query)
						{
							$query->where('privacy', '=', 'ANYONE');
						})
						->orWhere(function($query)
						{
							$friends = Friend::where('user_id', '=', Auth::user()->id)->lists('has_friendship');
							$friends = (count($friends) > 0) ? $friends : [0];
							$query->where('privacy', '=', 'ME_FRIENDS');
							$query->whereIn('user_id', $friends);
						})
						->get();

		// Dispatch it!
		return $timelines;

	}

}
