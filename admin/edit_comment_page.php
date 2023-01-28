<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>

<?php $photos = Photo::get_all(); ?>
<?php $users = User::get_all(); ?>
<?php
if (isset($_GET['id'])) {
	$comment = Comment::get_by_id($_GET['id']);
} else {
	redirect("admin/comments.php");
}
?>
    <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    comments
                    <small>edit comment <?= $comment->id ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="/loginsys/admin/">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-desktop"></i> <a href="/loginsys/admin/comments.php">Comments</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> edit comment
                    </li>
                </ol>
            </div>
        </div>


        <!-- /.row -->
        <form action="/loginsys/admin/includes/edit_comment.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <label> photo id
                        <select name="photo_id" id="photo_id">
													<?php
													foreach ($photos as $photo) {
														if ($comment->photo_id == $photo->id) {
															echo "<option value='$photo->id' selected>$photo->id</option>";
														} else {
                                                            echo "<option value='$photo->id'>$photo->id</option>";
                                                        }
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
														if ($comment->user_id == $user->id) {
															echo "<option value='$user->id' selected>$user->id</option>";
														}else {

                                                            echo "<option value='$user->id'>$user->id</option>";
                                                        }
													}
													?>
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label> body
                        <textarea name="body" id="comment_body" cols="30" rows="10"><?= $comment->body ?> </textarea>
                    </label>
                </div>
                <div class="form-group">
                    <label> Date
                        <input type="date" name="date" class="form-control" value="<?= $comment->date ?>"/>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Create">
            </div>
            <div class="form-group">
                <input class="btn btn-danger" type="submit" name="delete" value="Delete">
            </div>
        </form>
        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>