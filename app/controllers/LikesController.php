<?php

class LikesController extends \BaseController {

	/**
	 * Method responsible for store likes
	 *
	 * POST: likes
	 */
	public function store()
	{

		// Create a new like
		$like = new Like;

		$like->user_id = Auth::user()->id;

		if (Input::get('timeline_id') != null)
		{
			$like->timeline_id = Input::get('timeline_id');
		}

		if (Input::get('comment_id') != null)
		{
			$like->comment_id = Input::get('comment_id');
		}

		$like->save();

		// GET: timelines
		return Redirect::to('timelines')
				->with('message_info', 'Thanks for the like');

	}

}
