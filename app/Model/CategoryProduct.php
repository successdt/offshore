<?php
class CategoryProduct extends AppModel {


	/**
	 * get product categories name
	 * @author duythanhdao@live.com
	 */
	public function getProductCategoriesName($productId) {
		$data = $this->find('list', array(
			'joins' => array(
				array(
					'alias' => 'Category',
					'table' => 'categories',
					'type' => 'LEFT',
					'conditions' => array(
						'Category.id = CategoryProduct.category_id'
					)				
				),
				
			),
			'conditions' => array(
				'CategoryProduct.product_id' => $productId
			),
			'fields' => array('Category.name')
		));
		
		return $data;
	}	
}