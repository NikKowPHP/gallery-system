<?php

class User extends Db_object
{
	protected static string $db_table = "users";
	protected static array $db_table_fields = ['username', 'password', 'firstname', 'lastname', 'placeholder'];
	public ?int $id = null;
	public ?string $username = null;
	public ?string $password = null;
	public ?string $firstname = null;
	public ?string $lastname = null;
	public ?string $placeholder = null;


	public static function verify_user(string $username, string $password)
	{
		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
		$result_arr = self::get_data_by_query($sql);

		return !empty($result_arr) ? array_shift($result_arr) : null;

	}

	public function get_avatar_path()
	{
		return ADMIN_UPLOADS_PATH . 'avatars' . DS . $this->placeholder;
	}


}