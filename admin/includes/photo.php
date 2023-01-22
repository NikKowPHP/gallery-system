<?php

class Photo extends Db_object
{
	protected static string $db_table = "photos";
	protected static array $db_table_fields = ['title', 'description', 'filename','filesize', 'size'];
	public ?int $id = null;
	public ?string $title = null;
	public ?string $description = null;
	public ?string $filename = null;
	public ?string $filetype = null;
	public ?int $size = null;

	public ?string $tmp_path = null;
	public ?string $upload_dir = "images";

	public array $upload_errors_arr = [];
	public array $custom_errors = [];

	public function get_file_path()
	{
		return ADMIN_ROOT. DS . $this->upload_dir . DS . $this->filename;
	}
	public function set_file($file)
	{
		if(empty($file) || !$file || !is_array($file)) {
			$this->custom_errors[] = "THERE WAS NO FILE UPLOADED";
			return false;
		} elseif ($file['error'] != 0) {
			$this->custom_errors[] = $this->upload_errors_arr['error'];

		} else {
			$this->filename = basename($file['name']);
			$this->tmp_path = $file['tmp_name'];
			$this->filetype = $file['type'];
			$this->size = $file['size'];

		}
	}
	public function save()
	{
		if ($this->id) {
			$this->update();
		} else {
			if(!empty($this->custom_errors)) {
				return false;
			}
			if (empty($this->filename) || empty($this->tmp_path)) {
				$this->custom_errors[] = "the file was not available";
				return false;
			}
			$target_path = ADMIN_ROOT . DS .  $this->upload_dir . DS . $this->filename;

			if (file_exists($target_path)) {
				$this->custom_errors[] = "the file $this->filename already exists";
			}
			if(move_uploaded_file($this->tmp_path, $target_path)) {
				if($this->create()) {
					unset($this->tmp_path);
					return true;
				}
			} else {
				$this->custom_errors[] = "the file directory does not have permission";
			}

		}
	}

}