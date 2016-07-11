<?php
	$fecha = date("d-m-Y");
	header('Content-disposition: attachment; filename=cierre-' . $fecha);
	header('Content-type: text/plain');
	echo $content_for_layout;
?>