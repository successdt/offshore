<?php
class Category extends AppModel{
	
	public function getList(){
		return $this->getChildCategory(0);
	}
	
	public function getChildCategory($parentId){
		$return = array();
		$categories = $this->find('all', array(
			'conditions' => array(
				'parent_id' => $parentId 	
			),
			'fields' => array('id', 'name', 'parent_id')
		));
		
		foreach($categories as $category){
			$return[] = array(
				'Category' => $category['Category'],
				'child' => $this->getChildCategory($category['Category']['id'])
			);
		}
		return $return;
	}
}