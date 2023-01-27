<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>

    <div id="page-wrapper">

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
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>File Name</th>
                    <th>File type</th>
                    <th>Size</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
									<?php
									$photos = Photo::get_all();
									foreach ($photos

									as $photo):
									?>
                    <td><img width="100" src="<?= $photo->get_file_path() ?>" alt="<?= $photo->title ?>"></td>
                    <td><?= $photo->id ?></td>
                    <td><?= $photo->title ?></td>
                    <td><?= $photo->description ?></td>
                    <td><?= $photo->filename ?></td>
                    <td><?= $photo->filetype ?></td>
                    <td><?= $photo->size ?></td>
                    <td><a class="btn btn-primary" href="edit_photo_page.php/?id=<?= $photo->id ?>">edit</a></td>
                    <td><a class="btn btn-danger" href="delete_photo.php/?id=<?= $photo->id ?>">delete</a></td>
                </tr>
								<?php endforeach; ?>
                </tbody>
            </table>
        </div>
			<?php include_once("includes/sidebar_nav.php"); ?>
    </div>

<?php include("includes/footer.php"); ?>