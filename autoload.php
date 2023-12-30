<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'code' . DS . 'gallery-system');
defined('FORMS_PATH') ? null : define('FORMS_PATH', DS . 'gallery-system');
defined('SRC') ? null : define('SRC', SITE_ROOT . DS . 'src');
defined('PUBLIC_FOLDER') ? null : define('PUBLIC_FOLDER', SITE_ROOT . DS . 'public');

spl_autoload_register(function ($class_name) {
	$paths = [
		'Models' => SITE_ROOT . '/src/models/',
		'Utils' => SITE_ROOT . '/src/utils/',
		'Templates' => SITE_ROOT . '/src/views/templates/',
		'Core' => SITE_ROOT . '/src/core/',
	];
	foreach ($paths as $namespace => $path) {
		if (substr($class_name, 0, strlen($namespace)) === $namespace) {
			$file = $path . substr($class_name, strlen($namespace) + 1) . '.php';

			if (file_exists($file)) {
				require_once($file);
				return true;
			}
		}
	}

	// If the class was not found in any of the specified paths, return false
	var_dump($file);
	return false;

	if (file_exists($file)) {
		require_once($file);
	}
});