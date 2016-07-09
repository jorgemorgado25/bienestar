<?php
	
	App::import('Vendor','fpdf/fpdf');
	$pdf=new FPDF('P','mm','Letter');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
	$pdf->SetMargins(26,50);
	$pdf->Image('img/logo-unerg.png',19,27,28);

	$pdf->Ln(9);
	$pdf->Cell(160,6,'REPUBLICA BOLIVARIANA DE VENEZUELA' ,0,1,'C');
	$pdf->Cell(160,6,'UNIVERSIDAD NACIONAL "ROMULO GALLEGOS" ',0,1,'C');
	$pdf->Cell(160,6,'DIRECCION DE DESARROLLO Y ATENCION ESTUDIANTIL',0,1,'C');
	$pdf->Cell(160,6,'DEPARTAMENTO ASISTENCIA SOCIOECONOMICA ESTUDIANTIL',0,1,'C');
	$pdf->Ln(12);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(160,6,'SOLICITUD DE BENEFICIO SOCIOECONOMICO',0,1,'C');

	$pdf->Ln(9);

	$pdf->SetFillColor(220,220,220);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(160,6,'I.- DATOS DEL SOLICITANTE',0,1,'');
	$pdf->Cell(100,7,'Nombres y Apellidos' ,1,0,'',true);
	$pdf->Cell(60,7,utf8_decode('Cédula'),1,1,'',true);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(100,7,utf8_decode($est['Estudiante']['nombres'] . ' ' . $est['Estudiante']['apellidos']),1,0,'');
	$pdf->Cell(60,7,$est['Estudiante']['cedula'] ,1,1,'');

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(50,7,utf8_decode('Género') ,1,0,'');
	$pdf->Cell(50,7,'Estado Civil' ,1,0,'');
	$pdf->Cell(60,7,'Fecha Nacimiento' ,1,1,'');

	if($est['Estudiante']['genero']=='m'){
		$genero="Masculino";
	}else{
		$genero="Femenino";
	}
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(50,7,$genero ,1,0,'');
	$pdf->Cell(50,7,$est['Estudiante']['estado_civil'],1,0,'');
	$pdf->Cell(60,7,$this->Fechas->voltearFecha($est['Estudiante']['fecha_nac']),1,1,'');

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(100,7,utf8_decode('Correo Electrónico'),1,0,'');
	$pdf->Cell(60,7,utf8_decode('Teléfono'),1,1,'');

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(100,7,$est['Estudiante']['email'] ,1,0,'');
	$pdf->Cell(60,7,$est['Estudiante']['telefono'] ,1,1,'');

	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(160,6,'II.- DATOS ACADEMICOS',0,1,'');

	$pdf->Cell(70,7,'Carrera' ,1,0,'',true);
	$pdf->Cell(50,7,'Cohorte' ,1,0,'',true);
	$pdf->Cell(40,7,utf8_decode('Semestre - Año'),1,1,'',true);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(70,7,utf8_decode($ac['Carrera']['nombre']),1,0,'');
	$pdf->Cell(50,7,$ac['Academico']['cohorte'] ,1,0,'');
	$pdf->Cell(40,7,utf8_decode($ac['Academico']['semestre']),1,1,'');

	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(160,6,'III.- DATOS DE LA SOLICITUD',0,1,'');

	$pdf->Cell(100,7,'Fecha de Solicitud' ,1,0,'',true);
	$pdf->Cell(60,7,utf8_decode('Código'),1,1,'',true);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(100,7,$this->Fechas->voltearFecha($est['Solicitante']['created']),1,0,'');
	$pdf->Cell(60,7,$est['Solicitante']['codigo'],1,1,'');
	
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(160,6,'IV.- ESTATUS DE LA SOLICITUD',0,1,'');

	
	
	foreach ($solicitud['Stsolicitud'] as $s) {
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(100,7,'Fecha' ,1,0,'',true);
		$pdf->Cell(60,7,utf8_decode('Estatus'),1,1,'',true);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(100,7,$this->Fechas->voltearFecha($s['created']),1,0,'');
		$pdf->Cell(60,7,$s['status'],1,1,'');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(160,7,'Observaciones',1,1,'');
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(160,7,utf8_decode($s['observaciones']),1,1,'');
	}



	/*
	$pdf->Cell(160,6,'Observaciones',0,1,'');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(160,6,'Observaciones',0,1,'');
	*/


	$pdf->Output();
?>
