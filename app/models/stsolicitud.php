<?php
class Stsolicitud extends AppModel {
	var $name = 'Stsolicitud';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $order = array('Stsolicitud.id' => 'desc');
	
	var $belongsTo = array(
		'Solicitante' => array(
			'className' => 'Solicitante',
			'foreignKey' => 'solicitante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
