<?php include("init.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login_page.php"); ?>

<?php

if (isset($_POST['submit'])) {
	$comment = new Comment();

	$comment = $comment->iterate_post($_POST);


	if($comment->save()) {
		$session->message = "The comment to photo id '$comment->photo_id' successfully created";
		redirect("admin/comments.php");

	}

}
?>
