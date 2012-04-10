<?php
class cms_FrontPageView extends cms_TemplateView {
	protected function goInnerBodyContent() {
		pfl('<p>The current time is <span class="date">%s</span></p>', $this->get_date);	
	}
}
