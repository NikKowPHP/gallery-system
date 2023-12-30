<?php
function redirect(string $location):void
{
	header("Location: /gallery-system/{$location}");
}