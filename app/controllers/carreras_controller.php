<?php
class CarrerasController extends AppController {

	var $name = 'Carreras';

	function beforeFilter(){
		$this->layout='admin';
		if($this->Session->check('user') == false){
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
	}

	function index() {
		$this->Carrera->recursive = 0;
		$this->set('carreras', $this->paginate());
	}

	function add() {
		if (!empty($this->data)) {

			$cr = $this->Carrera->find('first',array(
				'conditions' => array('Carrera.codigo' => $this->data['codigo'])
			));
			if($cr)
			{
				$this->Session->setFlash('
				<div class="alert alert-danger text-center" role="alert">
					El código se encuentra registrado
				</div>');
				$this->redirect(array('action' => 'add'));
			}
			
			$this->Carrera->create();
			if ($this->Carrera->save($this->data)) {
				$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Carrera registrada exitosamente
				</div>');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dependencia could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data))
		{
			//valido la existencia del codigo

			$cr = $this->Carrera->find('first',array(
				'conditions' => array(
					'Carrera.codigo' => $this->data['codigo'],
					'Carrera.id !=' =>$this->data['id'])
			));
			if($cr)
			{
				$this->Session->setFlash('
				<div class="alert alert-danger text-center" role="alert">
					El código se encuentra registrado
				</div>');
				$this->redirect(array('action' => 'edit', $this->data['id']));
			}

			if ($this->Carrera->save($this->data)) {
				$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Carrera modificada exitosamente
				</div>');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dependencia could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Carrera->read(null, $id);
		}
	}

}
