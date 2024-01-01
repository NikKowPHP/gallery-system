<?php 
use Models\File;
use Models\Photo;
require_once(__DIR__ . "/../../autoload.php");
require_once(__DIR__ . "/../utils/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
	// Get form data
	$file = new File('images', $_FILES['file']);
	$photo = new Photo($file);
	$photo->iterate_post($_POST);
	display_pretty_data($photo);
	$photo->save();
	// if($photo->save()) {
	// 	echo '<h1>success</h1>';
	// };
	
}