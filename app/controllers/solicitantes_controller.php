<?php
class SolicitantesController extends AppController {

	var $name = 'Solicitantes';
	var $uses = array('Solicitante','Estudiante','Academico');

	function beforeFilter()
	{
		$this->layout='admin';
		if($this->Session->check('user') == false){
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
	}

	function mover($solicitud_id)
	{
		if (!empty($this->data))
		{
			$this->data['status'] = 'pendiente';
			$this->Solicitante->Stsolicitud->create();
			$this->Solicitante->Stsolicitud->save($this->data);
			$this->Solicitante->updateAll(
				array('Solicitante.negada' => 0),
				array('Solicitante.id' => $this->data['solicitante_id'])
			);
			$this->Audi->reg($this->Session->read('user.User.id'), 'solicitantes','mover',$this->data['solicitante_id'],$this->Session->read('user.User.login'), 'solicitantes/view/', 'Solicitud movida a pendientes');
			$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Solicitud movida a pendientes exitosamente
				</div>');
			$this->redirect(array('action' => 'index'));
		}
		$solicitud = $this->Solicitante->find('first',array(
			'conditions' => array('Solicitante.id' => $solicitud_id)
		));
		$this->set(compact('solicitud'));
	}

	function index()
	{
		//$this->Solicitante->recursive = 0;
		$this->set('solicitantes', $this->Solicitante->find('all',array(
			'conditions'=>array(
				'Solicitante.becado' => '0',
				'Solicitante.negada' => '0'))
		));
	}

	function negadas()
	{
		$this->set('solicitantes', $this->Solicitante->find('all',array(
			'conditions'=>array(
				'Solicitante.becado' => '0',
				'Solicitante.negada' => '1'))
		));

	}

	function negar($id)
	{
		if (!empty($this->data))
		{
			$this->data['status'] = 'rechazada';
			$this->Solicitante->Stsolicitud->create();
			$this->Solicitante->Stsolicitud->save($this->data);
			$this->Solicitante->updateAll(
				array('Solicitante.negada' => 1),
				array('Solicitante.id' => $this->data['solicitante_id'])
			);
			$this->Audi->reg($this->Session->read('user.User.id'), 'solicitantes','negar',$this->data['solicitante_id'],$this->Session->read('user.User.login'), 'solicitantes/view/', 'Solicitud movida a rechazadas');
			$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Solicitud movida a rechazadas exitosamente
				</div>');
			$this->redirect(array('action' => 'negadas'));
		}
		$solicitud = $this->Solicitante->find('first',array(
			'conditions' => array('Solicitante.id' => $id)
		));
		$this->set(compact('solicitud'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid solicitante', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('solicitante', $this->Solicitante->read(null, $id));
	}

	function pdf_solicitud($id){
		$this->layout='pdf';
		$this->set('title_for_layout','Solicitud de Beneficio');
		$est=$this->Estudiante->read(null, $id);
		$ac=$this->Estudiante->Academico->ffEstudianteId($id);

		//$solicitud = $this->Solicitante->ffEstudianteId($id);
		$solicitud = $this->Solicitante->find('first',array(
			'conditions' => array('Solicitante.estudiante_id' => $id)
		));

		$estudianteid = $est['Estudiante']['id'];

		//$solicitud = $this->Solicitante->read(null, $id);
		$this->set(compact('est','ac','solicitud','estudianteid'));
	}

	function buscar_codigo($codigo){
		$this->layout="ajax";
		$this->Solicitante->recursive=-1;		
		$solicitante=$this->Solicitante->ffCodigo($codigo);
		$this->autoRender = false;
		return json_encode($solicitante['Solicitante']);
	}

	function buscar_email($email){
		$this->layout="ajax";
		$this->Estudiante->recursive=-1;		
		$r=$this->Estudiante->buscar_email($email);
		$this->autoRender = false;
		return json_encode($r['Estudiante']);
	}

	function buscar_cedula($cedula)
	{
		$this->layout="ajax";
		$this->Estudiante->recursive = -1;
		$estudiante = $this->Estudiante->ffCedula($cedula);
		$this->autoRender = false;

		$status = 0; // No existe

		if($estudiante)
		{
			$id = $estudiante['Estudiante']['id'];
			$status = 1;
			//busco en becados
			$becado = $this->Estudiante->Becado->ffEstudianteId($id);
			if ($becado)
			{
				$status = 'becado';
			}else
			{
				//Busco en solicitudes
				$solicitud = $this->Estudiante->Solicitante->ffEstudianteId($id);
				if($solicitud['Solicitante']['negada'])
				{
					$status = 'rechazado';
				}else
				{
					$status = 'pendiente';
				}
			}
		}
		//return json_encode($estudiante['Estudiante']);
		return json_encode($status);

	}

	function buscar_cedula_edit($id,$cedula){
		$this->layout="ajax";
		$this->Estudiante->recursive=-1;		
		$estudiante=$this->Estudiante->buscar_cedula_edit($id,$cedula);
		$this->autoRender = false;
		return json_encode($estudiante['Estudiante']);
	}

	function buscar_codigo_edit($id,$codigo){
		$this->layout="ajax";
		$this->Solicitante->recursive=-1;		
		$solicitante=$this->Solicitante->buscar_codigo_edit($id,$codigo);
		$this->autoRender = false;
		return json_encode($solicitante['Solicitante']);
	}

	function buscar_email_edit($id,$email){
		$this->layout="ajax";
		$this->Estudiante->recursive=-1;		
		$estudiante=$this->Estudiante->buscar_email_edit($id,$email);
		$this->autoRender = false;
		return json_encode($estudiante['Estudiante']);
	}

	function add() {
		if (!empty($this->data))
		{
			$this->data['fecha_nac'] = $this->Fechas->fechaAbase($this->data['fecha_nac']);
			$this->Estudiante->save($this->data);
			$estudiante = $this->Estudiante->ffCedula($this->data['cedula']);
			$this->data['estudiante_id'] = $estudiante['Estudiante']['id'];
			$this->Academico->save($this->data);
			$this->Solicitante->save($this->data);
			//$this->Solicitante->Stsolicitud->save($this->data);
			$sol = $this->Solicitante->ffEstudianteId($this->data['estudiante_id']);

			$this->data['solicitante_id'] = $sol['Solicitante']['id'];
			$this->data['status'] = 'pendiente';
			$this->data['observaciones'] = 'Registro generado automáticamente';
			
			$this->Solicitante->Stsolicitud->save($this->data);

			$this->Audi->reg($this->Session->read('user.User.id'), 'solicitantes','add',$sol['Solicitante']['id'], $this->Session->read('user.User.login'), 'solicitantes/view/', 'Registró Solicitud');
			$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Registro creado exitosamente
				</div>
				');
			$this->redirect(array('action' => 'index'));
		}
		$carreras = $this->Academico->Carrera->find('list');
		$this->set(compact('carreras'));
	}

	function edit($solicitud_id = null) {
		if (!$solicitud_id && empty($this->data))
		{
			$this->Session->setFlash(__('Invalid solicitante', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data))
		{
			$this->data['fecha_nac'] = $this->Fechas->fechaAbase($this->data['fecha_nac']);

			$this->Solicitante->read(null, $this->data['id']);
			$this->Solicitante->save($this->data);
			
			$this->Estudiante->read(null, $this->data['estudiante_id']);
			$this->data['id'] = $this->data['estudiante_id'];
			$this->Estudiante->save($this->data);

			$this->Academico->read(null, $this->data['estudiante_id']);
			$this->data['id'] = $this->data['academico_id'];
			$this->Academico->save($this->data);

			$sol = $this->Solicitante->ffEstudianteId($this->data['estudiante_id']);
			$this->Audi->reg($this->Session->read('user.User.id'), 'solicitantes','edit',$sol['Solicitante']['id'], $this->Session->read('user.User.login'), 'solicitantes/view/', 'Solicitud Modificada');
			$this->Session->setFlash('
			<div class="alert alert-success text-center" role="alert">
				Registro editado exitosamente
			</div>
			');
			$this->redirect(array('action' => 'index'));
		}

		if (empty($this->data))
		{
			//variable que se manda a la vista con la informacion
			$this->data = $this->Solicitante->read(null, $solicitud_id);
			//busco el estudiante 
			$est = $this->Estudiante->read(null, $this->data['Solicitante']['estudiante_id']);
			$ac = $this->Academico->ffEstudianteId($this->data['Estudiante']['id']);
		}
		$carreras = $this->Academico->Carrera->find('list');
		$this->set(compact('estudiantes','carreras','ac', 'est'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for solicitante', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Solicitante->delete($id)) {
			$this->Session->setFlash(__('Solicitante deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Solicitante was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
