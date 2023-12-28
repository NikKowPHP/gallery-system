<?php
namespace Gallery\Views\Templates;
class BaseTemplate
{
	protected $header;
	protected $footer;
	protected $body;
	protected $aside;
	protected $nav;

	public function __construct($header, $footer)
	{
		$this->header = $header;
		$this->footer = $footer;
		$this->body = '';
		$this->aside = '';
		$this->nav = '';
	}
	public function setBody($bodyContent)
	{
		$this->body = $bodyContent;
	}
	public function setAside($asideContent)
	{
		$this->aside = $asideContent;
	}
	public function setNav($navContent)
	{
		$this->nav = $navContent;
	}

	public function render()
	{
		echo $this->header;
		echo $this->nav;
		echo $this->aside;
		echo $this->body;
		echo $this->footer;
	}

}