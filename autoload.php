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

	if (strpos($class_name, '\\') !== false) {
		foreach ($paths as $namespace => $path) {
			// Check if the class name starts with the defined namespace
			if (strpos($class_name, $namespace . '\\') === 0) {
				$file = $path . str_replace('\\', '/', substr($class_name, strlen($namespace) + 1)) . '.php';

				if (file_exists($file)) {
					require_once($file);
					return true;
				}
			}
		}
	}
	return false;
});