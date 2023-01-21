<?php

class User extends Db_object
{
	protected static string $db_table = "users";
	protected static array $db_table_fields = ['username', 'user_password', 'user_firstname', 'user_lastname'];
	public ?int $id = null;
	public ?string $username = null;
	public ?string $user_password = null;
	public ?string $user_firstname = null;
	public ?string $user_lastname = null;



	public static function verify_user(string $username, string $password)
	{
		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password' LIMIT 1";
		$result_arr = self::get_data_by_query($sql);

		return !empty($result_arr) ? array_shift($result_arr) : null;

	}

}