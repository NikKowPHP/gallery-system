<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blank Page
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

            <pre>
              <?php
							$user = User::find_user_by_id(7);
							$user->username = "kent";
							$user->user_password= "amigo";
							$user->user_firstname= "dager";
							$user->user_lastname= "latina";
                           print_r($user->update());






							?>

          </pre>
        </div>
        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>