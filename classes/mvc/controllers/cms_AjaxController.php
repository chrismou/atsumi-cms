<?php
class cms_AjaxController extends cms_AbstractController {
	function preProcess() {
		parent::preProcess();
		atsumi_Debug::setActive(false);
	}

	function page_date() {
		$this->set('txt', date('d/m/Y H:i:s'));
		$this->setView('mvc_TxtView');
	}
}
?>
