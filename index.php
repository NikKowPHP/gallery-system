<?php include("includes/header.php"); ?>
<?php $photos = Photo::get_all() ?>
<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 3;
$items_total_count = Photo::count();
$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photos LIMIT $items_per_page OFFSET {$paginate->offset()}";
$photos = Photo::get_data_by_query($sql);

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

    <div class="row col-md-6">

			<?php
			echo "<pre>";
			print_r($paginate);
			echo "</pre>";

			?>

        <ul class="pagination">

          <?php
          if($paginate->page_total() > 1) {

              if ($paginate->has_next()) {
                  echo "            
                <li class='page-item'>
                 <a class='page-link' 
                 href='/loginsys/index.php?page={$paginate->next()}'>Next</a>
                </li>
            ";
              }




              if($paginate->has_previous()) {
                  echo "            
                    <li class='page-item'>
                    <a class='page-link' 
                    href='/loginsys/index.php?page={$paginate->previous()}'>Previous</a>
                    </li>
                  ";
              }
          }

          ?>




        </ul>
    </div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

			<?php include("includes/sidebar.php"); ?>

    </div>

    <!-- /.row -->


	<?php include("includes/footer.php"); ?>
