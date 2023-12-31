<?php
use Templates\BaseTemplate;

class PhotoTemplate extends BaseTemplate {
	public function __construct($header, $footer){
		parent::__construct($header, $footer);
	}

	public function renderPhotos($photos) {
		ob_start();
		foreach($photos as $photo) {
			include(__DIR__ . '/src/views/main_body_content.php');
		}
		$bodyContent = ob_get_clean();
		$this->setBody($bodyContent);
		$this->render();
	}
}