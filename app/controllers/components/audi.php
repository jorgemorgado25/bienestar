<?php

class AudiComponent extends Object {

	public function __construct() {
		$this->Auditoria = ClassRegistry::init('Auditoria');
	}
	function reg($user_id, $controller, $action, $resource){
		$data=array(
			'user_id'=>$user_id,
			'controller'=>$controller,
			'action'=>$action,
			'resourse'=>$resource
		);
		$this->Auditoria->create();
		$this->Auditoria->save($data);
	}

}