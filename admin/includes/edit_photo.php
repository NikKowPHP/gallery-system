<?php include("init.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login_page.php"); ?>


<?php

// DELETE THE OLD ONE AND UPDATE NEW ONE
if (isset($_POST['submit'])) {
	if ($photo = Photo::get_by_id($_GET['id'])) {
		$edited_photo = $photo->iterate_post($_POST);

		if ($_FILES['new_photo_upload']['size'] !== 0) {
			if (file_exists($photo->unlink_path())) {
				unlink($photo->unlink_path());
			}
			$edited_photo->set_file($_FILES['new_photo_upload']);
			$edited_photo->update_file();
		}
		$edited_photo->save();
	}


	redirect("admin/edit_photo_page.php/?id=$edited_photo->id");


}
?>
