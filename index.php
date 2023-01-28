<?php include("includes/header.php"); ?>
<?php $photos = Photo::get_all() ?>

<div class="row">

    <!-- Blog Entries Column -->



    <?php foreach($photos as $photo): ?>

    <div class="col-md-8">
        <a href="post.php?id=<?= $photo->id ?>"><h1><?= $photo->title ?> </h1></a>

    </div>

    <?php endforeach; ?>


    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">


			<?php include("includes/sidebar.php"); ?>


    </div>
    <!-- /.row -->

	<?php include("includes/footer.php"); ?>
