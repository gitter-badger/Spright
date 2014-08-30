<?php

class AdminController extends AdminAppController {
	
	public function index() {
		$this->redirect( array('action' => 'dashboard') );
	}
	
	public function dashboard() {
		
	}
	
}