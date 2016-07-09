<?php
class AppController extends Controller{
	
	var $helpers = array('Form', 'Html', 'Javascript', 'Time','Fechas','Session');
	var $components = array('Session','Fechas','Audi','RequestHandler');


	/*------ Activos -----------*/
	var $arrActivo = array
	(
		'1' => 'Regular',
		'2' => 'Recaudos Consignados',
		'3' => 'Otro'
	);

	var $arrInactivo = array
	(
		'10' => 'No consignó recaudos',
		'11' => 'Ausente',
		'12' => 'Otro'
	);

	/*------- Culminado Beca ----------*/

	var $arrCulminadoSi = array(
		'10' => 'Culminó',
		'11' => 'Otro'
	);

	var $arrCulminadoNo = array(
		'1' => 'Regular',
		'2' => 'Reincorporado',
		'3' => 'Otro'
	);
}
?>