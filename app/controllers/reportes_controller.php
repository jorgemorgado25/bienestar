<?php
class ReportesController extends AppController {

	var $name = 'Reportes';
	var $uses = array('Estudiante', 'Becado','Cabecera','Tipo','Nucleo','Nomina');

	function beforeFilter()
	{
		$this->layout='admin';
		if($this->Session->check('user') == false)
		{
			$this->redirect(array('controller'=>'front','action'=>'login'));
		}
	}

	function total_general()
	{
		if (!empty($this->data))
		{
			$this->redirect(array('action' => 'pdf_total_general',$this->data['mes'],$this->data['ano']));
		}
		$meses = $this->Fechas->varMeses();
		$this->set(compact('meses'));
	}

	function pdf_total_general($mes, $ano)
	{
		$this->layout = 'pdf';
		$t_m_ayudantia = $this->Nomina->query("select COUNT(nominas.id) as total FROM nominas JOIN estudiantes ON estudiantes.id = nominas.estudiante_id where year(nominas.fecha) = " . $ano . " and month(fecha) = " . $mes . " and tipo_id = 1 and estudiantes.genero = 'm'");
		$t_f_ayudantia = $this->Nomina->query("select COUNT(nominas.id) as total FROM nominas JOIN estudiantes ON estudiantes.id = nominas.estudiante_id where year(nominas.fecha) = " . $ano . " and month(fecha) = " . $mes . " and tipo_id = 1 and estudiantes.genero = 'f'");
		$t_f_bolsa = $this->Nomina->query("select COUNT(nominas.id) as total FROM nominas JOIN estudiantes ON estudiantes.id = nominas.estudiante_id where year(nominas.fecha) = " . $ano . " and month(fecha) = " . $mes . " and tipo_id = 2 and estudiantes.genero = 'f'");
		$t_m_bolsa = $this->Nomina->query("select COUNT(nominas.id) as total FROM nominas JOIN estudiantes ON estudiantes.id = nominas.estudiante_id where year(nominas.fecha) = " . $ano . " and month(fecha) = " . $mes . " and tipo_id = 2 and estudiantes.genero = 'm'");
		$t_f_preparaduria = $this->Nomina->query("select COUNT(nominas.id) as total FROM nominas JOIN estudiantes ON estudiantes.id = nominas.estudiante_id where year(nominas.fecha) = " . $ano . " and month(fecha) = " . $mes . " and tipo_id = 3 and estudiantes.genero = 'f'");
		$t_m_preparaduria = $this->Nomina->query("select COUNT(nominas.id) as total FROM nominas JOIN estudiantes ON estudiantes.id = nominas.estudiante_id where year(nominas.fecha) = " . $ano . " and month(fecha) = " . $mes . " and tipo_id = 3 and estudiantes.genero = 'm'");
		$mes = $this->Fechas->getMes($mes);
		$this->set(compact('mes', 'ano', 't_m_ayudantia', 't_f_ayudantia', 't_f_bolsa', 't_m_bolsa', 't_f_preparaduria', 't_m_preparaduria'));
	}

	function nomina_txt()
	{
		if (!empty($this->data))
		{
			$this->redirect(array('action' => 'txt',$this->data['mes'],$this->data['ano']));
		}
		$meses = $this->Fechas->varMeses();
		$this->set(compact('meses'));

	}

	function beneficiados_excel()
	{
		if (!empty($this->data))
		{
			$this->redirect(array('action' => 'xls_beneficiados_excel', $this->data['nucleo_id'],  $this->data['tipo_id'], $this->data['status']));
		}
		$this->Nucleo->recursive = -1;
		$nucleos = $this->Nucleo->find('list');
		$this->Tipo->recursive = -1;
		$tipos = $this->Tipo->find('list');
		$this->set(compact('tipos', 'nucleos'));
	}

	function xls_beneficiados_excel($nucleo_id, $tipo_id, $status)
	{
		$this->Nucleo->recursive = -1;
		$this->Tipo->recursive = -1;
		$nucleo = $this->Nucleo->find('first', array(
			'conditions' => array('Nucleo.id' => $nucleo_id)
		));
		$tipo = $this->Tipo->find('first', array(
			'conditions' => array('Tipo.id' => $tipo_id)
		));
		$this->layout='xls';
		switch ($status) {
			case 1:
				$options = array(
					'Becado.activo' => 1, 
					'Becado.culminado' => 0, 
					'Becado.nucleo_id' => $nucleo_id,
					'Becado.tipo_id' => $tipo_id
				);
				$status = 'Activo';
			break;
			case 2:
				$options = array(
					'Becado.activo' => 0, 
					'Becado.culminado' => 0, 
					'Becado.nucleo_id' => $nucleo_id,
					'Becado.tipo_id' => $tipo_id
				);
				$status = 'Inactivo';
			break;
			case 3:
				$options = array(
					'Becado.activo' => 0, 
					'Becado.culminado' => 1, 
					'Becado.nucleo_id' => $nucleo_id,
					'Becado.tipo_id' => $tipo_id
				);
				$status = 'Culminado';
			break;
		}
		$becados = $this->Becado->find('all',array(
			'conditions' => $options
		));

		$this->set(compact('becados', 'nucleo', 'status','tipo'));
		/*
		$becados = $this->Becado->find('all',array(
			'conditions' => array('Becado.activo' => 1)
		));
		*/
	}

	function pago_alumno()
	{
		if (!empty($this->data))
		{
			$this->Estudiante->recursive = -1;
			$this->Becado->recursive = -1;
			$estudiante = $this->Estudiante->ffCedula($this->data['cedula']);

			if($estudiante)
			{
				$becado = $this->Becado->ffEstudianteId($estudiante['Estudiante']['id']);

				if($becado)
				{
					//Verifico que tenga pagos
					$nomina = $this->Nomina->find('all',array(
						'conditions' => array(
							'Nomina.becado_id' => $becado['Becado']['id'],
							'year(Nomina.fecha)' => $this->data['ano']
							)
					));
					if($nomina)
					{
						$this->redirect(array('action' => 'pdf_pagos_becado', $becado['Becado']['id'], $estudiante['Estudiante']['id'], $this->data['ano']));
					}else
					{
						$this->Session->setFlash('
						<div class="alert alert-danger text-center" role="alert">
							El alumno no tiene pagos
						</div>');
					}
					
				}else
				{
					$this->Session->setFlash('
					<div class="alert alert-danger text-center" role="alert">
						El alumno no está becado
					</div>');
				}
			}else
			{

				$this->Session->setFlash('
				<div class="alert alert-danger text-center" role="alert">
					La cédula no se encuentra registrada
				</div>');
			}
		}
	}

	function pdf_pagos_becado($becado_id, $estudiante_id, $ano)
	{
		$this->layout='pdf';
		$this->set('title_for_layout','Pagos');
		$estudiante = $this->Estudiante->ffId($estudiante_id);
		$pagos = $this->Nomina->pagos_becado_ano($becado_id, $ano);
		$this->set(compact('estudiante', 'pagos', 'ano'));
	}

	function count_cedula($cedula)
	{
		if (strlen($cedula) == 7)
		{
			$cedula = '0' . $cedula;
		}
		if (strlen($cedula) == 6){
			$cedula = '00' . $cedula;
		}
		return $cedula;
	}

	function txt($mes, $ano)
	{
		$this->layout = "txt";
		//$this->Becado->recursive = 0;
		$mes_letra = $this->Fechas->getMes($mes);
		
		$this->Tipo->recursive = -1;
		$this->Nucleo->recursive = -1;
		$this->Nomina->recursive = 0;

		$tipos = $this->Tipo->find('all');
		$nucleos = $this->Nucleo->find('all');

		for($i = 0; $i<count($tipos); $i++)
		{
			for($j = 0; $j < count($nucleos); $j++)
			{

				$rep[$i]["tipo"] = $tipos[$i]["Tipo"]["nombre"];
				$rep[$i][$j]["nucleo"] = $nucleos[$j]["Nucleo"]["nombre"];

				$nomina = $this->Nomina->find('all',array(
					'conditions' => array(
						'Nomina.tipo_id' => $tipos[$i]["Tipo"]["id"],
						'Nomina.nucleo_id' => $nucleos[$j]["Nucleo"]["id"],
						'month(Nomina.fecha)' => $mes,
						'year(Nomina.fecha)' => $ano
					)
				));
				if($nomina)
				{
					$rep[$i][$j]["fecha"] = $this->Fechas->voltearFecha($nomina[0]['Nomina']['created']);
				}
				
				for($k = 0; $k < count($nomina); $k++)
				{
					$rep[$i][$j]["total"] = count($nomina);
					$rep[$i][$j]["nomina"][$k]["cedula"] = $this->count_cedula($nomina[$k]["Estudiante"]["cedula"]);
					$rep[$i][$j]["nomina"][$k]["nombres"] = $nomina[$k]["Estudiante"]["nombres"];
					$rep[$i][$j]["nomina"][$k]["apellidos"] = $nomina[$k]["Estudiante"]["apellidos"];

					$estudiante_id = $nomina[$k]["Estudiante"]["id"];
					$academico = $this->Estudiante->Academico->find('first',array(
						'conditions' => array(
							'Academico.estudiante_id' => $estudiante_id
						)
					));
					
					$rep[$i][$j]["nomina"][$k]["carrera"] = $academico['Carrera']['codigo'];
					$rep[$i][$j]["nomina"][$k]["cohorte"] = $academico['Academico']['cohorte'];
					$rep[$i][$j]["nomina"][$k]["monto"] = $nomina[$k]["Nomina"]["monto"];
					$rep[$i][$j]["nomina"][$k]["dependencia"] = $nomina[$k]["Dependencia"]["nombre"];	
					
				}
				
			}
		}


		$this->set(compact('mes','ano','tipos','nucleos','rep', 'mes_letra','fecha'));
	}
}
