<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>

    <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Users
                    <small>Create User</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="/loginsys/admin/">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Create user
                    </li>
                </ol>
            </div>
        </div>


        <!-- /.row -->
        <form action="/loginsys/admin/includes/add_user.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <label> username
                        <input type="text" name="username" class="form-control" >
                    </label>
                </div>
                <div class="form-group">
                    <label> password
                        <input type="text" name="password" class="form-control" >
                    </label>
                </div>
                <div class="form-group">
                    <label> firstname
                        <input type="text" name="firstname" class="form-control">
                    </label>
                </div>
                <div class="form-group">
                    <label>lastname
                        <input type="text" name="lastname" class="form-control" >
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="file" name="avatar_file" class="form-control">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Create">
            </div>
        </form>
        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>