<?php
class User extends AppModel
{

	var $name = 'User';

	function ffLogin($login,$password)
	{
		$user = $this->find('first',array(
			'conditions'=>array(
				'User.login'=>$login,
				'User.password'=>md5($password))
		));
		return $user;
	}

	function ffId($id)
	{
		$user = $this->find('first',array(
			'conditions' => array(
				'User.id' => $id)
		));
		return $user;
	}

	function ffLog($login)
	{
		$user = $this->find('first',array(
			'conditions' => array(
				'User.login' => $login)
		));
		return $user;
	}

}
