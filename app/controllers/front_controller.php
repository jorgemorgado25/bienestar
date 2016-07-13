<?php
class FrontController extends AppController {

	var $name = 'Front';
	var $uses = array('User');

	function beforeFilter()
	{
		$this->layout='front';
	}

	function index()
	{
		
	}

	function login()
	{
		
	}

	function buscar_usuario()
	{
		Configure::write('debug',0);
		$this->layout="ajax";
		$this->User->recursive = -1;
		$usuario = $this->User->ffLogin($this->data['login'],$this->data['password']);
		if($usuario){

			if($usuario['User']['activo'] == 1)
			{
				$this->Session->write('user', $usuario);
				$this->Audi->reg($this->Session->read('user.User.id'), 'front','login',$usuario['User']['id'], $this->Session->read('user.User.login'), 'users/view/', 'Inicio de Sesión');
			}
		}
		$this->autoRender = false;		
		return json_encode($usuario['User']);
	}

	function logout()
	{
		$this->Audi->reg($this->Session->read('user.User.id'), 'front','logout',$this->Session->read('user.User.id'), $this->Session->read('user.User.login'), 'users/view/', 'Fin de la sesión');
		$this->Session->destroy('user');
		$this->redirect(array('controller'=>'front','action'=>'login'));
	}
}