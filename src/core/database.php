<?php
require_once(SITE_ROOT . "/config/config.php");


class Database
{
	public $connection;

	function __construct()
	{
		$this->open_db_connection();
	}


	public function open_db_connection()
	{
		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if ($this->connection->connect_errno) {
			die("DATABASE connection failed" . $this->connection->connect_error);
		}

	}

	public function query($sql)
	{
		$result = $this->connection->query($sql);
		return $this->confirm_query($result);
	}

	private function confirm_query($result)
	{

		if (!$result) {
			die("query failed" . $this->connection->error);
		} else {
			return $result;
		}

	}

	public function escape_string($string)
	{
		return $this->connection->real_escape_string($string);
	}

	public function the_insert_id()
	{
		return $this->connection->insert_id;
	}
}

$database = new Database();

