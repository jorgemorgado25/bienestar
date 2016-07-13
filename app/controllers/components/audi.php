<?php

class AudiComponent extends Object {

	public function __construct() {
		$this->Auditoria = ClassRegistry::init('Auditoria');
	}
	function reg($user_id, $controller, $action, $resource, $login, $url, $descripcion)
	{
		$data=array(
			'user_id'=>$user_id,
			'controller'=>$controller,
			'action'=>$action,
			'resourse'=>$resource,
			'login' => $login,
			'url' => $url,
			'descripcion' => $descripcion
		);
		$this->Auditoria->create();
		$this->Auditoria->save($data);
	}

}