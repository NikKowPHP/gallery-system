<?php

class Session
{
	private bool $signed_in = false;
	public int $user_id;
	public string $message;

	function __construct()
	{
		session_start();
		$this->check_login();
		$this->check_message();
	}

	public function is_signed_in(): bool
	{
		return $this->signed_in;
	}

	private function check_login(): bool
	{
		if (isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->signed_in = true;
			return true;
		} else {
			unset($this->user_id);
			$this->signed_in = false;
			return false;
		}
	}

	public function login($user)
	{
		if ($user) {
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->signed_in = true;
		}
	}

	public function logout()
	{
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->signed_in = false;
	}

	public function message($msg = "")
	{
		if (!empty($msg)) {
			$_SESSION['message'] = $msg;

		} else {
			return $this->message;
		}
	}

	private function check_message()
	{
		if (isset($_SESSION['message'])) {
			$this->message = $_SESSION['message'];
			unset($_SESSION['message']);
		} else {
			$this->message = "";
		}
	}


}

$session = new Session();