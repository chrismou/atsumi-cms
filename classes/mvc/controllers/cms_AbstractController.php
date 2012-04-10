<?php
abstract class cms_AbstractController extends mvc_AbstractController {
	function preRender() {
		$this->push('css', 'css/core.css');
	}
}
?>
