<?php
namespace Templates;
require_once(__DIR__ .'/BaseTemplate.php');
use Templates\BaseTemplate;


class AdminTemplate extends BaseTemplate
{
	public function __construct($header, $footer)
	{
		parent::__construct($header, $footer);
	}
}
