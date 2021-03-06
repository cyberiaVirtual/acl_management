<?php
class UsersController extends AppController {

	var $name = 'Users';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html','Form','Ajax','Javascript','Js');
//     var $paginate = array(
//         'User' => array(
//             'limit' => 20,
// 			'conditions'=>array('status'=>'Active'),
//             'order' => array(
//                 'User.full_name' => 'asc',
//             ),
//         ),
//     );
    var $uses = array('User');
	
	/** NOTE adding from cake* Auth module */
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('logout'));
	}

	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/** NOTE @set<adding form bake of cake>*/
	
	function login() {

		//Auth Magic
// 		if (!empty($this->data) && $this->Auth->user()) {
// // 			$this->User->id = $this->Auth->user('id');
// 			$number_id = $this->Auth->user('number_id');
// 			pr($this->data);
// 
// 			$this->Session->setFlash('You are logged in!');
// 			exit();
// 			$this->redirect('/', null, false);
// 		}
		
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash('You are logged in!');
			$this->redirect('/', null, false);
		}
	}
	
	function logout() {
		//Leave empty for now.
		$this->Session->setFlash('Good-Bye');
		foreach($_SESSION as $container => $arrayContainer){
		  if($container !== 'Auth' AND $container !== 'Config' AND $container !== 'Message'){//Belong to normal Session
		  unset($_SESSION[$container]); // Sanitize the Global var $_SESSION
		  }
		}
        $this->redirect($this->Auth->logout());
		
	}

	

// 	function initDB() {
// 		$group =& $this->User->Group;
// 		//Allow admins to everything
// 		$group->id = 1;
// 		$this->Acl->allow($group, 'controllers');
// 
// 		//allow managers to posts and widgets
// // 		$group->id = 2;
// // 		$this->Acl->deny($group, 'controllers');
// // 		$this->Acl->allow($group, 'controllers/Posts');
// // 		$this->Acl->allow($group, 'controllers/Widgets');
// // 		$this->Acl->allow($group, 'controllers/Policies/view');
// // 		$this->Acl->allow($group, 'controllers/Policies/index');
// // 		$this->Acl->allow($group, 'controllers/Policies/policies');
// 
// 
// 		//allow users to only add and edit on posts and widgets
// // 		$group->id = 3;
// // 		$this->Acl->deny($group, 'controllers');
// // 		$this->Acl->allow($group, 'controllers/Posts/add');
// // 		$this->Acl->allow($group, 'controllers/Posts/edit');
// // 		$this->Acl->allow($group, 'controllers/Widgets/add');
// // 		$this->Acl->allow($group, 'controllers/Widgets/edit');
// // 		$this->Acl->allow($group, 'controllers/Policies/view');
// // 		$this->Acl->allow($group, 'controllers/Policies/index');
// // 		$this->Acl->allow($group, 'controllers/Policies/policies');
// 		
// 		// allow a fourt (mortals) group only to edit can be editors group or revisors
// // 		$group->id = 4;
// // 		$this->Acl->deny($group, 'controllers');
// // 		$this->Acl->allow($group, 'controllers/Posts/view');
// // 		$this->Acl->allow($group, 'controllers/Posts/index');
// // 		$this->Acl->allow($group, 'controllers/Widgets/view');
// // 		$this->Acl->allow($group, 'controllers/Widgets/index');
// // 		$this->Acl->allow($group, 'controllers/Policies/view');
// // 		$this->Acl->allow($group, 'controllers/Policies/index');
// // 		$this->Acl->allow($group, 'controllers/Policies/policies');
// 		
// 		// build the work groups "Policies"
// // 		$group->id = 5;
// // 		$this->Acl->deny($group, 'controllers');
// // 		$this->Acl->allow($group, 'controllers/Policies/view');
// // 		$this->Acl->allow($group, 'controllers/Policies/index');
// 		//we add an exit to avoid an ugly "missing views" error message
// 		echo "all done";
// 		exit;
// 	}
}
