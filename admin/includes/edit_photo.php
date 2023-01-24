<?php include("includes/init.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login_page.php"); ?>

<?php
	empty($_GET['id']) ?? redirect('admin/photos.php');
	if ($photo = Photo::get_by_id($_GET['id'])) {
		$photo->delete_photo();
}
	redirect("admin/photos.php");
?>
