<?php
require_once(__DIR__ . '/src/views/templates/BaseTemplate.php');
use Templates\BaseTemplate;

ob_start();

$header = '/src/views/partials/header.php';
$footer =  '/src/views/partials/footer.php';
$bodyContent = '/src/views/main_body_content.php';
$navLink = '/src/views/partials/navigation.php';
$asideLink = '/src/views/partials/sidebar.php';


$template = new BaseTemplate($header, $footer);
$template->setBody($bodyContent);
$template->setNav($navLink);
$template->setAside($asideLink);
$template->render();
?>