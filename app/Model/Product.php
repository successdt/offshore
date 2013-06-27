<?php
class Product extends AppModel {
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A product name is required'
            )
        ),
		'price' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'price is required'
            )
        ),
        'sku' => array(
            'required' => array(
                'rule' => array('uniqueClick', 'notEmpty'),
                'message' => 'SKU is empty or already exist'
            )
        ),
    );
    
	/**
	 * check sku exist
	 * @author duythanhdao@live.com
	 */
    public function uniqueClick($sku) {
	   $count = $this->find('count', array(
	      'conditions' => array('sku' => $sku)
		));
	   return $count == 0;
	}
}