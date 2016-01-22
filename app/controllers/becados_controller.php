<?php
class BecadosController extends AppController {

	var $name = 'Becados';
	var $uses = array('Becado', 'Estudiante','Academico','Nucleo','Dependencia','Solicitante','Tipo');

	function beforeFilter()
	{
		$this->layout='admin';
		if($this->Session->check('user') == false){
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
	}

	function index()
	{

		$this->Becado->recursive = 0;
		$this->set('becados', $this->Becado->find('all',array(
			'conditions'=>array('Becado.activo'=>'1')
		)));
	}

	function inactivos()
	{
		$this->Becado->recursive = 0;
		$this->set('becados', $this->Becado->find('all',array(
			'conditions'=>array('Becado.activo' => '0', 'Becado.culminado' => '0')
		)));
	}

	function culminados()
	{
		$this->Becado->recursive = 0;
		$this->set('becados', $this->Becado->find('all',array(
			'conditions'=>array('Becado.culminado' => '1')
		)));
	}

	function desactivar_todos()
	{
		$tipos = $this->Tipo->find('list');
		$this->set(compact('tipos'));
		if (!empty($this->data))
		{
			$this->Becado->recursive = -1;
			$becados = $this->Becado->find('all',array(
				'conditions' => array(
					'Becado.tipo_id' => $this->data['tipo_id'],
					'Becado.activo' => 1,
					'Becado.culminado' => 0
				)
			));

			for ($i = 0; $i < count($becados); $i++)
			{
				$data['becado_id'] = $becados[$i]['Becado']['id'];
				$data['activo'] = 0;
				$data['status'] = 13;
				$data['observaciones'] = 'Desactivado por el Administrador del sistema. Debe consignar recaudos anuales.';
				$this->Becado->Activo->create();
				$this->Becado->Activo->save($data);
			}
			$this->Becado->updateAll(
				array(
					'Becado.activo' => 0
					),
				array('Becado.activo' => 1)
			);

			$this->Tipo->recursive = -1;
			$tipo = $this->Tipo->find('first', array(
				'conditions' => array('Tipo.id' => $this->data['tipo_id'])
			));

			$this->Audi->reg($this->Session->read('user.User.id'), 'Becados', 'desactivar_todos', 0,$this->Session->read('user.User.login'), 'becados/inactivos/', 'Beneficiados: ' . $tipo['Tipo']['nombre'] . ' - desactivar todos');
			$this->Session->setFlash('
			<div class="alert alert-success text-center" role="alert">
				Beneficiados desactivados exitosamente
			</div>
			');
			$this->redirect(array('action' => 'inactivos'));
		}
	}

	function edit_profile($estudiante_id)
	{
		$becado = $this->Becado->find('first',array(
			'conditions'=>array('Becado.estudiante_id' => $estudiante_id)
		));
		if (!empty($this->data))
		{

			$this->data['fecha_nac'] = $this->Fechas->fechaAbase($this->data['fecha_nac']);
			
			$this->Estudiante->read(null, $this->data['estudiante_id']);
			$this->data['id'] = $this->data['estudiante_id'];
			$this->Estudiante->save($this->data);

			$this->Academico->read(null, $this->data['academico_id']);
			$this->data['id'] = $this->data['academico_id'];
			$this->Academico->save($this->data);
			$this->Audi->reg($this->Session->read('user.User.id'), 'Becados','edit_profile',$this->data['becado_id'],$this->Session->read('user.User.login'), 'becados/view/', 'Estudiante datos modificados');
			$this->Session->setFlash('
			<div class="alert alert-success text-center" role="alert">
				Datos modificados exitosamente
			</div>
			');
			$this->redirect(array('action' => 'view',$this->data['becado_id']));
		}
		$this->data = $this->Estudiante->read(null, $estudiante_id);
		$ac = $this->Academico->ffEstudianteId($estudiante_id);
		$est = $this->Estudiante->read(null, $estudiante_id);
		$carreras = $this->Academico->Carrera->find('list');
		$this->Becado->recursive = -1;
		

		$this->set(compact('ac','est','carreras','becado'));
	}

	function buscar_cedula()
	{
		if (!empty($this->data))
		{
			$estudiante = $this->Estudiante->ffCedula($this->data['cedula']);
			if($estudiante)
			{

				$solicitud = $this->Solicitante->ffEstudianteId($estudiante['Estudiante']['id']);

				if($solicitud['Solicitante']['negada'] == 1)
				{
					$this->Session->setFlash('
						<div class="alert alert-danger text-center" role="alert">
							El estudiante tiene una solicitud negada
						</div>
						');
					$this->redirect(array('action' => 'buscar_cedula'));
				}

				$becado = $this->Becado->ffEstudianteId($estudiante['Estudiante']['id']);
				if($becado){
					$this->Session->setFlash('
						<div class="alert alert-danger text-center" role="alert">
							El estudiante ya es beneficiado
						</div>
						');
					$this->redirect(array('action' => 'buscar_cedula'));
				}
				$this->redirect(array('action' => 'add',$this->data['cedula']));
			}else{
				$this->redirect(array('action' => 'add_new',$this->data['cedula']));
			}
		}
	}

	function view($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(__('Invalid becado', true));
			$this->redirect(array('action' => 'index'));
		}
		$becado=$this->Becado->read(null, $id);
		$est=$this->Estudiante->read(null,$becado['Becado']['estudiante_id']);

		$academico = $this->Academico->find('first',array(
						'conditions' => array(
							'Academico.estudiante_id' => 11
						)
					));

		$hact = $this->Becado->Activo->find('all',array(
			'conditions'=>array('Activo.becado_id'=>$id)
		));
		$hcul = $this->Becado->Hculminado->find('all',array(
			'conditions'=>array('Hculminado.becado_id'=>$id)
		));
		$hdep = $this->Becado->Hdependencia->find('all',array(
			'conditions'=>array('Hdependencia.becado_id'=>$id)
		));

		$this->set('arrActivo',$this->arrActivo);
		$this->set('arrInactivo',$this->arrInactivo);
		$this->set('arrCulminadoSi',$this->arrCulminadoSi);
		$this->set('arrCulminadoNo',$this->arrCulminadoNo);
		$this->set(compact('hdep', 'hcul', 'hact','est', 'becado','dependencias','academico'));
	}


	//Actualizo la dependencia
	function update_dependencia($becado_id = null)
	{
		$becado = $this->Becado->read(null, $becado_id);
		$nucleos = $this->Becado->Nucleo->find('list');
		$dependencias = $this->Becado->Dependencia->find('list',array(
			'conditions' => array('Dependencia.nucleo_id' => $becado['Becado']['nucleo_id'])
		));
		$this->set(compact('becado','nucleos','dependencias'));

		if (!empty($this->data))
		{
			$this->Becado->Hdependencia->create();
			$this->Becado->Hdependencia->save($this->data);
			$this->Becado->updateAll(
			    array(
			    	'Becado.dependencia_id' => $this->data['dependencia_id'],
			    	'Becado.nucleo_id' => $this->data['nucleo_id']
			    ),
	    		array('Becado.id' => $this->data['becado_id'])
			);
			$this->Audi->reg($this->Session->read('user.User.id'), 'Becados','update_dependencia',$this->data['becado_id'],$this->Session->read('user.User.login'), 'becados/view/', 'Beneficiado dependencia modificada');
			$this->Session->setFlash('
			<div class="alert alert-success text-center" role="alert">
				Status actualizado exitosamente
			</div>
			');
			$this->redirect(array('action' => 'view', $this->data['becado_id']));
		}
	}

	//Actualizo el Historial de activo
	function update_activo($becado_id = null)
	{
		$becado = $this->Becado->read(null, $becado_id);
		$this->set(compact('becado'));
		$this->set('arrActivo',$this->arrActivo);
		$this->set('arrInactivo',$this->arrInactivo);

		if (!empty($this->data))
		{
			$this->Becado->Activo->create();
			$this->Becado->Activo->save($this->data);
			$this->Becado->updateAll(
				array(
					'Becado.activo' => $this->data['activo']
					//'Becado.ano_fin' => $this->data['ano_fin']
					),
				array('Becado.id' => $this->data['becado_id'])
			);
			$this->Audi->reg($this->Session->read('user.User.id'), 'Becados','update_activo',$this->data['becado_id'],$this->Session->read('user.User.login'), 'becados/view/', 'Beneficiado historial activo modificado');
			$this->Session->setFlash('
			<div class="alert alert-success text-center" role="alert">
				Status actualizado exitosamente
			</div>
			');
			$this->redirect(array('action' => 'view', $this->data['becado_id']));
		}
		
	}

	//Actualizo el Histotiral de culminado	
	function update_culminado($becado_id = null)
	{
		$becado = $this->Becado->read(null, $becado_id);
		$this->set(compact('becado'));
		$this->set('arrCulminadoNo',$this->arrCulminadoNo);
		$this->set('arrCulminadoSi',$this->arrCulminadoSi);

		if (!empty($this->data))
		{
			$this->Becado->Hculminado->create();
			$this->Becado->Hculminado->save($this->data);

			if($this->data['culminado'] == 1)
			{
				$activo = 0;
				$datos = array('becado_id' => $this->data['becado_id'], 'activo' => $activo, 'status' => 12, 'observaciones' => 'Culminó el Beneficio');
			}else
			{
				$activo = 1;
				$datos = array('becado_id' => $this->data['becado_id'], 'activo' => $activo, 'status' => 3, 'observaciones' => 'Reincorporado');
			}

			$this->Becado->Activo->create();
			$this->Becado->Activo->save($datos);

			$this->Becado->updateAll(
				array(
					'Becado.culminado' => $this->data['culminado'],
					'Becado.ano_fin' => $this->data['ano_fin'],
					'Becado.activo' => $activo
					),
				array('Becado.id' => $this->data['becado_id'])
			);
			$this->Audi->reg($this->Session->read('user.User.id'), 'Becados','update_culminado',$this->data['becado_id'],$this->Session->read('user.User.login'), 'becados/view/', 'Beneficiado historial culminado modificado');
			$this->Session->setFlash('
			<div class="alert alert-success text-center" role="alert">
				Status actualizado exitosamente
			</div>
			');
			$this->redirect(array('action' => 'view', $this->data['becado_id']));
		}
	}

	function buscar_dependencia($nucleo)
	{
		//Configure::write('debug',0);
		$this->layout="ajax";
		$this->autoRender = false;
		$this->Dependencia->recursive = -1;
		$dep = $this->Dependencia->find('all',array(
			'conditions' => array('Dependencia.nucleo_id' => $nucleo)
		));
		return json_encode($dep);
	}



	function add($cedula)
	{

		if (!empty($this->data))
		{

			$this->data['fecha_fin'] = $this->data['ano_fin'].'-'.-$this->data['mes_fin'].'-28';

			$this->Becado->create();
			$this->Becado->save($this->data);
			
			$becado = $this->Becado->ffEstudianteId($this->data['estudiante_id']);
			$this->data['becado_id'] = $becado['Becado']['id'];

			$this->Becado->Activo->create();
			$this->Becado->Activo->save($this->data);

			$this->Becado->Hculminado->create();
			$this->Becado->Hculminado->save($this->data);

			$this->Becado->Hdependencia->create();
			$this->Becado->Hdependencia->save($this->data);

			$this->Audi->reg($this->Session->read('user.User.id'), 'Becados','add',$becado['Becado']['id'], $this->Session->read('user.User.login'), 'becados/view/', 'Beneficiado Registrado');

			$this->Estudiante->Solicitante->updateAll(
			    array('Solicitante.becado' => 1),
    			array('Solicitante.estudiante_id' => $this->data['estudiante_id'])
			);

			$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Registro creado exitosamente
				</div>
				');
			$this->redirect(array('action' => 'index'));
		}
		if (empty($this->data))
		{			
			$est=$this->Estudiante->ffCedula($cedula);
			$ac=$this->Estudiante->Academico->ffEstudianteId($est['Estudiante']['id']);
		}
		$meses=$this->Fechas->varMeses();
		//$dependencias = $this->Becado->Dependencia->find('list');
		$tipos = $this->Becado->Tipo->find('list');
		$nucleos = $this->Nucleo->find('list');
		$this->set(compact('est', 'tipos','cedula','ac','meses','nucleos'));
	}

	function add_new($cedula = null)
	{
		//SELECT * FROM `becados` WHERE fecha_fin >= '2017-07-29'
		$carreras = $this->Academico->Carrera->find('list');
		$dependencias = $this->Becado->Dependencia->find('list');
		$nucleos = $this->Nucleo->find('list');
		$tipos = $this->Becado->Tipo->find('list');
		$meses=$this->Fechas->varMeses();
		$this->set(compact('carreras', 'dependencias', 'tipos','meses','cedula','nucleos'));
		if (!empty($this->data))
		{
			$estudiante = $this->Estudiante->ffCedula($this->data['cedula']);
			if($estudiante)
			{
				$this->Session->setFlash('
				<div class="alert alert-danger text-center" role="alert">
					La cédula se encuentra registrada
				</div>
				');
			$this->redirect(array('action' => 'index'));
			}
			$this->data['fecha_nac']=$this->Fechas->fechaAbase($this->data['fecha_nac']);
			$this->Estudiante->create();
			$this->Estudiante->save($this->data);
			$est = $this->Estudiante->ffCedula($this->data['cedula']);
			$this->data['estudiante_id']=$est['Estudiante']['id'];
			$this->Academico->create();
			$this->Academico->save($this->data);
			$this->data['fecha_fin'] = $this->data['ano_fin'].'-'.-$this->data['mes_fin'].'-28';
			$this->Becado->create();
			$this->Becado->save($this->data);
			$becado=$this->Becado->ffEstudianteId($est['Estudiante']['id']);
			$this->data['becado_id'] = $becado['Becado']['id'];
			$this->Becado->Activo->create();
			$this->Becado->Activo->save($this->data);
			$this->Becado->Hculminado->create();
			$this->Becado->Hculminado->save($this->data);
			$this->Becado->Hdependencia->create();
			$this->Becado->Hdependencia->save($this->data);
			$this->Audi->reg($this->Session->read('user.User.id'), 'Becados','add',$becado['Becado']['id'], $this->Session->read('user.User.login'), 'becados/view/', 'Beneficiado Registrado');
			$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Registro creado exitosamente
				</div>
				');
			$this->redirect(array('action' => 'index'));
		}
	}
}
