<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'MAMP' . DS . 'htdocs' . DS . 'loginsys');
defined('INCLUDES_PATH') ? null : define('INCLUDES_ROOT', SITE_ROOT . DS . 'admin' . DS . 'includes' );
defined('ADMIN_ROOT') ? null : define('ADMIN_ROOT', SITE_ROOT . DS . 'admin');

require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("User.php");
require_once("photo.php");
require_once("functions.php");
require_once("session.php");



