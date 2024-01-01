<?php
use Models\Session;
use Models\Location;
use Models\Router;

require_once(__DIR__ . '/../src/views/templates/AdminTemplate.php');

$session = new Session();

if (!$session->is_signed_in())
  Location::redirect("src/views/login_page.php");

use Templates\AdminTemplate;

$router = new Router();
$router->add_route(FORMS_PATH . DS . 'admin/photos/add', SITE_ROOT . DS .'/src/views/pages/admin/add_photo.php');

$bodyContent = '/src/views/contents/admin/photos_content.php';

$template = new AdminTemplate();
$template->setBody($bodyContent);
$template->render();
?>