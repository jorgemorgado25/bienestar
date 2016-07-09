<?php
class User extends AppModel
{

	var $name = 'User';
	
	var $hasMany = array(
		'Auditoria' => array(
			'className' => 'Auditoria',
			'foreignKey' => 'user_id',
			'dependent' => true,
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

	function ffLogin($login,$password){
		$user=$this->find('first',array(
			'conditions'=>array(
				'User.login'=>$login,
				'User.password'=>md5($password))
		));
		return $user;
	}

}
