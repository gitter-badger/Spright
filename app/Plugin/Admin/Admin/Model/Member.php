<?php

App::uses('AuthComponent', 'Controller/Component');

class Member extends AdminAppModel {
	
	public $useTable = 'administrators';
	
	public function beforeSave($options = array()) {
		if( isset($this->data[$this->name]['password']) ) {
			$this->data[$this->name]['password'] = AuthComponent::password($this->data[$this->name]['password']);
		}
        return parent::beforeSave($options);
    }
	
	public function login($id) {
		$this->set('id', $id);
		$this->set('last_login', date('Y-m-d H:i:s'));
		$this->save();
	}
}
