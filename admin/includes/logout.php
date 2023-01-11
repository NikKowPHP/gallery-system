<?php
require_once("init.php");

if ($session->is_signed_in()) {
	$session->logout();
	redirect("index.php");
}