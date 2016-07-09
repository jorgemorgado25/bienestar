<?php
class AdminController extends AppController {

	var $name = 'Admin';
	var $uses = array('User');

	function beforeFilter(){
		$this->layout='admin';
		if($this->Session->check('user') == false){
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
	}

	function change_password(){
		
	}

	function realizar_cambio_clave(){
		Configure::write('debug',0);
		$this->layout="ajax";
		$result=0;
		$administrador = $this->User->find('first',array(
			'conditions'=>array('User.id'=>$this->Session->read('user.User.id'))
		));
		if($administrador['User']['password'] == md5($this->data['current']))
		{
			$result = 1;
			$this->User->updateAll(
				array('User.password'=>"'".md5($this->data['new-password'])."'"),
				array('User.id'=>$this->Session->read('user.User.id'))
			);
		}
		$this->set(compact('result'));
	}
}