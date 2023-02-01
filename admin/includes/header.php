<?php ob_start(); ?>
<?php require_once("init.php"); ?>

<?php
if (!$session->is_signed_in()) redirect("login_page.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="/loginsys/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/loginsys/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/loginsys/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">