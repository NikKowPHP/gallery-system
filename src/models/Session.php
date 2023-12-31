<?php
namespace Models;

class Session
{
	private bool $signed_in = false;
	public int $user_id;
	private string $message;
	public int $count;

	function __construct()
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		$this->visitor_count();
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

	public function set_message(string $msg = "")
	{
		if (!empty($msg)) {
			$_SESSION['message'] = $msg;

		} else {
			return $this->message;
		}
	}
	public function get_message(): string
	{
		return $this->message;
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

	public function visitor_count()
	{
		if (isset($_SESSION['count'])) {
			return $this->count = $_SESSION['count']++;
		} else {
			return $_SESSION['count'] = 1;
		}
	}
	public function destroy(): void
	{
		unset($this->user_id);
		$this->signed_in = false;
		session_destroy();
	}
}