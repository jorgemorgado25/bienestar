<?php

	if($t_m_ayudantia[0][0]['total'] == '')
	{
		$t_m_ayudantia[0][0]['total'] = 0;
	}
	
	if($t_f_ayudantia[0][0]['total'] == '')
	{
		$t_f_ayudantia[0][0]['total'] = 0;
	}
	
	if($t_f_bolsa[0][0]['total'] == '')
	{
		$t_f_bolsa[0][0]['total'] = 0;
	}
	
	if($t_m_bolsa[0][0]['total'] == '')
	{
		$t_m_bolsa[0][0]['total'] = 0;
	}
	
	if($t_f_preparaduria[0][0]['total'] == '')
	{
		$t_f_preparaduria[0][0]['total'] = 0;
	}
	
	if($t_m_preparaduria[0][0]['total'] == '')
	{
		$t_m_preparaduria[0][0]['total'] = 0;
	}

	$t_m = $t_m_preparaduria[0][0]['total'] + $t_m_bolsa[0][0]['total'] + $t_m_ayudantia[0][0]['total'];

	$t_f = $t_f_preparaduria[0][0]['total'] + $t_f_bolsa[0][0]['total'] + $t_f_ayudantia[0][0]['total'];

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
	$pdf->Ln(18);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(160,6, utf8_decode('TOTAL GENERAL DE BENEFICIADOS'),0,1,'C');
	$pdf->Cell(160,6,$mes . ' DEL ' . $ano,0,1,'C');

	$pdf->Ln(22);

	$pdf->SetFont('Arial','',12);
	$pdf->Cell(12,6,' ',0,0,'C');
	$pdf->Cell(40,6,'',0,0,'C');
	$pdf->Cell(30,6,'Masculino',1,0,'C');
	$pdf->Cell(30,6,'Femenino',1,1,'C');

	$pdf->Cell(12,6,' ',0,0,'C');
	$pdf->Cell(40,6,utf8_decode('Ayudantía'),1,0,'');
	$pdf->Cell(30,6,$t_m_ayudantia[0][0]['total'],1,0,'C');
	$pdf->Cell(30,6,$t_f_ayudantia[0][0]['total'],1,1,'C');

	$pdf->Cell(12,6,' ',0,0,'C');
	$pdf->Cell(40,6,utf8_decode('Bolsa de Trabajo'),1,0,'');
	$pdf->Cell(30,6,$t_m_bolsa[0][0]['total'],1,0,'C');
	$pdf->Cell(30,6,$t_f_bolsa[0][0]['total'],1,1,'C');

	$pdf->Cell(12,6,' ',0,0,'C');
	$pdf->Cell(40,6,utf8_decode('Preparaduría'),1,0,'');
	$pdf->Cell(30,6,$t_m_preparaduria[0][0]['total'],1,0,'C');
	$pdf->Cell(30,6,$t_f_preparaduria[0][0]['total'],1,1,'C');

	$pdf->SetFont('Arial','B',12);

	$pdf->Cell(12,6,' ',0,0,'C');
	$pdf->Cell(40,6,utf8_decode('Total'),1,0,'');
	$pdf->Cell(30,6,$t_m,1,0,'C');
	$pdf->Cell(30,6,$t_f,1,1,'C');
	
	$pdf->Output();

?>
