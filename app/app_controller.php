<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session');
    var $helpers = array('Html', 'Form', 'Session');

    
    function afterFilter() {
        # Update User last_access datetime
        if ($this->Auth->user()) {
            $this->loadModel('User');
            $this->User->id = $this->Auth->user('id');
            $this->User->saveField('last_access', date('Y-m-d H:i:s'));
        }
    }
    
    function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->authorize = 'actions';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'Policies', 'action' => 'view');
        $this->Auth->actionPath = 'controllers/';
		$this->Auth->allowedActions = array('display');
		$this->Auth->loginError = "El Acceso a este sitio esta <strong>restringido</strong>";
		$this->Auth->authError = "Usted tiene Permisos <strong>Insuficientes</strong> para Acceder a este sitio";
		$this->Auth->flashElement    = "message_error";
		$this->Auth->userScope = array('User.status' => 'Active');

// 		Change the original behavior for login
		$this->Auth->fields = array(
									'username' => 'number_id',
									'password' => 'password'
									);

		// set languaje config for current theme
		// this can be set by a country detection
		
		if(isset($this->Auth->user()['User']['languaje'])) {
				$languaje = $this->Auth->user()['User']['languaje'];
		} else {
			$languaje = 'es';
		}
		$this->set('languaje',$languaje);
		
		// set the images paths this can be static and in db a default value ... or not??
		// we can search in db or set hir in the else statement
		if(isset($this->Auth->user()['User']['portal'])) {
				$portalUrl = $this->Auth->user()['User']['portal'];
		} else {
			$portalUrl = 'gst';
		}
		$this->set('portalUrl',$portalUrl);

		if(isset($this->Auth->user()['User']['id'])) {
// 				$public = true;
				$this->set('public', true);
		} else {
				$this->set('public', false);
		}
    }

/**
 * Reconstruye el Acl basado en los controladores actuales de la aplicación.
 *
 * @return void
 */

/* As mentioned before, there is no pre-built way to input all of our controllers and actions into the Acl. However, we all    
 * hate doing repetitive things like typing in what could be hundreds of actions in a large application. We’ve whipped up 
 * an automated set of functions to build the ACO table. These functions will look at every controller in your application. 
 * It will add any non-private, non Controller methods to the Acl table, nicely nested underneath the owning controller. 
 * You can add and run this in your AppController or any controller for that matter, just be sure to remove it before 
 * putting your application into production.
 */
//  function build_acl() {
//         if (!Configure::read('debug')) {
//             return $this->_stop();
//         }
//         $log = array();
// 
//         $aco =& $this->Acl->Aco;
//         $root = $aco->node('controllers');
//         if (!$root) {
//             $aco->create(array('parent_id' => null, 'model' => null, 'alias' => 'controllers'));
//             $root = $aco->save();
//             $root['Aco']['id'] = $aco->id;
//             $log[] = 'Created Aco node for controllers';
//         } else {
//             $root = $root[0];
//         }
// 
//         App::import('Core', 'File');
//         $Controllers = App::objects('controller');
//         $appIndex = array_search('App', $Controllers);
//         if ($appIndex !== false ) {
//             unset($Controllers[$appIndex]);
//         }
//         $baseMethods = get_class_methods('Controller');
//         $baseMethods[] = 'build_acl';
// 
//         $Plugins = $this->_getPluginControllerNames();
//         $Controllers = array_merge($Controllers, $Plugins);
// 
//         // look at each controller in app/controllers
//         foreach ($Controllers as $ctrlName) {
//             $methods = $this->_getClassMethods($this->_getPluginControllerPath($ctrlName));
// 
//             // Do all Plugins First
//             if ($this->_isPlugin($ctrlName)){
//                 $pluginNode = $aco->node('controllers/'.$this->_getPluginName($ctrlName));
//                 if (!$pluginNode) {
//                     $aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginName($ctrlName)));
//                     $pluginNode = $aco->save();
//                     $pluginNode['Aco']['id'] = $aco->id;
//                     $log[] = 'Created Aco node for ' . $this->_getPluginName($ctrlName) . ' Plugin';
//                 }
//             }
//             // find / make controller node
//             $controllerNode = $aco->node('controllers/'.$ctrlName);
//             if (!$controllerNode) {
//                 if ($this->_isPlugin($ctrlName)){
//                     $pluginNode = $aco->node('controllers/' . $this->_getPluginName($ctrlName));
//                     $aco->create(array('parent_id' => $pluginNode['0']['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginControllerName($ctrlName)));
//                     $controllerNode = $aco->save();
//                     $controllerNode['Aco']['id'] = $aco->id;
//                     $log[] = 'Created Aco node for ' . $this->_getPluginControllerName($ctrlName) . ' ' . $this->_getPluginName($ctrlName) . ' Plugin Controller';
//                 } else {
//                     $aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $ctrlName));
//                     $controllerNode = $aco->save();
//                     $controllerNode['Aco']['id'] = $aco->id;
//                     $log[] = 'Created Aco node for ' . $ctrlName;
//                 }
//             } else {
//                 $controllerNode = $controllerNode[0];
//             }
// 
//             //clean the methods. to remove those in Controller and private actions.
//             foreach ($methods as $k => $method) {
//                 if (strpos($method, '_', 0) === 0) {
//                     unset($methods[$k]);
//                     continue;
//                 }
//                 if (in_array($method, $baseMethods)) {
//                     unset($methods[$k]);
//                     continue;
//                 }
//                 $methodNode = $aco->node('controllers/'.$ctrlName.'/'.$method);
//                 if (!$methodNode) {
//                     $aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $method));
//                     $methodNode = $aco->save();
//                     $log[] = 'Created Aco node for '. $method;
//                 }
//             }
//         }
//         if(count($log)>0) {
//             debug($log);
//         }
//     }
// 
//     function _getClassMethods($ctrlName = null) {
//         App::import('Controller', $ctrlName);
//         if (strlen(strstr($ctrlName, '.')) > 0) {
//             // plugin's controller
//             $num = strpos($ctrlName, '.');
//             $ctrlName = substr($ctrlName, $num+1);
//         }
//         $ctrlclass = $ctrlName . 'Controller';
//         $methods = get_class_methods($ctrlclass);
// 
//         // Add scaffold defaults if scaffolds are being used
//         $properties = get_class_vars($ctrlclass);
//         if (array_key_exists('scaffold',$properties)) {
//             if($properties['scaffold'] == 'admin') {
//                 $methods = array_merge($methods, array('admin_add', 'admin_edit', 'admin_index', 'admin_view', 'admin_delete'));
//             } else {
//                 $methods = array_merge($methods, array('add', 'edit', 'index', 'view', 'delete'));
//             }
//         }
//         return $methods;
//     }
// 
//     function _isPlugin($ctrlName = null) {
//         $arr = String::tokenize($ctrlName, '/');
//         if (count($arr) > 1) {
//             return true;
//         } else {
//             return false;
//         }
//     }
// 
//     function _getPluginControllerPath($ctrlName = null) {
//         $arr = String::tokenize($ctrlName, '/');
//         if (count($arr) == 2) {
//             return $arr[0] . '.' . $arr[1];
//         } else {
//             return $arr[0];
//         }
//     }
// 
//     function _getPluginName($ctrlName = null) {
//         $arr = String::tokenize($ctrlName, '/');
//         if (count($arr) == 2) {
//             return $arr[0];
//         } else {
//             return false;
//         }
//     }
// 
//     function _getPluginControllerName($ctrlName = null) {
//         $arr = String::tokenize($ctrlName, '/');
//         if (count($arr) == 2) {
//             return $arr[1];
//         } else {
//             return false;
//         }
//     }

/**
 * Get the names of the plugin controllers ...
 *
 * This function will get an array of the plugin controller names, and
 * also makes sure the controllers are available for us to get the
 * method names by doing an App::import for each plugin controller.
 *
 * @return array of plugin names.
 *
 */
//     function _getPluginControllerNames() {
//         App::import('Core', 'File', 'Folder');
//         $paths = Configure::getInstance();
//         $folder =& new Folder();
//         $folder->cd(APP . 'plugins');
// 
//         // Get the list of plugins
//         $Plugins = $folder->read();
//         $Plugins = $Plugins[0];
//         $arr = array();
// 
//         // Loop through the plugins
//         foreach($Plugins as $pluginName) {
//             // Change directory to the plugin
//             $didCD = $folder->cd(APP . 'plugins'. DS . $pluginName . DS . 'controllers');
//             // Get a list of the files that have a file name that ends
//             // with controller.php
//             $files = $folder->findRecursive('.*_controller\.php');
// 
//             // Loop through the controllers we found in the plugins directory
//             foreach($files as $fileName) {
//                 // Get the base file name
//                 $file = basename($fileName);
// 
//                 // Get the controller name
//                 $file = Inflector::camelize(substr($file, 0, strlen($file)-strlen('_controller.php')));
//                 if (!preg_match('/^'. Inflector::humanize($pluginName). 'App/', $file)) {
//                     if (!App::import('Controller', $pluginName.'.'.$file)) {
//                         debug('Error importing '.$file.' for plugin '.$pluginName);
//                     } else {
//                         /// Now prepend the Plugin name ...
//                         // This is required to allow us to fetch the method names.
//                         $arr[] = Inflector::humanize($pluginName) . "/" . $file;
//                     }
//                 }
//             }
//         }
//         return $arr;
//     }

	
}
