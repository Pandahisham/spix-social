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
			echo '<p>'.$comment->body.'</p>';
			echo '<footer>'.$comment->user->email.', '.$comment->created_at.'</footer>';
			echo '</blockquote>';
		}

	}

}
