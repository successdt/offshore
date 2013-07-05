<?php
class Page extends AppModel {
	public $validate = array(
		'title' => array(
		    'required' => array(
		        'rule' => array('notEmpty'),
		        'message' => 'A title is required'
		    )
		)
	); 
}