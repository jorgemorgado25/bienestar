<?php
class Nucleo extends AppModel {
	var $name = 'Nucleo';

	var $displayField='nombre';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

    

	var $hasMany = array(
		'Becado' => array(
			'className' => 'Becado',
			'foreignKey' => 'nucleo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Dependencia' => array(
			'className' => 'Dependencia',
			'foreignKey' => 'nucleo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Hdependencia' => array(
			'className' => 'Hdependencia',
			'foreignKey' => 'nucleo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Nomina' => array(
			'className' => 'Nomina',
			'foreignKey' => 'nucleo_id',
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
