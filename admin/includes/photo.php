<?php

class Photo extends Db_object
{
	protected static string $db_table = "photos";
	protected static array $db_table_fields = ['id', 'title', 'description', 'filename','filesize', 'size'];
	public ?int $id = null;
	public ?string $title = null;
	public ?string $description = null;
	public ?string $filename = null;
	public ?string $filetype = null;
	public ?int $size = null;

}