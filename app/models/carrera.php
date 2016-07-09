<?php
class Carrera extends AppModel {
	var $name = 'Carrera';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $displayField='nombre';
	var $hasMany = array(
		'Academico' => array(
			'className' => 'Academico',
			'foreignKey' => 'carrera_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
