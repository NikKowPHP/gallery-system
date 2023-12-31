<?php
declare(strict_types=1);
namespace Models;

require_once(__DIR__ . '/../../autoload.php');

class Location
{
	private static ?string $current_location;

	public function __construct()
	{
		self::$current_location = __DIR__;
	}
	public static function redirect(string $to): void
	{
		$header_location = "Location: ";
		header($header_location . FORMS_PATH . DS . $to);
	}
	public static function get_current_location():string
	{
		return self::$current_location;

	}
}