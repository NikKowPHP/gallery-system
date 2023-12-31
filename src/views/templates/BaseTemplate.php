<?php
namespace Templates;

require_once(__DIR__ . '/../../../autoload.php');
require_once(__DIR__ . '/../../utils/functions.php');
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
		$this->footer = $footer;
		// Change the render order
		$this->fields = ['header', 'nav', 'body', 'aside', 'footer'];
	}
	public function setBody(string $bodyContentLink)
	{
		$this->body = $bodyContentLink;
	}
	public function setAside($asideContentLink)
	{
		$this->aside = $asideContentLink;
	}
	public function setNav($navContentLink)
	{
		$this->nav = $navContentLink;
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