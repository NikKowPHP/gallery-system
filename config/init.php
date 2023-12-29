<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'code' . DS . 'gallery-system');
defined('SRC') ? null : define('SRC', SITE_ROOT . DS . 'src');
defined('PUBLIC_FOLDER') ? null : define('PUBLIC_FOLDER', SITE_ROOT . DS . 'public');



$required_files = ["/src/core/database.php","/src/models/Db_object.php", "/src/models/Photo.php", "/src/models/File.php"];

foreach ($required_files as $file) {
    require_once(SITE_ROOT . $file);
}