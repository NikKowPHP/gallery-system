<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'code' . DS . 'gallery-system');
defined('SRC') ? null : define('SRC', SITE_ROOT . DS . 'src');
defined('PUBLIC_FOLDER') ? null : define('PUBLIC_FOLDER', SITE_ROOT . DS . 'public');

spl_autoload_register(function ($class_name) {
	// print_r(substr($class_name, 0, 10));

    if (substr($class_name, 0, 7) === 'Models\\') {
        // Load models from 'src/models' folder

        $file = SITE_ROOT . '/src/models/' . substr($class_name, 7) . '.php';

    } elseif (substr($class_name, 0, 13) === 'Utils\\Functions\\') {
        $file = SITE_ROOT . '/src/utils/' . substr($class_name, 12) . '.php';
    } elseif (substr($class_name, 0, 10) === 'Templates\\'){

        $file = SITE_ROOT . '/src/views/templates/' . substr($class_name, 10) . '.php';
				var_dump($file);

		}
		 else {
        // Load other classes from 'src' folder
        $file = SITE_ROOT . '/src/' . str_replace('\\', DS, $class_name) . '.php';
    }

    if (file_exists($file)) {
        require_once($file);
    }
});