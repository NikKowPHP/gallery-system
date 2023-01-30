<?php

class Db_object
{
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
		global $database;
		$props = [];
		foreach (static::$db_table_fields as $field) {
			if (property_exists($this, $field)) {
				$props[$field] = $database->escape_string($this->$field);
			}
		}
		return $props;
	}

	protected static function get_data_by_query($sql): array
	{
		global $database;
		$objects_arr = [];
		$rows = $database->query($sql);
		while ($row = $rows->fetch_assoc()) {
			$objects_arr[] = static::instantiate($row);
		}
		return $objects_arr;

	}

	public static function get_all(): array
	{
		return static::get_data_by_query("SELECT * FROM " . static::$db_table);

	}

	public static function get_by_id(int $id): ?self
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
		global $database;
		$props = $this->properties();
		$sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($props)) . ") 
		VALUES (' " . implode("','", array_values($props)) . " ') ";
		if ($database->query($sql)) {
			$this->id = $database->the_insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update(): bool
	{
		global $database;

		$props = $this->properties();
		$props_pairs = [];

		foreach ($props as $key => $value) {
			$props_pairs[] = "$key='$value'";
		}
		$sql = "UPDATE " . static::$db_table . " SET " . implode(", ", $props_pairs) . " WHERE id = $this->id";
		$database->query($sql);
		return $database->connection->affected_rows === 1;

	}

	public function delete(): bool
	{
		global $database;
		$sql = "
		DELETE FROM " . static::$db_table . " WHERE id = $this->id LIMIT 1";
		return (bool)$database->query($sql);
	}

	public function iterate_post($post):static
	{

		foreach ($post as $key => $value) {
			if(property_exists($this, $key)) {
				$this->$key = trim($value);
			}
		}
		return $this;
	}
	public static function count(): int
	{
		global $database;
		$sql = "SELECT COUNT('id') FROM . static::$db_table";
		$data = $database->query($sql);
		$fetch = $data->fetch_array();
		return (int)array_shift($fetch);


	}
	public static function count_by(string $by, int $id): int
	{
		global $database;
		$sql = "SELECT COUNT('id') FROM . static::$db_table . WHERE $by = $id";
		$data = $database->query($sql);
		$fetch = $data->fetch_array();
		return (int)array_shift($fetch);


	}

}