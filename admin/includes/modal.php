
<div class="modal" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body col-md-6">

                <?php $photos = Photo::get_all() ?>

                <?php foreach($photos as $photo): ?>
                    <img  class="modal_thumbnail" data-id="<?= $photo->id ?> " width="100" src="<?= $photo->get_file_path() ?> " alt="">

                <?php endforeach; ?>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button disabled type="button" id="set_user_image" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
