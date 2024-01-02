<?php
use Models\File;
use Models\Photo;
use Models\Session;
use Models\Location;

require_once(__DIR__ . "/../../autoload.php");
require_once(__DIR__ . "/../utils/functions.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Get form data
	$file = new File();
	$file->setUploadDir('images');
	$file->init($_FILES['file']);

	$photo = new Photo();
	$photo->setFile($file);
	$photo->iterate_post($_POST);

	if ($photo->save()) {
		$session = new Session();
		$session->set_message($photo->title . ' added successfully');
	}

	Location::redirect('admin/add_photo.php');
}