<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>

<?php
if (isset($_GET['id'])) {
	$user = User::get_by_id($_GET['id']);
} else {
	redirect("admin/users.php");
}
?>
    <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Users
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Edit User '<?= $user->username ?>'
                    </li>
                </ol>
            </div>
        </div>


        <!-- /.row -->
        <form action="/loginsys/admin/includes/edit_user.php/?id=<?= $user->id ?>" method="POST"
              enctype="multipart/form-data">
            <div class="col-md-6">

                <div class="form-group">
                    <label> username
                        <input type="text" name="username" class="form-control" value="<?= $user->username ?>">
                    </label>
                </div>
                <div class="form-group">
                    <label> firstname
                        <input type="text" name="firstname" class="form-control" value="<?= $user->firstname ?>">
                    </label>
                </div>
                <div class="form-group">
                    <label>lastname
                        <input type="text" name="lastname" class="form-control" value="<?= $user->lastname ?>">
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <img width="500" src="<?= $user->avatar_placeholder_path() ?>" alt="user avatar">
                </div>
                <div class="form-group">
                    <input type="file" name="new_avatar_file" class="form-control">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Edit">
            </div>
        </form>
        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>