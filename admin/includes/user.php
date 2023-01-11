<?php

class user
{
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


}

