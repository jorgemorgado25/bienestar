<?php

	
	App::import('Vendor','fpdf/fpdf');
	$pdf=new FPDF('P','mm','Letter');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
	$pdf->SetMargins(26,50);
	$pdf->Image('img/logo-unerg.png',19,27,28);

	$pdf->Ln(15);
	$pdf->Cell(160,6,'REPUBLICA BOLIVARIANA DE VENEZUELA' ,0,1,'C');
	$pdf->Cell(160,6,'UNIVERSIDAD NACIONAL "ROMULO GALLEGOS" ',0,1,'C');
	$pdf->Cell(160,6,'DIRECCION DE DESARROLLO Y ATENCION ESTUDIANTIL',0,1,'C');
	$pdf->Cell(160,6,'DEPARTAMENTO ASISTENCIA SOCIOECONOMICA ESTUDIANTIL',0,1,'C');
	$pdf->Ln(12);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(160,6, utf8_decode('PAGOS REALIZADOS: AÑO ' . $ano),0,1,'C');

	$pdf->Ln(12);

	$pdf->SetFont('Arial','',12);
	$pdf->Cell(50, 7,'CEDULA:' ,0,0,'');
	$pdf->Cell(110,7,utf8_decode($estudiante['Estudiante']['cedula']) ,0,1,'');
	$pdf->Cell(50, 7,'NOMBRE Y APELLIDO:' ,0,0,'');

	$pdf->Cell(110,7,utf8_decode($estudiante['Estudiante']['nombres'] . ' ' . $estudiante['Estudiante']['apellidos']) ,0,1,'');

	$pdf->Cell(50, 7,'NUCLEO:' ,0,0,'');
	$pdf->Cell(110,7,utf8_decode($pagos[0]['Nucleo']['nombre']) ,0,1,'');
	$pdf->Cell(50, 7,'DEPENDENCIA:' ,0,0,'');
	$pdf->Cell(110,7,utf8_decode($pagos[0]['Dependencia']['nombre']) ,0,1,'');

	if($pagos)
	{
		$pdf->Cell(50, 7,'TIPO DE BENEFICIO:' ,0,0,'');
		$pdf->Cell(110,7,utf8_decode($pagos[0]['Tipo']['nombre']) ,0,1,'');
		$pdf->Ln(15);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(80, 7,'MES' ,1,0,'');
		$pdf->Cell(80, 7,'MONTO' ,1, 1,'');
		$pdf->SetFont('Arial','',12);
		$total = 0;
		foreach ($pagos as $p) 
		{
			$pdf->Cell(80, 7,$this->Fechas->mostrarNombreMes($p['Nomina']['fecha']) ,1,0,'');
			$pdf->Cell(80, 7,$p['Nomina']['monto'] ,1,1,'');
			$total = $total + $p['Nomina']['monto'];
		}

		$pdf->Cell(80, 7,'Total en Bolivares:' ,1,0,'');
		$pdf->Cell(80, 7,$total ,1,1,'');

	}else
	{
		$pdf->Ln(25);
		$pdf->Cell(160, 7,'EL ALUMNO NO TIENE PAGOS' ,1,0,'C');
	}
	
	$pdf->Output();

?>
