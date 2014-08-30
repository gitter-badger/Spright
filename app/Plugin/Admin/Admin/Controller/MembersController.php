<?php

class MembersController extends AdminAppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'create');
	}
	
	public function login() {
		$this->layout = 'login';
		if( $this->request->is('post') ) {
			if( $this->Auth->login() ) {
				$this->Member->login( $this->Auth->user('id') );
				$this->redirect( $this->Auth->redirectUrl() );
			}
			else {
				$this->setFlash( __('Invalid username or password.'), 'danger' );
			}
		}
	}
	
	public function logout() {
		$this->redirect( $this->Auth->logout() );
	}
	
	public function index() {
		
	}
	
	public function create() {
		if( $this->request->is('post') ) {
			$this->Member->save( $this->request->data );
			$this->setFlash('Member created.', 'success');
			$this->redirect( '/admin/dashboard' );
		}
	}
	
}