<?php
class DependenciasController extends AppController {

	var $name = 'Dependencias';
	var $uses = array('Nucleo','Dependencia');

	function beforeFilter(){
		$this->layout='admin';
		if($this->Session->check('user') == false){
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
	}

	function index() {
		$this->Dependencia->recursive = 0;
		$dependencias = $this->Dependencia->find('all');
		$this->set(compact('dependencias'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid dependencia', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('dependencia', $this->Dependencia->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Dependencia->create();
			if ($this->Dependencia->save($this->data)) {
				$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Dependencia creada exitosamente
				</div>');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dependencia could not be saved. Please, try again.', true));
			}
		}
		$nucleos = $this->Nucleo->find('list');
		$this->set(compact('nucleos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid dependencia', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Dependencia->save($this->data)) {
				$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Dependencia modificada exitosamente
				</div>');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dependencia could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Dependencia->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for dependencia', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Dependencia->delete($id)) {
			$this->Session->setFlash(__('Dependencia deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Dependencia was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
