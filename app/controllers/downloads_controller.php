<?php 
class DownloadsController extends Appcontroller  {
		var $name = 'Downloads';
		var $uses = null;
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('index'));
	}
	
	
	function index() {
		
	}
	
	function edit() {
		
	}
}
?> 
