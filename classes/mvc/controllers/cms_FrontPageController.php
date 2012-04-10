<?php
class cms_FrontPageController extends cms_AbstractController {
	function page_index() {
		$this->push('js', 'js/updateDate.js');
		$this->set('date', date('d/m/Y H:i:s'));
		$this->set('title', 'Bootstrap Project');
		$this->setView('cms_FrontPageView');
	}
}
?>
