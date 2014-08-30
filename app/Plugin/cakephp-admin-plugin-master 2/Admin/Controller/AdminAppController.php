<?php

App::uses('AppController', 'Controller');

class AdminAppController extends AppController {
	
	public $uses = array('Admin.Member');
	
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => '/admin/dashboard',
			'logoutRedirect' => '/admin/login',
			'loginAction' => '/admin/login',
		)
	);
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'userModel' => 'Admin.Member', 
				'fields' => array('username' => 'email')
			),
			'Form'
		);
	}
	
	public function setFlash($message, $type = 'info') {
		if( $type === 'error' ) $type = 'danger';
		$this->Session->setFlash( $message, 'flash', array('type' => $type) );
	}
	
	public function index() {
		
	}
	
}