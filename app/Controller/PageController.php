<?php
class PageController extends AppController {
	public $name = 'page';
	public $uses = array('Page');
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('admin_add', 'admin_login');
    }
    
    /**
     * add new page
     * @author duythanhdao@live.com
     */
	public function admin_add(){
    	$validate = false;
    	$data = array();
    	if ($this->request->is('post')) {
    		$saveData = $this->request->data;
            $this->Page->create();
            if ($this->Page->save($saveData)) {
                $this->Session->setFlash(__('The page has been saved'));
                $this->redirect(array('controller' => 'page', 'action' => 'manage'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }    			
        }
        $this->set('data', $data);		
	}
	
	/**
	 * manage pages
	 * @author duythanhdao@live.com
	 */
	public function admin_manage(){
		
		$this->paginate = array(
			'limit' => 3,
			'order' => array('id' => 'desc'),
			'fields' => array('id','title', 'is_actived')
		);			
		$data = $this->paginate('Page');

		$i = 0;
		$sort = $this->passedArgs;
		$this->set('data', array('page' => $data, 'sort' => $sort));		
	}
	
	/**
	 * edit page
	 */
	public function admin_edit($pageId = null){
		$data =  array();
		
    	if ($this->request->is('post') && $pageId) {
    		$saveData = $this->request->data; 
            $this->Page->id = $pageId;
			
            if ($this->Page->save($saveData['Page'])) {
                $this->Session->setFlash(__('The page has been saved'));
                
            } else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.'));
            }    			
        }		
		if($pageId) {
			$page = $this->Page->find('first', array(
				'conditions' => array(
					'id' => $pageId
				)
			));
			$data['page'] = $page['Page'];		
		}
		
		$this->set('data', $data);
		$this->render('admin_add');
	}
	
    /**
     * delete page
     * @author duythanhdao@live.com
     */
	public function admin_delete(){
		
		if($this->request->is('post')){
			$params = $this->request->data;
			if(isset($params['Page']['id'])){
				$listId = $params['Page']['id'];
				$this->Page->delete($listId);
			}
		}
		$this->redirect(array('controller' => 'page', 'action' => 'manage'));	
	}
}