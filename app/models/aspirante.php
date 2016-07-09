<?php
class Aspirante extends AppModel {
	var $name = 'Aspirante';
	var $displayField = 'cedula';
	var $validate = array(
		'cedula' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingrese la cedula',
				'class' => 'alert alert-danger'
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Ingrese un valor numerico',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
	            'rule'      => 'isUnique',
	            'message'   => 'La cedula esta registrada',
	            'on' => 'create', // Limit validation to 'create' or 'update' operations
        	),
		),
		'apellidos' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ingresa el apellido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombres' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'telefono' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

}
