<?php

// Define constants using the PHP DIRECTORY_SEPARATOR constant and the __DIR__ magic constant for paths
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS .  'gallery-system');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT .  DS . 'includes');
defined('ADMIN_ROOT') ? null : define('ADMIN_ROOT', SITE_ROOT . DS . 'admin');
defined('ADMIN_INCLUDES') ? null : define('ADMIN_INCLUDES', ADMIN_ROOT . DS . 'includes');
defined('UPLOADS_PATH') ? null : define('UPLOADS_PATH', SITE_ROOT . DS . "public" . DS . "uploads");

// Require necessary files using require_once statements
$required_files = ["session.php", "new_config.php", "database.php", "db_object.php", "File.php", "User.php", "Comment.php", "Photo.php", "functions.php", "Paginate.php"];

foreach ($required_files as $file) {
    require_once($file);
}


