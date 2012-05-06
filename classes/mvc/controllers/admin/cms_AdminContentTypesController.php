<?php
class cms_AdminContentTypesController extends cms_AdminAbstractController {
	function page_index() {
		$contentTypes = cms_CmsContentTypeListModel::loadAll($this->app->init_db);
		var_dump($contentTypes); exit;
		$this->setView('cms_AdminContentTypeDashboardView');
	}
}
?>
