<?php
namespace Templates;

require_once(__DIR__ . '/BaseTemplate.php');
use Templates\BaseTemplate;


class AdminTemplate extends BaseTemplate
{
	public function __construct()
	{
		$headerLink = '/src/views/partials/admin/header.php';
		$footerLink = '/src/views/partials/admin/footer.php';
		$navLink = '/src/views/partials/admin/navigation.php';
		parent::__construct($headerLink, $footerLink);
		$this->setNav($navLink);

	}

}
