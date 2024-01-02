<?php
use Models\Session;
use Models\User;
use Models\Location;
require_once(__DIR__."/../../autoload.php");
require_once(__DIR__ . "/../utils/functions.php");

$session = new Session();


if ($session->is_signed_in()) {
	Location::redirect("admin/index.php");
}

if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);


	$user_found = User::verify_user($username, $password);

	if (!is_null($user_found)) {
		$session->login($user_found);
		Location::redirect("admin/index.php");
	} else {
		$user = new User();
		$user->iterate_post($_POST);
		display_pretty_data($user);
		if($user->create()) {
			$session->set_message("User has been created");
			Location::redirect("admin/index.php");
		}
	}
} else {
	$username = "";
	$password = "";
}

if(!empty($session->get_message())) echo "<h1>$session->get_message()</h1>";

