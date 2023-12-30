<?php
namespace Templates;
require_once(__DIR__ .'/../../../autoload.php');
class BaseTemplate
{
	protected array $fields = [];
	protected $header;
	protected $footer;
	protected $body;
	protected $aside;
	protected $nav;

	public function __construct($header, $footer)
	{
		$this->header = $header;
		$this->body = '';
		$this->nav = '';
		$this->aside = '';
		$this->footer = $footer;
		// Change the render order
		$this->fields = ['header', 'nav', 'body', 'aside', 'footer'];
	}
	public function setBody($bodyContent)
	{
		$this->body = $bodyContent;
	}
	public function setAside($asideLink)
	{
		$this->aside = $asideLink;
	}
	public function setNav($navContent)
	{
		$this->nav = $navContent;
	}
	public function includeParts()
	{
		foreach ($this->fields as $field) {
			if (!empty($this->{$field})) {
				include(SITE_ROOT . $this->{$field});
			}
		}
	}

	public function render()
	{
		$this->includeParts();
	}

}