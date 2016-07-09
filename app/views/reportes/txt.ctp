<?php
	
	
	//N. de página
	$pagina = 1;
	$subtotal = 0;

	//Total de alumnos en el documento
	$total_alumnos = 0;

	for ($i = 0; $i < count($tipos); $i++)
	{
		for ($j = 0; $j < count($nucleos); $j++)
		{
			if(isset($rep[$i][$j]["nomina"]))
			{
				//echo "***********PRIMERA CABECERA";
				
				echo "UNIVERSIDAD ROMULO GALLEGOS";
				echo "\r\n";
				echo "Direccion de Atencion Estudiantil                          ";
				echo "PAG:     " . $pagina;
				echo "\r\n";
				echo "Direccion de Informatica                             ";
				echo "Fecha: " . $rep[$i][$j]["fecha"];
				echo "\r\n";
				echo "San Juan de los Morros";
				echo "\r\n";
				echo "\r\n";
				echo "                         -*";
				echo $mes_letra;
				echo "    ";
				echo $ano; echo "*-                         ";
				echo "\r\n";
				echo "    ***          NOMINA DEFINITIVA DE PAGO POR CONCEPTO          ***   ";
				echo "\r\n";
				echo "               PROGRAMA: " . strtoupper($rep[$i]["tipo"]) . '     NUCLÉO: ' . $rep[$i][$j]["nucleo"];
				echo " ";
				if($subtotal != 0)
				{
					echo 'Vienen: ' . $subtotal;
				}
				echo "\r\n";
				echo "\r\n";
				echo "---------------------------------------------------------------------------";
				echo "\r\n";
				echo "CI        APELLIDOS Y NOMBRES      COH.   CARR.    UBICACIÓN        MONTO";
				echo "\r\n";
				echo "---------------------------------------------------------------------------";
				echo "\r\n";
			


				$alumnos_por_pagina = 5;
				$van_total_alumnos = 0;
				$van = 0;

				//AQUI RECORRO LOS ALUMNOS DE LA NOMINA
				for ($k = 0; $k < count($rep[$i][$j]["nomina"]); $k++)
				{

					//Imprimo la línea

					$nombre = $rep[$i][$j]["nomina"][$k]["apellidos"] . ' ' . $rep[$i][$j]["nomina"][$k]["nombres"];
					echo $rep[$i][$j]["nomina"][$k]["cedula"] . '  ';
					
					echo $this->Palabra->recortar_agregar($nombre, 24) . ' ';
					echo $this->Palabra->recortar_agregar($rep[$i][$j]["nomina"][$k]["cohorte"], 5) . '  ';
					echo $this->Palabra->recortar_agregar($rep[$i][$j]["nomina"][$k]["carrera"], 3) . '  ';
					echo $this->Palabra->recortar_agregar($rep[$i][$j]["nomina"][$k]["dependencia"], 20). '   ';
					echo $rep[$i][$j]["nomina"][$k]["monto"];
					$subtotal = $subtotal + $rep[$i][$j]["nomina"][$k]["monto"];

					echo "\r\n";
					
					$total_alumnos++;					
					$van++;
					$van_total_alumnos++;

					if ($van == $alumnos_por_pagina)
					{
						$pagina++;
						
						echo "\r\n";							
						echo "Alumnos por pag: ". $van . ' de ' . $total_alumnos;
						echo '                             Sub Total: ';
						echo $subtotal;
						echo "\r\n";
						//echo "***********SEGUNDA CABECERA";
						echo "\r\n";
						//Cabecera
						echo "UNIVERSIDAD ROMULO GALLEGOS";
						echo "\r\n";
						echo "Direccion de Atencion Estudiantil                          ";
						echo "PAG:     " . $pagina;
						echo "\r\n";
						echo "Direccion de Informatica                             ";
						echo "Fecha: " . $rep[$i][$j]["fecha"];
						echo "\r\n";
						echo "San Juan de los Morros";
						echo "\r\n";
						echo "\r\n";
						echo "                         -*";
						echo $mes_letra;
						echo "    ";
						echo $ano; echo "*-                         ";
						echo "\r\n";
						echo "    ***          NOMINA DEFINITIVA DE PAGO POR CONCEPTO          ***   ";
						echo "\r\n";
						echo "               PROGRAMA: " . strtoupper($rep[$i]["tipo"]) . '     NUCLÉO: ' . $rep[$i][$j]["nucleo"];
						echo " ";
						if($subtotal != 0)
						{
							echo 'Vienen: ' . $subtotal;
						}
						echo "\r\n";
						echo "\r\n";
						echo "---------------------------------------------------------------------------";
						echo "\r\n";
						echo "CI        APELLIDOS Y NOMBRES      COH.   CARR.    UBICACIÓN        MONTO";
						echo "\r\n";
						echo "---------------------------------------------------------------------------";
						echo "\r\n";						

						$van = 0;

					}
				} #END for recorrido de linea
				
				
				##### Si terminé de reccorrer la nómina
				if ($van_total_alumnos == $rep[$i][$j]["total"])
				{
					echo "\r\n";
					echo "Alumnos por pag: ". $van . ' de ' . $total_alumnos;

					echo '                             Sub Total: ';
					echo $subtotal;
					$pagina++;
				}
				echo "\r\n";
				echo "\r\n";
				

			} #end if nomina
		} #end for nucleo
	} #end for tipo

	echo "TOTAL DE ALUMNOS: " . $total_alumnos;
?>