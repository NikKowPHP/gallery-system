<?php include("includes/init.php"); ?>
<?php if (!$session->is_signed_in()) redirect("login_page.php"); ?>

<?php
	empty($_GET['id']) ?? redirect('admin/users.php');
	if ($user = User::get_by_id($_GET['id'])) {
		$user->delete();
}
	redirect("admin/users.php");
?>
