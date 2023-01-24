<?php require_once("includes/header.php"); ?>
<?php require_once("includes/top_nav.php"); ?>

<?php
if (isset($_POST['submit'])) {
	$photo = new Photo();
	$photo->title = $_POST['title'];
	$photo->set_file($_FILES['file_upload']);

	if ($photo->save()) {
		$message = "Photo uploaded successfully";
	}
}

?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Uploads
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
        </div>


        <form action="uploads.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="file_upload" class="form-control">
            </div>
            <input type="submit" name="submit">
        </form>


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>