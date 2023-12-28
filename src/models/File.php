<?php

class File extends Db_object
{
//	protected static string $db_table = "photos";
//	protected static array $db_table_fields = ['title','alt', 'description', 'filename', 'filetype', 'size'];
//	public ?int $id = null;
//	public ?string $title = null;
//	public ?string $alt = null;
//	public ?string $description = null;

	public ?string $name = null;
	public ?string $type = null;
	public ?int $size = null;

	public ?string $tmp_path = null;
	public ?string $upload_dir = null;

	public array $errors = array(
		0 => 'There is no error, the file uploaded with success',
		1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
		3 => 'The uploaded file was only partially uploaded',
		4 => 'No file was uploaded',
		6 => 'Missing a temporary folder',
		7 => 'Failed to write file to disk.',
		8 => 'A PHP extension stopped the file upload.',

	);
	public array $custom_errors = [];


	public function __construct(string $upload_dir)
	{
		$this->upload_dir = $upload_dir;
	}

	public function path(): string
	{
		return ADMIN_UPLOADS_PATH . DS . $this->upload_dir . DS . $this->name;
	}


	public function init(array $file): bool
	{
		if (empty($file)) {
			$this->custom_errors[] = "THERE WAS NO FILE UPLOADED";
			return false;
		} elseif ($file['error'] != 0) {
			$this->custom_errors[] = $this->errors[$file['error']];
			return false;
		} else {
			$this->name = basename($file['name']);
			$this->tmp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];
			return true;
		}
	}

	public function upload(): bool
	{
		if (empty($this->name) || empty($this->tmp_path)) {
			$this->custom_errors[] = "the file was not available";
			return false;
		}
		$target_path = ADMIN_ROOT . DS . $this->upload_dir . DS . $this->name;

		if (file_exists($target_path)) {
			$this->custom_errors[] = "the file $this->name already exists";
			return false;
		}
		if (move_uploaded_file($this->tmp_path, $target_path)) {
			unset($this->tmp_path);
			return true;
		} else {
			$this->custom_errors[] = "the file directory does not have permission";
			return false;
		}
	}

	public static function delete_file(string $upload_dir, string $filename): bool
	{
		return unlink(ADMIN_ROOT . DS . $upload_dir . DS . $filename) ?? true;
	}

}