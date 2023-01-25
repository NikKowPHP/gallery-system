<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>

<?php
if (isset($_GET['id'])) {
    $photo = Photo::get_by_id($_GET['id']);
}
?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Photos
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Edit Photo <?= $photo->id ?>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <form action="/loginsys/admin/includes/edit_photo.php" method="post" enctype="multipart/form-data">
            <div class="d-none">
                <input type="text" class="d-none" name="id" value="<?= $photo->id ?>">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> Title
                        <input type="text" name="title" class="form-control" value="<?= $photo->title ?>">
                    </label>
                </div>
                <div class="form-group">
                    <label> Alternate text
                        <input type="text" name="alt" class="form-control" value="<?= $photo->alt ?>">
                    </label>
                </div>
                <div class="form-group">
                    <label>Description
                        <textarea name="description" id="" cols="30" rows="10"
                                  class="form-control"><?= $photo->description ?></textarea>
                    </label>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="submit">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <img width="500" src="<?= $photo->get_file_path() ?>" alt="<?= $photo->alt ?>">
                </div>
                <div class="form-group">
                    <input type="file" name="new_photo_upload" class="form-control">
                </div>
            </div>
        </form>
        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>