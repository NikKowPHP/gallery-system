<?php
class Comment extends Db_object
{

	protected static $db_table = "comments";
	protected static $db_table_fields = ['photo_id', 'user_id', 'body', 'date'];
	public ?int $id = null;
	public ?int $photo_id = null;
	public ?int $user_id = null;
	public ?string $body = null;
	public ?string $date = null;




}
