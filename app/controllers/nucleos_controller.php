<?php
class NucleosController extends AppController {

	var $name = 'Nucleos';

	function beforeFilter(){
		$this->layout='admin';
		if($this->Session->check('user') == false){
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
	}

	function index() {
		$this->Nucleo->recursive = 0;
		$this->set('nucleos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid dependencia', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('nucleos', $this->Nucleo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			
			$this->redirect(array('action' => 'index'));
			/*
			$this->Nucleo->create();
			if ($this->Nucleo->save($this->data)) {
				$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Núcleo registrado exitosamente
				</div>');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dependencia could not be saved. Please, try again.', true));
			}
			*/
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Nucleo->save($this->data)) {
				$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Núcleo modificado exitosamente
				</div>');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dependencia could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Nucleo->read(null, $id);
		}
	}

}
