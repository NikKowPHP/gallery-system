<?php require_once(__DIR__ . "/../../autoload.php"); ?>

<?php require_once(SITE_ROOT . DS . "admin/includes/login.php") ?>
<?php
use Templates\HomeTemplate;

$body = "/src/views/contents/login_page_content.php";
$template = new HomeTemplate();
$template->setBody($body);


$template->render();
?>