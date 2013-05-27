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
	public function login(){
		$this->layout = 'not_login';
	}
}