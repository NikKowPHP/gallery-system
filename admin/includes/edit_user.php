<?php include("init.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login_page.php"); ?>

<?php
if (empty($_GET['id'])) redirect("admin/users.php");

if (isset($_POST['submit'])) {
	if ($user = User::get_by_id($_GET['id'])) {
		$edited_user = $user->iterate_post($_POST);
// TODO: AVATAR UPLOAD AND DELETE
//		if ($_FILES['new_photo_upload']['size'] !== 0) {
//			if (file_exists($user->unlink_path())) {
//				unlink($user->unlink_path());
//			}
//			$edited_user->set_file($_FILES['new_photo_upload']);
//			$edited_user->update_file();
//		}
		$edited_user->save();
		redirect("admin/edit_user_page.php/?id=$edited_user->id");
	}


}
?>
