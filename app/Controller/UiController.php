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
	public function dashboard(){
		$this->layout = 'admin';
	}
	public function catMan(){
		$this->layout = 'admin';
	}
	public function productMan(){
		$this->layout = 'admin';
	}
	public function pageMan(){
		$this->layout = 'admin';
	}
	public function userMan(){
		$this->layout = 'admin';
	}
	public function newProduct(){
		$this->layout = 'admin';
	}	
	public function newCat(){
		$this->layout = 'admin';
	}
	public function newPage(){
		$this->layout = 'admin';
	}
	public function newUser(){
		$this->layout = 'admin';
	}
	public function fileMan(){
		$this->layout = 'admin';
	}
}