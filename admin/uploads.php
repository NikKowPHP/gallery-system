<?php require_once("includes/header.php"); ?>
<?php require_once("includes/top_nav.php"); ?>



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


			<?php
			echo "<pre>";
			print_r($_FILES['file_upload']);
			echo "</pre>";


			$temp_name = $_FILES['file_upload']['tmp_name'];
			$file = $_FILES['file_upload']['name'];
			$directory = "admin/uploads";
			$upload_errors = [
				UPLOAD_ERR_OK => "THERE IS NO ERROR",
			];
			if (move_uploaded_file($temp_name, $directory . "/" . $file)) {
				$message = "file uploaded successfully";

			} else {
				$error = $_FILES['file_upload']['error'];
				$message = $upload_errors[$error];

			}

			if (!empty($message)) {
				echo $message;
			}
			?>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
    <?php include_once("includes/sidebar_nav.php"); ?>

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>