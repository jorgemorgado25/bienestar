<?php
class Hculminado extends AppModel {
	var $name = 'Hculminado';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $order = array('Hculminado.id' => 'desc');
	
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
