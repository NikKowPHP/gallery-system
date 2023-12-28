<?php
spl_autoload_register(function ($class) {

	$class = strtolower($class);
	$the_path = "includes/{$class}.php";
	if (is_file($the_path) && !class_exists($class)) {
		require_once($the_path);
	} else {
		die("This file name {$class} was not found");
	}
});

function redirect(string $location):void
{
	header("Location: /gallery-system/{$location}");
}