<?php
class Activo extends AppModel {
	var $name = 'Activo';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $order = array('Activo.id' => 'desc');
	
	var $belongsTo = array(
		'Becado' => array(
			'className' => 'Becado',
			'foreignKey' => 'becado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
