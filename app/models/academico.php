<?php
class Academico extends AppModel {
	var $name = 'Academico';

	var $belongsTo = array(
		'Estudiante' => array(
			'className' => 'Estudiante',
			'foreignKey' => 'estudiante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Carrera' => array(
			'className' => 'Carrera',
			'foreignKey' => 'carrera_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function ffEstudianteId($id)
	{
		$es = $this->find('first',array(
			'conditions'=>array('Academico.estudiante_id' => $id)
		));
		return $es;
	}
}
