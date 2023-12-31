<?php
namespace Models;

use Core\Database;

class Db_object
{
	protected static ?Database $database = null;

	public function __construct()
	{
		self::$database = Database::get_instance();
	}

	private static function check_database_instance(): void
	{
		if (!isset(self::$database)) {
			self::set_database(Database::get_instance());
		}
	}

	public static function set_database(Database $database)
	{
		self::$database = $database;
	}
	private static function instantiate($db_row): ?self
	{
		$calling_class = get_called_class();
		$obj = new $calling_class;
		foreach ($db_row as $key => $value) {
			if (property_exists($obj, $key)) {
				$obj->$key = $value;
			}
		}
		return $obj;
	}


	protected function properties(): array
	{
		$props = [];
		foreach (static::$db_table_fields as $field) {
			if (property_exists($this, $field)) {
				$props[$field] = self::$database->escape_string($this->$field);
			}
		}
		return $props;
	}

	public static function get_data_by_query($sql): array|bool
	{
		self::check_database_instance();

		$objects_arr = [];
		$rows = self::$database->query($sql);
		var_dump($rows);
		while ($row = $rows->fetch_assoc()) {
			$objects_arr[] = static::instantiate($row);
		}
		return $objects_arr;
	}

	public static function get_all(): array|bool
	{
		$sql = "SELECT * FROM " . static::$db_table;
		$result_set = static::get_data_by_query($sql);
		if (!$result_set || empty($result_set)) {
			return false;
		}
		return $result_set;
	}

	public static function find(int $id): ?self
	{
		$sql = "SELECT * FROM " . static::$db_table . " WHERE id = $id";
		$result_arr = self::get_data_by_query($sql);
		return !empty($result_arr) ? array_shift($result_arr) : null;
	}

	public function save()
	{
		return isset($this->id) ? $this->update() : $this->create();
	}


	public function create(): bool
	{
		$props = $this->properties();
		$columns = implode(", ", array_keys($props));
		$values = "'" . implode("','", array_values($props)) . "'";
		// TODO: Prepare statements 



		$sql = "INSERT INTO " . static::$db_table . " ($columns) VALUES ($values)";
		var_dump($sql);
		if (self::$database->query($sql)) {
			$this->id = self::$database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update(): bool
	{

		$props = $this->properties();
		$props_pairs = [];

		foreach ($props as $key => $value) {
			$props_pairs[] = "$key='$value'";
		}
		$sql = "UPDATE " . static::$db_table . " SET " . implode(", ", $props_pairs) . " WHERE id = $this->id";
		self::$database->query($sql);
		return self::$database->connection->affected_rows === 1;

	}

	public function delete(): bool
	{
		$sql = "
		DELETE FROM " . static::$db_table . " WHERE id = $this->id LIMIT 1";
		return (bool) self::$database->query($sql);
	}

	public function iterate_post($post): static
	{

		foreach ($post as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = trim($value);
			}
		}
		return $this;
	}
	public static function count(?string $by = null, ?int $id = null): int
	{
		self::check_database_instance();
		if (is_null($by) && is_null($id)) {
			$sql = "SELECT COUNT('id') FROM " . static::$db_table;
		} else {
			$sql = "SELECT COUNT('id') FROM " . static::$db_table . " WHERE $by = $id";
			var_dump($sql);
		}
		
		$data = self::$database->query($sql);
		$fetch = $data->fetch_array();
		return (int) array_shift($fetch);
	}
}