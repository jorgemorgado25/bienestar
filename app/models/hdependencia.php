<?php
class Hdependencia extends AppModel {
	var $name = 'Hdependencia';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $order=array('Hdependencia.id'=>'desc');

	var $belongsTo = array(
		'Becado' => array(
			'className' => 'Becado',
			'foreignKey' => 'becado_id',
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
		'Dependencia' => array(
			'className' => 'Dependencia',
			'foreignKey' => 'dependencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
