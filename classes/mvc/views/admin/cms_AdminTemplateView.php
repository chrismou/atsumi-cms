<?php
abstract class cms_AdminTemplateView extends mvc_HtmlView {
	abstract protected function goInnerBodyContent();

	protected function getTitle() {
		return 'CMS '. (($this->get_title) ? ': ' . strip_tags($this->get_title) : '');
	}

	protected function renderHeadMeta() {

	}

	protected function renderHeadCss() {
		pfl('<link rel="stylesheet" href="/%s?ref=%s" type="text/css" media="screen">', 'css/admin.css', '1');
		if($this->get_css) {
			foreach($this->get_css as $css) {
			pfl('<link rel="stylesheet" href="/%s?ref=%s" type="text/css" media="screen">', $css, '1');
			}
		}
	}

	protected function renderHeadJs() {
		pfl('<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>');
		if($this->get_js) {
			foreach($this->get_js as $js) {		
				pfl('<script type="text/javascript" src="/%s?ref=%s"></script>', $js, '1');
			}
		}
	}

	protected function renderBodyContent() {
		// Template code
		pfl('
			<div class="bodyContainer">
				<div class="header">
					<div class="logo"><img src="/img/logo-small.png" /></div>
					<div class="siteStatus">
						<div class="details">
							<p>Logged in as: <span class="username">%s</span></p>
						</div>
						<div class="logout">
							<a href="/login/out/" class="logout"></a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="contentContainer">
					<div class="sidebar">
						<div class="heading"><p>Main Menu</p></div>
						<ul>
							%s
						</ul>
						<div class="clear"></div>
					</div>
					<div class="content">
						<div class="heading">%s</div>
						%s
						<div class="innerContent">
							<div style="display: block; padding: 0 10px;">
		', 'Um... user', $this->renderMainMenu(), ($this->get_title) ? $this->get_title : '', $this->renderMessages());
		$this->goInnerBodyContent();
		pfl('					</div>
						</div>
					</div>	
				</div>
			</div>
			<div class="clear"></div>');

	}

	protected function renderMainMenu() {
		$menuItems = array(
				'Dashboard'		=> '/admin/',
				'Categories'		=> '/admin/category/',
				'Photos'		=> '/admin/photo/',
				'Account Settings'	=> '/admin/settings/',
				'Help &amp; Support'	=> '/admin/help/'
		);

		$output = '';
		foreach($menuItems as $name => $item) {
			if(is_array($item)) {
				if(in_array('', array_keys($item))) {
					$output .= $this->renderMenuItem($name, $item[''], false, false);
				}
				$output .= '<ul class="submenu">';
				foreach($item as $subname => $subitem) {
					if($subname == '')
						continue;
					$output .= $this->renderMenuItem($subname, $subitem, true);
				}
				$output .= '</ul>';
				$output .= '</li>';
			} else {
				$output .= $this->renderMenuItem($name, $item);
			}
		}
		return $output;		
	}

	private function renderMenuItem($name, $item, $sub = false, $closeItem = true) {
		$output = '';
		$output .= sf('<li%s><a href="%s"><span class="%s"></span><span class="link">%s</span></a>%s', 
				(($_SERVER['REQUEST_URI'] == '/admin/' && $item == '/admin/') || (strpos($_SERVER['REQUEST_URI'], $item) === 0 && $item != '/admin/')) ? ' class="selected"' : '',
				$item,
				(($item == '/admin/') ? 'dashboard' : trim(str_replace('/admin/', '', $item), '/')),
				$name,
				(($closeItem) ? '</li>' : ''));
		return $output;
	}

	protected function renderMessages() {
		$output = '';
		foreach(array('success', 'error', 'notice') as $type) {
			$method = 'get_'.$type;
			$output .= sf('<div class="message %s" %s>', $type, ((count($this->$method)) ? '' : 'style="display: none;"'));
			$output .= sf('<span></span>');
			if(count($this->$method)) {
				foreach($this->$method as $message) {
					$output .= sf('<p>%s</p>', $message);
				}
			}
			$output .= '</div>';
		}
		if($output != '') {
			$output = sf('<div class="messages">%s</div>', $output);
		}
		return $output;
	}
}
?>
