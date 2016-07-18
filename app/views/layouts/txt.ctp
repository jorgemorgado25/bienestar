<?php
	$fecha = date("d-m-Y");
	header('Content-disposition: attachment; filename=pagos-' . $fecha);
	header('Content-type: text/plain');
	echo $content_for_layout;
?>