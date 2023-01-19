<?php

class user
{
	protected static $db_table = "users";
	public $id;
	public $username;
	public $user_password;
	public $user_firstname;
	public $user_lastname;

	public static function instantiation(array $the_record): user
	{
		$the_object = new self();
		foreach ($the_record as $key => $value) {
			if ($the_object->has_the_attribute($key)) {
				$the_object->$key = $value;
			}
		}
		return $the_object;
	}

	private function has_the_attribute($the_attribute): bool
	{
		$obj_props = get_object_vars($this);
		return array_key_exists($the_attribute, $obj_props);
	}

	public static function find_this_query(string $sql): array
	{
		global $database;
		$obj_arr = [];

		$result_set = $database->query($sql);
		while ($row = $result_set->fetch_array()) {
			$obj_arr[] = self::instantiation($row);
		}
		return $obj_arr;
	}


	public static function find_all_users(): array
	{
		return self::find_this_query("SELECT * FROM users");

	}

	public static function find_user_by_id(int $id): ?user
	{
		global $database;
		$result_arr = self::find_this_query("SELECT * FROM users WHERE id = $id LIMIT 1");
		return !empty($result_arr) ? array_shift($result_arr) : null;


	}


	public static function verify_user(string $username, string $password)
	{
		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password' LIMIT 1";
		$result_arr = self::find_this_query($sql);

		return !empty($result_arr) ? array_shift($result_arr) : null;

	}

	public function save()
	{
		return isset($this->id) ? $this->update() : $this->create();
	}


	public function create(): bool
	{
		global $database;
		$sql = "
		INSERT INTO " . self::$db_table . " (username, user_password, user_firstname, user_lastname)
		VALUES (
		        '$this->username',
		        '$this->user_password',
		        '$this->user_firstname',
		        '$this->user_lastname'
		) 
					";
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
		$sql = "
		UPDATE users SET username ='$this->username', user_password = '$this->user_password', user_firstname = '$this->user_firstname', user_lastname = '$this->user_lastname' WHERE id = $this->id";
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