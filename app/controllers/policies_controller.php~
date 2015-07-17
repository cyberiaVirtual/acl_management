<?php
class PoliciesController extends AppController {

	var $name = 'Policies';
	var $components = array('RequestHandler','Session');
	var $helpers = array('Html','Form','Ajax','Javascript');
	var $uses = array('Policy');


	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('*'));
	}
	
// 	function isAuthorized() {
// 		if ($this->Auth->user('group_id') != '1') {
// 			$this->Auth->deny('delete');
// 		}
// 	}

	function index() {
		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
	}

	function view($id = null) {
// 		if (!$id) {
// 			$this->Session->setFlash(__('Invalid policie', true));
// 			$this->redirect(array('action' => 'index'));
// 		}
// 		$this->set('policies', $this->Policy->read(null, $id));
	}
	
	// temporary upload
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid policie', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Policy->save($this->data)) {
				$this->Session->setFlash(__('The policie has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policie could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Policy->read(null, $id);
		}
		$users = $this->Policy->User->find('list');
		$this->set(compact('users'));
	}
	
	function add() {

		if (!empty($this->data)) {
			move_uploaded_file($this->data['Policy']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'policies'.DS.basename($this->data['Policy']['name']).'.pdf');
			
// 			$path = WWW_ROOT.'files'.DS.'policies'.DS;
// 			
// 			pr($path);
// 			pr($this->data);
// 			exit();
			
			$this->Policy->create();
			if ($this->Policy->save($this->data)) {
				$this->Session->setFlash(__('The policie has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policie could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Policy->User->find('list');
		$this->set(compact('users'));
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
