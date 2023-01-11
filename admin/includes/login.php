<?php

require_once("init.php");

if ($session->is_signed_in()) {
	redirect("index.php");
}

if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);


	$user_found = User::verify_user($username, $password);

	if (!is_null($user_found)) {
		$session->login($user_found);
		redirect("admin/index.php");
	} else {
		$_SESSION['msg'] = "password or username is not correct";
		redirect("login_page.php");
	}
} else {
	$username = "";
	$password = "";
}


