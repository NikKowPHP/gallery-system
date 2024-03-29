<?php

require_once("init.php");

if ($session->is_signed_in()) {
	redirect("index.php");
}

if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (!is_null($user_found)) {
		$session->login($user_found);
		redirect("admin/index.php");
	} else {
		$session->message("Entered the wrong password or username");
		redirect("login_page.php");
	}
} else {
	$username = "";
	$password = "";
}


