<?php

/**
 * Helper responsible for abstract some elements from View
 */
class CommentsHelper {

	/**
	 * Method responsible for render a list of comments
	 */
	public static function listComments($timeline_id) {

		// Get content file
		$resource = file_get_contents('http://localhost/spix-social/public/comments/'.$timeline_id);

		// Decode into JSON object
		$comments = json_decode($resource);

		// Dump!
		foreach ($comments as $comment) {

			echo '<hr />';
			echo '<blockquote>';

			// Comment
			echo '<p>'.$comment->body.'</p>';
			echo '<footer>'.$comment->user->email.', '.$comment->created_at.'</footer>';

			// Like
			echo '<br />';
			echo Form::open(array('url'=>'likes'));
			echo Form::hidden('comment_id', $comment->id);
			echo Form::submit('Like', array('class'=>'btn btn-default'));
			echo Form::close();

			echo '</blockquote>';

		}

	}

}
