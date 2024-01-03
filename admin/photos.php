<?php
use Models\Session;
use Models\Location;

require_once(__DIR__ . '/../src/views/templates/AdminTemplate.php');

$session = new Session();

if (!$session->is_signed_in())
  Location::redirect("src/views/login_page.php");

use Templates\AdminTemplate;


$bodyContent = '/src/views/contents/admin/photos_content.php';

$template = new AdminTemplate();
$template->setBody($bodyContent);
$template->render();
?>