<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>


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
                            <i class="fa fa-dashboard"></i> <a href="/loginsys/index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Users
                        </li>
                    </ol>
                    <?php if(isset($session->message)) {
                        echo "<h4>$session->message</h4>";
                    } ?>

                    <a href="/loginsys/admin/add_user_page.php" class="btn btn-info"> create user</a>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>password</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>placeholder</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
											<?php
											$users = User::get_all();
											foreach ($users

											as $user):
											?>
                        <td><?= $user->id ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->password ?></td>
                        <td><?= $user->firstname ?></td>
                        <td><?= $user->lastname ?></td>
                        <td><img width="100" src="<?= $user->avatar_placeholder_path() ?>" alt="avatar"></td>
                        <td><a class="btn btn-primary" href="edit_user_page.php/?id=<?= $user->id ?>">edit</a></td>
                        <td><a class="btn btn-danger" href="delete_user.php/?id=<?= $user->id ?>">delete</a></td>
                    </tr>
										<?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>