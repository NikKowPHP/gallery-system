<?php include("includes/header.php"); ?>
<?php include("includes/top_nav.php"); ?>



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
            <div class="form-group">
                <label> caption
                    <input type="text" name="title" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label> Alternate text
                    <input type="text" name="description" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label>Description
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </label>
            </div>
            <input type="submit" name="submit" value="submit">
        </div>
        <!-- /.container-fluid -->
			<?php include_once("includes/sidebar_nav.php"); ?>

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>