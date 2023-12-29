<?php
namespace Models;
use Models\Db_object;

class Photo extends Db_object
{
	protected static string $db_table = "photos";
	protected static array $db_table_fields = ['title', 'alt', 'description', 'file_id' ];
	public ?int $id = null;
	public ?string $title = null;
	public ?string $alt = null;
	public ?string $description = null;
	public ?File $file = null;
	public ?string $upload_dir = "images";

	public function __construct(File $file, string $title, string $alt)
	{
		$this->title = $title;
		$this->alt = $alt;
		$this->setFile($file);
	}
	public function setDescription(string $description)
	{
		$this->description = $description;
	}

	public function setFile(File $file): void
	{
		$this->file = $file;
	}

	public function save(): bool
	{
		if ($this->id) {
			$this->update();
			return true;
		}
		if(!$this->file->upload()) {
			return false;
		}

		if($this->create()) {
			return true;
		} else {
			$this->file->remove($this->upload_dir, $this->file->name);
			return false;
		}

	}

	public function update(): bool
	{

	}

	public function remove(): bool
	{

	}


}