<?php
class Estudiante extends AppModel {
	var $name = 'Estudiante';

	public function ffCedula($cedula){
		$r=$this->find('first',array(
			'conditions'=>array('Estudiante.cedula'=>$cedula)
		));
		return $r;
	}

	public function buscar_email($email){
		$r=$this->find('first',array(
			'conditions'=>array('Estudiante.email'=>$email)
		));
		return $r;
	}

	public function ffId($id){
		$r=$this->find('first',array(
			'conditions'=>array('Estudiante.id'=>$id)
		));
		return $r;
	}

	public function buscar_cedula_edit($id,$cedula){
		$r=$this->find('first',array(
			'conditions'=>array('Estudiante.cedula'=>$cedula,'Estudiante.id !='=>$id)
		));
		return $r;
	}

	public function buscar_email_edit($id,$correo){
		$r=$this->find('first',array(
			'conditions'=>array('Estudiante.email'=>$correo,'Estudiante.id !='=>$id)
		));
		return $r;
	}

	var $validate = array(
    'login' => array(
        'rule' => 'alphaNumeric'
    ));
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasOne = array(
		'Academico' => array(
			'className' => 'Academico',
			'foreignKey' => 'estudiante_id',
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
		'Becado' => array(
			'className' => 'Becado',
			'foreignKey' => 'estudiante_id',
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
		'Solicitante' => array(
			'className' => 'Solicitante',
			'foreignKey' => 'estudiante_id',
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

	
	var $hasMany = array(
		'Nominas' => array(
			'className' => 'Nominas',
			'foreignKey' => 'estudiante_id',
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
