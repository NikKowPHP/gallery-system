<?php include("includes/header.php"); ?>

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

    </div>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file_upload">
        <input type="submit">
    </form>


    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">


			<?php include("includes/sidebar.php"); ?>


    </div>
    <!-- /.row -->

	<?php include("includes/footer.php"); ?>
