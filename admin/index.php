<?php
use Models\Session;
use Models\Location;
use Templates\AdminTemplate;

require_once(__DIR__ . '/../src/views/templates/AdminTemplate.php');

$session = new Session();

if (!$session->is_signed_in())
	Location::redirect("src/views/login_page.php");



$bodyContent = '/src/views/pages/dashboardContent.php';

$template = new AdminTemplate();
$template->setBody($bodyContent);
$template->render();
?>