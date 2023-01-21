<?php

class Photo extends Db_object
{
	protected static string $db_table = "photos";
	protected static array $db_table_fields = ['username', 'user_password', 'user_firstname', 'user_lastname'];
	public ?int $id = null;

}