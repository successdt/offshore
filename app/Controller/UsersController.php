<?php
class UsersController extends AppController {
	public $name = 'users';
	public $uses = array('User');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_add', 'admin_login');
    }

	/**
	 * admin login page
	 * @author duythanhdao@live.com
	 */
	public function admin_login(){
		$this->layout = 'popup';
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
 				$this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}
	public function admin_logout() {
	    $this->redirect($this->Auth->logout());
	}
	
	/**
	 * manage user
	 * @author duythanhdao@live.com
	 */
	public function admin_manage(){

    	if ($this->request->is('post')) {
    		$saveData = $this->request->data;
            $this->User->create();
            if ($this->User->save($saveData)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('controller' => 'users', 'action' => 'manage'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
		
		$this->paginate = array(
			'limit' => 20,
			'order' => array('id' => 'desc'),
			'fields' => array('id','username', 'firstname', 'lastname', 'role', 'is_active')
		);			
		$data = $this->paginate('User');
		$sort = $this->passedArgs;
		$this->set('data', array('User' => $data, 'sort' => $sort));			
	}
	
    /**
     * delete users
     * @author duythanhdao@live.com
     */
	public function admin_delete(){
		
		if($this->request->is('post')){
			$params = $this->request->data;
			if(isset($params['User']['id']) && isset($params['action-type'])){
				$listId = $params['User']['id'];
				if($params['action-type'] == 'delete') {
				    if ($this->User->delete($listId)) {
			            $this->Session->setFlash(__('User(s) deleted'));
			        } else {
			        	$this->Session->setFlash(__('User(s) was not deleted'));
					}				
				}
				if($params['action-type'] == 'deactive') {
					$this->User->updateAll(array('is_active' => 0), array('id' => $listId));
				}
				if($params['action-type'] == 'active') {
					$this->User->updateAll(array('is_active' => 1), array('id' => $listId));
				}

			}
		}
		$this->redirect(array('controller' => 'users', 'action' => 'manage'));	
	}
	
	/**
	 * edit user
	 * @author duythanhdao@live.com
	 */
	public function admin_edit($userId = null) {
		$user = array();
		
    	if ($this->request->is('post') && $userId) {
    		$saveData = $this->request->data; 
            $this->User->id = $userId;
            if(!isset($saveData['User']['password']) || empty($saveData['User']['password']))
				unset($saveData['User']['password']);
            if ($this->User->save($saveData['User'])) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }    			
        }
        
		if(!$userId) {
			$this->Session->setFlash(__('Empty user id'));
		} else {
			$user = $this->User->find('first', array(
				'conditions' => array('id' => $userId)
			));
		}
		
		$this->paginate = array(
			'limit' => 20,
			'order' => array('id' => 'desc'),
			'fields' => array('id','username', 'firstname', 'lastname', 'role', 'is_active')
		);			
		$data = $this->paginate('User');
		$sort = $this->passedArgs;
		$this->set('data', array('User' => $data, 'sort' => $sort, 'edit' => $user));
		$this->render('admin_manage');	
	}
	
	
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if (1) {
            $this->User->create();
            $data = array(
				'username' => 'admin',
				'password' => 'ltt123',
				'role' => 'super_admin',
				'is_active' => '1'
			);
            if ($this->User->save($data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}