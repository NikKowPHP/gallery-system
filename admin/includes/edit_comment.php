<?php include("init.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login_page.php"); ?>
<?php
$comment = '';
if (empty($_GET['id'])) {
	redirect("admin/comments.php");
} else {
	$comment = Comment::get_by_id($_GET['id']);
}
if (isset($_POST['delete'])) {
	$comment->delete();
	redirect("admin/comments.php");
} elseif ($_GET['delete']) {
	$comment->delete();
	$photo_id = $_GET['p_id'];
	redirect("admin/comments.php/?id=$photo_id");

}

if (isset($_POST['submit'])) {
	$edited_comment = $comment->iterate_post($_POST);
	if ($edited_comment->save()) {
		$session->message = "The comment $edited_comment->id has successfully edited";
		redirect("admin/edit_comment_page.php/?id=$edited_comment->id");
	}
}
?>
