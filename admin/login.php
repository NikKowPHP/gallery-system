<?php
require_once("init.php");
echo "<h1>This is the login page</h1>";

if ($session->is_signed_in()) {
	redirect("index.php");
}

if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);


	$user_found = User::verify_user($username, $password);

	if (!is_null($user_found)) {
		$session->login($user_found);
		redirect("index.php");
	} else {
		$msg = "Password or username are incorrect";
	}
} else {
	$username = "";
	$password = "";
}
