<?php

class user
{
	protected static string $db_table = "users";
	protected array $db_table_fields = ['username', 'user_password', 'user_firstname', 'user_lastname'];
	public ?int $id = null;
	public ?string $username = null;
	public ?string $user_password = null;
	public ?string $user_firstname = null;
	public ?string $user_lastname = null;

	private static function instantiate($db_row):?self
	{
		$obj = new self();
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
		foreach ($this->db_table_fields as $field) {
			if (property_exists($this, $field)) {
				$props[$field] = $database->escape_string($this->$field);
			}
		}
		return $props;
	}

	protected static function get_data_by_query($sql):array
	{
		global $database;
		$objects_arr = [];
		$rows = $database->query($sql);
		while($row = $rows->fetch_assoc() ) {
			$objects_arr[] = self::instantiate($row);
		}
		return $objects_arr;

	}

	public static function get_all(): array
	{
		return self::get_data_by_query("SELECT * FROM " . self::$db_table);

	}

	public static function get_by_id(int $id): ?self
	{
		$sql = "SELECT * FROM " . self::$db_table . " WHERE id = $id";
		$result_arr = self::get_data_by_query($sql);
		return !empty($result_arr) ? array_shift($result_arr) : null;


	}


	public static function verify_user(string $username, string $password)
	{
		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password' LIMIT 1";
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
		$sql = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($props)) . ") 
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
		$sql = "
		UPDATE users SET " . implode(", ", $props_pairs) ." WHERE id = $this->id";
		$database->query($sql);
		return $database->connection->affected_rows === 1;

	}

	public function delete(): bool
	{
		global $database;
		$sql = "
		DELETE FROM " . self::$db_table . " WHERE id = $this->id LIMIT 1";
		return (bool)$database->query($sql);
	}


}