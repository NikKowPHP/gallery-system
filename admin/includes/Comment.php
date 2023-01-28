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


	public static function get_all_by(string $by, int $id)
	{
		$sql = "SELECT * FROM comments WHERE $by = $id ORDER BY date ASC";
		return self::get_data_by_query($sql);
	}


}
