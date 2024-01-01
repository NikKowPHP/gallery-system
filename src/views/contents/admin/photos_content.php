<?php
use Models\Photo;
use Models\Comment;

$photos = Photo::get_all();
?>

<div class="container">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Photos
			</h1>
		</div>
	</div>
	<!-- /.row -->
	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Id</th>
					<th>Title</th>
					<th>Description</th>
					<th>File Name</th>
					<th>File type</th>
					<th>Size</th>
					<th>Comments</th>
					<th>View</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					if(!empty($photos)):
					foreach ($photos as $photo):
						$comments_count = Comment::count("photo_id", $photo->id);
						?>
						<td><img width="100" src="<?= $photo->get_file_path() ?>" alt="<?= $photo->title ?>"></td>
						<td>
							<?= $photo->id ?>
						</td>
						<td>
							<?= $photo->title ?>
						</td>
						<td>
							<?= $photo->description ?>
						</td>
						<td>
							<?= $photo->filename ?>
						</td>
						<td>
							<?= $photo->filetype ?>
						</td>
						<td>
							<?= $photo->size ?>
						</td>
						<td><a class="btn btn-default" href="/loginsys/admin/comments.php/?id=<?= $photo->id ?>">comments:
								<?= $comments_count ?>
							</a></td>
						<td><a class="btn btn-info" href="/loginsys/post.php?id=<?= $photo->id ?>">view</a></td>
						<td><a class="btn btn-primary" href="edit_photo_page.php/?id=<?= $photo->id ?>">edit</a></td>
						<td><a class="btn btn-danger" href="delete_photo.php/?id=<?= $photo->id ?>">delete</a></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<h1 class="text-center text-danger">There are no photos</h1>
					<a  href="<?= FORMS_PATH . DS . 'admin/add_photo_page.php' ?>">Add a new photo</a>

				<?php endif; ?>

			</tbody>
		</table>
	</div>
</div>