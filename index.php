<?php include("includes/header.php"); ?>
<?php $photos = Photo::get_all() ?>
<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 3;
$items_total_count = Photo::count();
?>

<div class="row">

    <!-- Blog Entries Column -->



    <?php foreach($photos as $photo): ?>

    <article class="photo_article col-md-8">


        <h1><a href="post.php?id=<?= $photo->id ?>"><?= $photo->title ?> </a></h1>
        <figure>
            <img class="index_post_photo" src="<?= $photo->get_file_path() ?> " alt="">
        </figure>
        <p><?= $photo->description ?> </p>

    </article>

    <?php endforeach; ?>


    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">


			<?php include("includes/sidebar.php"); ?>


    </div>
    <!-- /.row -->

	<?php include("includes/footer.php"); ?>
