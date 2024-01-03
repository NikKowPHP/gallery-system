<?php
namespace Models;

use Models\Db_object;
use Models\Comment;
use Models\QueryBuilder;

class Photo extends Db_object
{
	protected static string $db_table = "photos";
	protected static array $db_table_fields = ['title', 'alt', 'description', 'file_id'];
	public ?int $id = null;
	public ?string $title = null;
	public ?string $alt = null;
	public ?string $description = null;
	public ?int $file_id = null;
	public ?int $user_id = null;
	public ?File $file = null;

	public ?array $comments = [];
	public ?string $upload_dir = "images";

	public function __construct()
	{
		// $this->setFile($file);
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
			return $this->update();
		}
		if (!$this->file->upload() || !$this->file->save()) {
			return false;
		}
		$this->file_id = $this->file->id;
		return $this->create() ? true : $this->handleUploadFailure();
	}
	private function handleUploadFailure(): bool
	{
		$this->file->remove($this->upload_dir, $this->file->name);
		return false;
	}
	public static function findAll(): QueryBuilder
	{
		$queryBuilder = new QueryBuilder();
		return $queryBuilder->setTable(static::$db_table);

	}
	public static function get_all(): array|bool
	{
		$sql = "SELECT p.*, f.*, c.* FROM " . static::$db_table . " p ";
		$sql .= "LEFT JOIN files f ON p.file_id = f.id ";
		$sql .= "LEFT JOIN comments c ON c.photo_id = p.id";

		$result_set = static::get_data_by_query($sql);
		if (!$result_set || empty($result_set)) {
			return false;
		}
		return $result_set;
	}
	public static function get_data_by_query($sql): array|bool
	{
		self::check_database_instance();

		$objects_arr = [];
		$rows = self::$database->query($sql);
		

		while ($row = $rows->fetch_assoc()) {
			print_r($row);
			echo "<br/>";
			$photo = self::instantiate($row);
			$photo->file = File::instantiate($row);
			$photo->file->id = $row['file_id'];
			$photo->comments[] = Comment::instantiate($row);

			$objects_arr[] = $photo;
		}
		return $objects_arr;
	}

	// public function update(): bool
	// {

	// }

	// public function remove(): bool
	// {

	// }


}