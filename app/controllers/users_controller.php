<?php
class UsersController extends AppController
{

	var $name = 'users';
	var $helpers = array('Html', 'Form', 'Javascript','Ajax');
	var $components = array('RequestHandler');
	var $uses = "User";
	
	function beforeFilter()
	{
		$this->layout='admin';
		if($this->Session->check('user') == false)
		{
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
		if($this->Session->read('user.User.nivel') == 1)
		{
			$this->redirect(array('controller'=>'solicitantes','action'=>'index'));
		}
	}

	function index()
	{
		$this->User->recursive = -1;
		$this->set('administradores', $this->User->find('all'));
	}
	
	function add()
	{
		if (!empty($this->data))
		{

			$user = $this->User->find('first',array(
				'conditions' => array('User.login' => $this->data['User']['login'])
			));

			if($user)
			{
				$this->Session->setFlash('
				<div class="alert alert-danger text-center" role="alert">
					El login ya está registrado
				</div>
				');
				$this->redirect(array('action' => 'add'));
			}else{
				$this->data['User']['password'] = md5($this->data['User']['password']);
				$this->User->create();
				if ($this->User->save($this->data))
				{
					$user = $this->User->ffLog($this->data['User']['login']);
					$this->Audi->reg($this->Session->read('user.User.id'), 'users','add',$user['User']['id'], $this->Session->read('user.User.login'), 'users/view/', 'Administrador creado');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The usuario could not be saved. Please, try again.', true));
				}
			}
		}
	}
	function edit($id = null)
	{
		if (!$id)
		{
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data))
		{
			if ($this->User->save($this->data))
			{
				$user = $this->User->ffId($this->data['User']['id']);
				$this->Audi->reg($this->Session->read('user.User.id'), 'users','edit', $user['User']['id'], $this->Session->read('user.User.login'), 'users/view/', 'Administrador modificado');
				$this->redirect(array('action' => 'index'));
			}else
			{
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data))
		{
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id)
	{
		if ($this->User->delete($id))
		{
			$this->redirect(array('action'=>'index'));
		}
	}

	function view($id)
	{
		$this->data = $this->User->read(null, $id);
	}	
}
?>