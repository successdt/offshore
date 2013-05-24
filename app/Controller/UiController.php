<?php
/**
 * Ui controller
 * @author thanhdd@lifetimetech.vn
 */
class UiController extends AppController {
	public $name = 'ui';
	public $uses = array();
	
	public function index(){
		$this->layout = 'admin';
		
	}
}