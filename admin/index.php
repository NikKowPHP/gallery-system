<?php
use Models\Session;
use Models\Location;

require_once(__DIR__ . '/../src/views/templates/AdminTemplate.php');

$session = new Session();

if (!$session->is_signed_in()) Location::redirect("src/views/login_page.php");


use Templates\AdminTemplate;


$header = '/src/views/partials/admin/header.php';
$footer =  '/src/views/partials/admin/footer.php';
$bodyContent = '/src/views/pages/dashboardContent.php';
$navLink = '/src/views/partials/admin/navigation.php';

$template = new AdminTemplate($header, $footer);
$template->setBody($bodyContent);
$template->setNav($navLink);
$template->render();
?>