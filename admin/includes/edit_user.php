<?php include("init.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login_page.php"); ?>

<?php
$user = '';
if (empty($_GET['id'])) {
	redirect("admin/users.php");
} else {
	$user = User::get_by_id($_GET['id']);
}
if(isset($_POST['delete'])) {
	File::delete_file($user->upload_dir, $user->avatar);
	$user->delete();
	$session->message("User id - '$user->id' successfully deleted ");
	redirect("admin/users.php");
}

if (isset($_POST['submit'])) {
	if ($user = User::get_by_id($_GET['id'])) {
		$edited_user = $user->iterate_post($_POST);
		if ($_FILES['new_avatar_file']['error'] === 0) {

			if(!empty($user->avatar)) {
				File::delete_file($user->upload_dir, $user->avatar);
			}

			$edited_user->avatar = $_FILES['new_avatar_file']['name'];
			$file = new File($edited_user->upload_dir);
			$file->init($_FILES['new_avatar_file']);
			$file->upload();
		}
		if($edited_user->save()) {
			$session->message = "The user $edited_user->username has successfully edited";
			redirect("admin/edit_user_page.php/?id=$edited_user->id");
		}
	}


}
?>
