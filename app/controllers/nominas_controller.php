<?php
class NominasController extends AppController {

	var $name = 'Nominas';
	var $uses = array('Becado','Cabecera','Tipo');

	function beforeFilter()
	{
		$this->layout='admin';
		if($this->Session->check('user') == false)
		{
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
	}

	function index()
	{
		$this->Cabecera->recursive = 0;
		$this->set('cabeceras', $this->Cabecera->find('all'));
	}

	function montos()
	{
		if (!empty($this->data)) {

			$this->Tipo->updateAll(
				array('Tipo.monto' => $this->data['ayudantia']),
				array('Tipo.id' => '1')
			);
			$this->Tipo->updateAll(
				array('Tipo.monto' => $this->data['bolsa']),
				array('Tipo.id' => '2')
			);
			$this->Tipo->updateAll(
				array('Tipo.monto' => $this->data['prepara']),
				array('Tipo.id' => '3')
			);
			$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Montos actualizados exitosamente
				</div>
				');
		}

		$this->Tipo->recursive = -1;
		$ayudantia=$this->Tipo->read(null,1);
		$bolsa=$this->Tipo->read(null,2);
		$prepara=$this->Tipo->read(null,3);
		$this->set(compact('ayudantia','bolsa','prepara'));
	}

	function view($id = null)
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid Nomina', true));
			$this->redirect(array('action' => 'index'));
		}
		$nominas = $this->Cabecera->Nomina->find('all',array(
			'conditions' => array('Nomina.cabecera_id' => $id)
		));
		$cabecera = $this->Cabecera->read(null, $id);
		$this->set(compact('nominas','cabecera'));
	}

	function xls_nomina($id)
	{
		$this->layout="xls";
		if (!$id) {
			$this->Session->setFlash(__('Invalid Nomina', true));
			$this->redirect(array('action' => 'index'));
		}
		$nominas = $this->Cabecera->Nomina->find('all',array(
			'conditions' => array('Nomina.cabecera_id' => $id)
		));
		$cabecera = $this->Cabecera->read(null, $id);
		$this->set(compact('nominas','cabecera'));
	}

	function add()
	{
		$this->Tipo->recursive = -1;
		$mes = date('m');
		$mesmes = $this->Fechas->getMes($mes);
		$ano = date('Y');

		$becados = $this->Becado->find('all',array(
				'conditions'=>array(
					'Becado.activo' => '1',
					'Becado.tipo_id' => $this->data['tipo_id']
				)
			));

		if (!empty($this->data))
		{
			$fecha = $this->data['ano'].'-'.$this->data['mes'].'-28';
			$this->Cabecera->recursive = -1;			
			$cabecera=$this->Cabecera->find('first',array(
				'conditions'=>array(
					'Cabecera.tipo_id'=>$this->data['tipo_id'],
					'month(Cabecera.fecha)'=>$this->data['mes'],
					'year(Cabecera.fecha)'=>$this->data['ano']
				)
			));
			$this->Becado->recursive = -1;
			$becados = $this->Becado->find('all',array(
				'conditions'=>array(
					'Becado.activo' => '1',
					'Becado.tipo_id' => $this->data['tipo_id']
				)
			));

			if(count($becados) == 0)
			{
				$this->Session->setFlash('
				<div class="alert alert-danger text-center" role="alert">
					No hay beneficiados activos
				</div>
				');
				$this->redirect(array('controller' => 'nominas', 'action' => 'add'));
			}

			if ($cabecera)
			{
				$this->Session->setFlash('
				<div class="alert alert-danger text-center" role="alert">
					La nómina ya está creada
				</div>
				');
			}else
			{
				$this->Becado->recursive = -1;
				//Busco los becados a culminar
				$becados = $this->Becado->find('all',array(
					'conditions'=>array(
						
						//Retirar por mes
						//'Becado.fecha_fin < '=> $fecha,
						//'Becado.activo' => '1',
						//'Becado.tipo_id' => $this->data['tipo_id']
						//

						//Retirar por Año
						'Becado.ano_fin <= '=> $this->data['ano'],
						'Becado.culminado' => '0',
						'Becado.tipo_id' => $this->data['tipo_id']
					)
				));

				//Culmino los becados
				if($becados)
				{
					for($i=0; $i < count($becados); $i++)
					{
						
						//$this->Becado->updateAll(
						//	array('Becado.activo' => '0'),
						//	array('Becado.activo' => '0'),
						//	array('Becado.id' => $becados[$i]['Becado']['id'])
						//);
						
						$this->Becado->updateAll(
						    array(
						    	'Becado.activo' => '0',
						    	'Becado.culminado' => '1',
						    ),
				    		array('Becado.id' => $becados[$i]['Becado']['id'])
						);
						//Guarda staus en Activos
						$data = array(
							'becado_id' => $becados[$i]['Becado']['id'],
							'activo' => 0,
							'status' => 12,
							'observaciones' => 'Registro generado automáticamente, beca culminada',
							'ano_fin' => $becados[$i]['Becado']['ano_fin']
						);
						$this->Becado->Activo->create();
						$this->Becado->Activo->save($data);

						$data = array(
							'becado_id' => $becados[$i]['Becado']['id'],
							'culminado' => 1,
							'status' => 10,
							'observaciones' => 'Registro generado automáticamente, beca culminada',
							'ano_fin' => $becados[$i]['Becado']['ano_fin']
						);

						//crear status de culminado

						$this->Becado->Hculminado->create();
						$this->Becado->Hculminado->save($data);

						$data = array(
							'becado_id' => $becados[$i]['Becado']['id'],
							'activo' => 0,
							'status' => 12,
							'observaciones' => 'Registro generado automáticamente, beca culminada',
							'ano_fin' => $becados[$i]['Becado']['ano_fin']
						);				
					}
				}//if becados (culminar becados)

				//Crear nómina
				$tipo = $this->Tipo->read(null, $this->data['tipo_id']);
				$data = array(
					'tipo_id' => $this->data['tipo_id'],
					'fecha' => $fecha,
					'monto' => $tipo['Tipo']['monto']
				);
				//crear la cabecera
				$this->Cabecera->create();
				$this->Cabecera->save($data);
				$this->Cabecera->recursive = -1;
				$cabecera = $this->Cabecera->find('first', array(
					'conditions' => array(
						'Cabecera.tipo_id' => $this->data['tipo_id'],
						'Cabecera.fecha' => $fecha
					)
				));

				//Busco becados activos

				$this->Becado->recursive = -1;
				$becados = $this->Becado->find('all', array(
					'conditions' => array(
						'Becado.culminado' => 0,
						'Becado.tipo_id' => $this->data['tipo_id']
					)
				));

				$monto = 0;
				for($i=0; $i<count($becados); $i++)
				{

					if($becados[$i]['Becado']['activo'] == 0)
					{
						$monto = 0;
					}else
					{
						$monto = $tipo['Tipo']['monto'];
					}
					$data = array(
						'cabecera_id' => $cabecera['Cabecera']['id'],
						'nucleo_id' => $becados[$i]['Becado']['nucleo_id'],
						'tipo_id' => $this->data['tipo_id'],
						'becado_id' => $becados[$i]['Becado']['id'],
						'estudiante_id' => $becados[$i]['Becado']['estudiante_id'],
						'dependencia_id' => $becados[$i]['Becado']['dependencia_id'],
						'monto' => $monto,
						'fecha' => $fecha
					);

					$this->Cabecera->Nomina->create();
					$this->Cabecera->Nomina->save($data);

					$this->Audi->reg($this->Session->read('user.User.id'), 'front','login','-', $this->Session->read('user.User.login'), 'front/login/', 'Inicio de Sesión');
				}// for

				#desactivar bolsa de trabajo
				if($this->data["tipo_id"] == 2)
				{
					$this->Becado->updateAll(
					    array(
					    	'Becado.activo' => '0'
					    ),
			    		array('Becado.tipo_id' => 2, 'Becado.culminado' => 0)
					);

					for ($i = 0; $i < count($becados); $i++)
					{
						$data['becado_id'] = $becados[$i]['Becado']['id'];
						$data['activo'] = 0;
						$data['status'] = 13;
						$data['observaciones'] = 'Desactivado automáticamente - Pago mensual bolsa de trabajo.';
						$this->Becado->Activo->create();
						$this->Becado->Activo->save($data);
					}#end for
				}#end if

				$this->Audi->reg($this->Session->read('user.User.id'), 'nominas','add',$cabecera['Cabecera']['id'], $this->Session->read('user.User.login'), 'nominas/view/', 'Pago creado');
				
				$this->Session->setFlash('
				<div class="alert alert-success text-center" role="alert">
					Pagos registrados exitosamente
				</div>');
				$this->redirect(array('controller' => 'nominas', 'action' => 'index'));
				
			}// if cabecera
		}
		$meses = $this->Fechas->varMeses();
		$ayudantia = $this->Tipo->read(null, 1);
		$bolsa = $this->Tipo->read(null, 2);
		$prepara = $this->Tipo->read(null, 3);

		$tipos = array
		(
			1 => $ayudantia['Tipo']['nombre'],
			2 => $bolsa['Tipo']['nombre'],
			3 => $prepara['Tipo']['nombre']
		);
		$this->set(compact('meses','tipos', 'mes', 'mesmes', 'ano'));
	}	
}
