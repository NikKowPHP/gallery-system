<?php include("includes/init.php"); ?>

<?php
	if (!$session->is_signed_in()) redirect("login_page.php");

$photo = Photo::get_by_id($_GET['id']);
$photo->delete();
redirect("admin/photos.php");




?>
