<div class="photos-section mx-auto">
    <?php $photos = Photo::get_all() ?>
    <?php if (!empty($photos)): ?>
        <?php foreach ($photos as $photo): ?>

            <article class="photo_article col-md-8">
                <h1><a href="post.php?id=<?= $photo->id ?>">
                        <?= $photo->title ?>
                    </a></h1>
                <figure>
                    <img class="index_post_photo" src="<?= $photo->get_file_path() ?> " alt="">
                </figure>
                <p>
                    <?= $photo->description ?>
                </p>
            </article>

        <?php endforeach; ?>
    <?php else: ?>
        <div class="d-flex justify-content-center align-items-center ">
    <span class="text-center text-white font-size-xlarge bg-secondary p-4 m-5 rounded w-50">There are no photos</span>
</div>

    <?php endif; ?>

</div>