<?php
class ProductController extends AppController {
	public $name = 'product';
	public $uses = array('Product', 'Category', 'CategoryProduct', 'CouponProduct', 'SearchFulltext');
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('admin_add', 'admin_login');
    }

	/**
	 * admin add new product
	 * @author duythanhdao@live.com
	 */
    public function admin_add() {
    	$validate = false;
    	$data = array();
    	$data['category'] = $this->Category->getList();
    	if ($this->request->is('post')) {
    		$saveData = $this->request->data; 
    		if(isset($saveData['Product']['description']) && $saveData['Product']['description']) {
	            $this->Product->create();
	            if ($this->Product->save($saveData)) {
	                $this->Session->setFlash(__('The product has been saved'));
	                $id = $this->Product->getLastInsertID();
	                //save product image
	                $image = $this->saveProductPhoto($id, $_FILES);
	                //update product data
	                $this->Product->set(array(
						'image_label' => $saveData['Product']['image_label'],
						'thumbnail_label' => $saveData['Product']['image_label'],
						'image' => $image['path'],
						'thumbnail' => $image['thumb_path']
					));
	                $this->Product->save();
	                
	                //save category_product
	                if(isset($saveData['category_id'] )){
		                foreach ($saveData['category_id'] as $category){
		                	$this->CategoryProduct->create();
		                	$this->CategoryProduct->save(array(
								'category_id' => $category,
								'product_id' => $id
							));
		                }	                	
	                }

	                //$this->redirect(array('action' => 'index'));
	            } else {
	                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
	            }    			
    		}
    		else {
    			$this->Session->setFlash(__('The product description is required.'));
    		}
        }
        $this->set('data', $data);
    }
  	
  	/**
  	 * manage product
  	 * @author duythanhdao@live.com
  	 */
	public function admin_manage() {
		if(isset($_GET['category_id']) && $_GET['category_id']) {
			$this->paginate = array(
				'limit' => 3,
				'order' => array('id' => 'desc'),
				'conditions' => array(
					'id' => $this->CategoryProduct ->find('list', array(
						'conditions' => array(
							'category_id' => $_GET['category_id']
						),
						'fields' => array('product_id')
					))
				),
				'fields' => array('id','sku', 'name', 'created_at', 'short_description', 'price', 'qty')
			);			
		}
		else {
			$this->paginate = array(
				'limit' => 3,
				'order' => array('id' => 'desc'),
				'fields' => array('id','sku', 'name', 'created_at', 'short_description', 'price', 'qty')
			);			
		}

		$data = $this->paginate('Product');

		$i = 0;
		$sort = $this->passedArgs;
		foreach($data as $product){
			$catName = $this->CategoryProduct->getProductCategoriesName($product['Product']['id']);
			$data[$i]['Product']['categories'] = implode(',', $catName);
			$i++;
		}
		$listCategory = $this->Category->getListCategory();
		$this->set('data', array('product' => $data, 'category' => $listCategory, 'sort' => $sort));
	}
    
    /**
     * delete product
     * @author duythanhdao@live.com
     */
	public function admin_delete(){
		
		if($this->request->is('post')){
			$params = $this->request->data;
			if(isset($params['Product']['id'])){
				$listId = $params['Product']['id'];
				$this->Product->delete($listId);
				$this->CategoryProduct->deleteAll(array(
					'product_id' => $listId
				));
				$this->CouponProduct->deleteAll(array(
					'product_id' => $listId
				));
				$this->SearchFulltext->deleteAll(array(
					'product_id' => $listId
				));
			}
		}
		$this->redirect(array('controller' => 'product', 'action' => 'manage'));	
	}
	
	/**
	 * edit product
	 * @author duythanhdao@live.com
	 */
	public function admin_edit($id = null){
		$data = array();
		
    	if ($this->request->is('post') && $id) {
    		$saveData = $this->request->data; 
    		if(isset($saveData['Product']['description']) && $saveData['Product']['description']) {
	            $this->Product->id = $id;
				//save product image
				$image = $this->saveProductPhoto($id, $_FILES);
				if($image['path']){
					$saveData['Product']['image'] = $image['path'];
					$saveData['Product']['thumbnail'] = $image['thumb_path'];					
				}
				unset($saveData['Product']['sku']);
				
	            if ($this->Product->save($saveData['Product'])) {
	                $this->Session->setFlash(__('The product has been saved'));
	                
	                //save category_product
	                if(isset($saveData['category_id'] )){
	                	$this->CategoryProduct->deleteAll(array('product_id' => $id));
		                foreach ($saveData['category_id'] as $category){
		                	$this->CategoryProduct->create();
		                	$this->CategoryProduct->save(array(
								'category_id' => $category,
								'product_id' => $id
							));
		                }	                	
	                }

	            } else {
	                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
	            }    			
    		}
    		else {
    			$this->Session->setFlash(__('The product description is required.'));
    		}
        }
        
		if($id){
			$product = $this->Product->find('first', array(
				'conditions' => array(
					'id' => $id
				)
			));
			$listCategory = $this->Category->getList();
			$data['category'] = $listCategory;
			$data['Product'] = $product['Product'];
			$data['category_product'] = $this->CategoryProduct->getProductCategoriesName($id);
		}
		$this->set('data', $data);
	}
	
    /**
     * upload product image
     * @author duythanhdao@live.com
     */
    public function saveProductPhoto($id, $file){
    	$dir = WWW_ROOT . 'img/product';
    	$data = array(
			'success' => false,
			'path' => '',
			'thumb_path' => ''
		);
		$imgFormat = array(
			'image/jpeg' => 'jpg',
			'image/png' => 'png'
		);
		if (!empty($file) && key_exists($file["data"]["type"]["Product"]["file"], $imgFormat)) {
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
				chmod($dir, 0777);
			}
			$tmp = $file['data']['tmp_name']["Product"]["file"];
			$name = $file["data"]["name"]["Product"]["file"];
			$fileName = explode('.', $name);
			$destination = $id . '.' . end($fileName);
			$realPath = $dir . DS . $destination;
			$type = $imgFormat[$file["data"]["type"]["Product"]["file"]];
			
			if($data['success'] = move_uploaded_file($tmp, $realPath)) {
				list($width, $height) = getimagesize($realPath);
				$percent = 150 / $height;
				if($width > $height){
					$percent = 150 / $width;
				}
				$newWidth = $width * $percent;
				$newHeight = $height * $percent;
				$thumbName = $id . '_thumb.' . end($fileName);
				$thumb = imagecreatetruecolor($newWidth, $newHeight);
				if($type == 'jpg'){
					$source = imagecreatefromjpeg($dir . DS . $destination);
					imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
					imagejpeg($thumb, $dir . DS . $thumbName);					
				}
				elseif ($type == 'png'){
					$source = imagecreatefrompng($dir . DS . $destination);
					imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
					imagepng($thumb, $dir . DS . $thumbName);					
				}
				$data['thumb_path'] = 'product/' . $thumbName;

			}
			$data['path'] = 'product/' . $destination;
		}
		return  $data;
    }
}