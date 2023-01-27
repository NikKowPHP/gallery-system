<?php include("init.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login_page.php"); ?>

<?php

if (isset($_POST['submit'])) {
	$user = new User();
	echo "<pre>";
	print_r($_FILES['avatar_file']);
	echo "</pre>";

	if ($_FILES['avatar_file']['error'] === 0) {
		$user->avatar = $_FILES['avatar_file']['name'];
		$file = new File($user->upload_dir);
		$file->init($_FILES['avatar_file']);
		$file->upload();
	}
	$user = $user->iterate_post($_POST);
	echo "<pre>";
	print_r($user);
	echo "</pre>";

	if($user->save()) {
		$session->message = "The user $user->username successfully created";
		redirect("admin/users.php");

	}

}
?>
