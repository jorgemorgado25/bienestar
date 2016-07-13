<?php
class AuditoriasController extends AppController {

	var $name = 'Auditorias';
	var $helpers = array('Html', 'Form', 'Javascript','Ajax');
	
	function beforeFilter()
	{
		$this->layout='admin';
		/*if($this->Session->check('administrador') == false){
			$this->redirect(array('controller'=>'sitio','action'=>'admin'));
		}
		if($this->Session->read('administrador.Administrador.tipo') < 3){
			$this->redirect(array('controller'=>'admin','action'=>'index'));
		}*/
		if($this->Session->check('user') == false){
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
		if($this->Session->read('user.User.nivel') == 1){
			$this->redirect(array('controller'=>'solicitantes','action'=>'index'));
		}
	}

	function index()
	{
		$this->Auditoria->recursive = -1;
		$this->set('auditorias', $this->Auditoria->find('all'));
	}
	
}
?>