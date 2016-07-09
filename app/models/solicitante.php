<?php
class Solicitante extends AppModel {
	var $name = 'Solicitante';

	public function ffCodigo($codigo){
		$c=$this->find('first',array(
			'conditions'=>array('Solicitante.codigo'=>$codigo)
		));
		return $c;
	}

	public function ffEstudianteId($userId){
		$c=$this->find('first',array(
			'conditions'=>array('Solicitante.estudiante_id'=>$userId)
		));
		return $c;
	}

	public function ffId($id){
		$c=$this->find('first',array(
			'conditions'=>array('Solicitante.id'=>$id)
		));
		return $c;
	}

	public function buscar_codigo_edit($id,$codigo){
		$r=$this->find('first',array(
			'conditions'=>array('Solicitante.codigo'=>$codigo,'Solicitante.estudiante_id !='=>$id)
		));
		return $r;
	}

	var $validate = array(
		'codigo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prioridad' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Estudiante' => array(
			'className' => 'Estudiante',
			'foreignKey' => 'estudiante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Stsolicitud' => array(
			'className' => 'Stsolicitud',
			'foreignKey' => 'solicitante_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		));
}
