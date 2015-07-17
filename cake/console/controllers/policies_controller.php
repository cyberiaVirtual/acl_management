<?php
class PoliciesController extends AppController {

	var $name = 'Policies';
	var $components = array('RequestHandler','Session');
	var $helpers = array('Html','Form','Ajax','Javascript');
	var $uses = null;


	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('*'));
	}
	
	function isAuthorized() {
		if ($this->Auth->user('group_id') != '1') {
			$this->Auth->deny('delete');
		}
	}

	function index() {
// 		$this->Widget->recursive = 0;
// 		$this->set('politicss', $this->paginate());
	}

	function view($id = null) {
// 		if (!$id) {
// 			$this->Session->setFlash(__('Invalid Politics', true));
// 			$this->redirect(array('action' => 'index'));
// 		}
// 		$this->set('politics', $this->Politics->read(null, $id));
	}
	
	// temporary upload
	function edit() {
		
		return null;
	}
	
	function add() {
		
	}
	
	function delete() {
		
	}
	
	function dashboard() {
		
	}
	
	function policies() {
// 		pr($this->data);
// 		exit();
	}
	
	function upload() {
		
	}
}
