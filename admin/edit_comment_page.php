<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>

<?php $photos = Photo::get_all(); ?>
<?php $users = User::get_all(); ?>
    <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    comments
                    <small>Create comment</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="/loginsys/admin/">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Create comment
                    </li>
                </ol>
            </div>
        </div>


        <!-- /.row -->
        <form action="/loginsys/admin/includes/add_comment.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <label> photo id
                        <select name="photo_id" id="photo_id">
													<?php
													foreach ($photos as $photo) {
														echo "<option value='$photo->id'>$photo->id</option>";
													}
													?>
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label> user id
                        <select name="user_id" id="user_id">
													<?php
													foreach ($users as $user) {
														echo "<option value='$user->id'>$user->id</option>";
													}
													?>
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label> body
                        <textarea name="body" id="comment_body" cols="30" rows="10"></textarea>
                    </label>
                </div>
                <div class="form-group">
                    <label> Date
                        <input type="date" name="date" class="form-control">
                    </label>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Create">
            </div>
        </form>
        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>