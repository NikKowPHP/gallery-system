<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>


    <div id="page-wrapper">


        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Comments
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Comments
                        </li>
                    </ol>

									<?php if (isset($session->message)) {
										echo "<h4>$session->message</h4>";
									} ?>

                    <a href="/loginsys/admin/add_comment_page.php" class="btn btn-info"> create comment</a>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>photo_id</th>
                        <th>user_id</th>
                        <th>body</th>
                        <th>date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
											<?php
											if (!isset($_GET['id'])) {
												$comments = Comment::get_all();
											} else {
                                                $comments = Comment::get_all_by("photo_id", $_GET['id']);
                                            }

											foreach ($comments

											as $comment):
											?>
                        <td><?= $comment->id ?></td>
                        <td><?= $comment->photo_id ?></td>
                        <td><?= $comment->user_id ?></td>
                        <td><?= $comment->body ?></td>
                        <td><?= $comment->date ?></td>
                        <td><a class="btn btn-primary" href="edit_comment_page.php/?id=<?= $comment->id ?>">edit</a>
                        </td>
                        <td><a class="btn btn-danger" href="/loginsys/admin/includes/edit_comment.php/?delete=1&id=<?= $comment->id ?>&p_id=<?= $_GET['id'] ?>">delete</a></td>
                    </tr>
										<?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.row -->

        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>