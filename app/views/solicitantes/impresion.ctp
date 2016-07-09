<?php
	App::import('Vendor','fpdf/fpdf');
	$pdf=new FPDF('P','mm','Letter');
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);
	$pdf->SetMargins(25,45);
	//$pdf->Image('img/logo-capegua.png',25,20);
	$pdf->Ln(15);
	$pdf->Cell(170,5,'SAN JUAN DE LOS MORROS, ' . $fecha,0,1,'R');
	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,5,'CIUDADANO',0,1,'L');
	$pdf->Cell(190,5,'PRESIDENTE Y DEMAS MIEMBROS',0,1,'L');
	$pdf->Cell(190,5,'DE LA CAJA DE AHORROS DE POLIGUARICO',0,1,'L');
	$pdf->Cell(190,5,'SU DESPACHO.-',0,1,'L');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',12);

	$pdf->MultiCell(170,5,'Por medio de la presente solicito ser aceptado como miembro de la CAJA DE AHORROS DE POLIGUARICO, a partir de la presente fecha.',0,1);
	$pdf->Ln(5);
	$pdf->MultiCell(170,5,'Por tanto, autorizo que se me descuente el 10% de mi SUELDO BASICO.',0,1);

	$pdf->Ln(10);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(170,7,'DATOS PERSONALES',1,1,'C');

	$pdf->Cell(50,7,'CEDULA',1,0,'L');
	$pdf->Cell(120,7,$ins['Inscripcion']['cedula'],1,1,'L');


	$pdf->Cell(50,7,'NOMBRE Y APELLIDO',1,0,'L');
	$pdf->Cell(120,7,utf8_decode($ins['Inscripcion']['nombre']),1,1,'L');

	$pdf->Cell(50,7,'FECHA DE NACIMIENTO',1,0,'L');
	$pdf->Cell(120,7,$fechanac,1,1,'L');

	$pdf->Cell(50,7,'TELEFONO',1,0,'L');
	$pdf->Cell(120,7,utf8_decode($ins['Inscripcion']['telefono']),1,1,'L');

	$pdf->Ln(10);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(170,7,'DATOS LABORALES',1,1,'C');

	$pdf->Cell(50,7,'CARGO',1,0,'L');
	$pdf->Cell(120,7,utf8_decode($ins['Inscripcion']['cargo']),1,1,'L');

	$pdf->Cell(50,7,'SUELDO BASICO',1,0,'L');
	$pdf->Cell(120,7,utf8_decode($ins['Inscripcion']['sueldo']),1,1,'L');

	$pdf->Cell(50,7,'CIUDAD O ZONA',1,0,'L');
	$pdf->Cell(120,7,utf8_decode($ins['Inscripcion']['ciudad']),1,1,'L');

	$pdf->Ln(5);
	$pdf->MultiCell(170,5,'NOTA: ME APEGO A LOS ESTATUTOS DE LA INSTITUCION LOS CUALES CONOZCO Y ME COMPROMETO A CUMPLIR CON LAS OBLIGACIONES DE LA MISMA.',0,1);

	$pdf->Ln(15);

	$pdf->Cell(100,7,'',0,0,'L');
	$pdf->Cell(20,7,'FIRMA:',0,0,'R');
	$pdf->Cell(50,7,'','B',1,'C');

	$pdf->Cell(100,7,'',0,0,'L');
	$pdf->Cell(20,7,'CEDULA:',0,0,'R');
	$pdf->Cell(50,7,'','B',1,'R');

	$pdf->Ln(10);

	$pdf->Cell(50,5,'REQUISITOS:',0,1,'L');
	$pdf->Cell(80,5,'Fotocopia de la Cedula de Identidad.',0,1,'L');
	$pdf->Cell(80,5,'Fotocopia del recibo de pago.',0,1,'L');
	$pdf->Cell(80,5,'Fotocopia de la C.I: de la persona autorizada.',0,1,'L');
	$pdf->Cell(80,5,'Ser mayor de edad.',0,1,'L');

	
	$pdf->Output();
?>