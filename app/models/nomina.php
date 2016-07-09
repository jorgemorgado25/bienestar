<?php
class Nomina extends AppModel {
	var $name = 'Nomina';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	function pagos_becado_ano($becado_id, $ano)
	{
		$r = $this->find('all', array(
			'conditions' => array(
				'Nomina.becado_id' => $becado_id,
				'year(Nomina.fecha)' => $ano
			),
			'order' => array('Nomina.id' => 'asc')
 		));
 		return $r;
	}


	var $belongsTo = array(
		'Cabecera' => array(
			'className' => 'Cabecera',
			'foreignKey' => 'cabecera_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Nucleo' => array(
			'className' => 'Nucleo',
			'foreignKey' => 'nucleo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipo' => array(
			'className' => 'Tipo',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Becado' => array(
			'className' => 'Becado',
			'foreignKey' => 'becado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Dependencia' => array(
			'className' => 'Dependencia',
			'foreignKey' => 'dependencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estudiante' => array(
			'className' => 'Estudiante',
			'foreignKey' => 'estudiante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
