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
	public ?string $avatar = null;
	public ?string $placeholder = 'placeholder.jpg';
	public ?string $upload_dir = 'avatars';

	public function avatar_placeholder_path()
	{
		return empty($this->avatar) ? ADMIN_UPLOADS_PATH . DS . $this->upload_dir . DS . $this->placeholder : ADMIN_UPLOADS_PATH . DS . $this->upload_dir . DS . $this->avatar;
	}

	public static function verify_user(string $username, string $password)
	{
		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
		$result_arr = self::get_data_by_query($sql);

		return !empty($result_arr) ? array_shift($result_arr) : null;

	}
}