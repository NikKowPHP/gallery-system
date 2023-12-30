<?php
namespace Templates;

use Templates\BaseTemplate;

class HomeTemplate extends BaseTemplate {
	public function __construct(){
		$header = "/src/views/partials/header.php";
		$footer = "/src/views/partials/footer.php";
		parent::__construct($header, $footer);
		$this->setDefaultNav();
	}
	private function setDefaultNav()
	{
		$navigation = "/src/views/partials/navigation.php";
		$this->setNav($navigation);
	}
}