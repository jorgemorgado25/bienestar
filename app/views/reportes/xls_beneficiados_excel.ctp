<STYLE type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid;
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	#titles{
		font-weight: bolder;
	}
   
</STYLE>


<table>
		<tr>
			<td colspan=7><b>LISTADO DE BENEFICIADOS</b></td>
		</tr>
		<tr>
			<td colspan=7><b>N&uacute;cleo: <?php echo utf8_decode($nucleo['Nucleo']['nombre']) ?></b></td>
		</tr>
		<tr>
			<td colspan=7><b>Status: <?php echo $status ?></b></td>
		</tr>
		<tr>
			<td colspan=7><b>Tipo de Beneficio: <?php echo utf8_decode($tipo['Tipo']['nombre']) ?></b></td>
		</tr>
		<tr>
			<td colspan=7><b>Total: <?php echo count($becados) ?></b></td>
		</tr>

		<tr id="titles">
			
			<td style="width: 100px" class="tableTd">C&eacute;dula</td>
			<td style="width: 300px" class="tableTd">Nombre y Apellidos</td>
			<td style="width: 200px" class="tableTd">G&eacute;nero</td>
			<td style="width: 100px" class="tableTd">Fecha Nacimiento</td>
			<td style="width: 200px" class="tableTd" width=350px>email</td>
			<td style="width: 150px" class="tableTd" width=350px>Tel&eacute;fono</td>
			<td style="width: 200px" class="tableTd" width=350px>Dependencia</td>
		</tr>		
		<?php 

			foreach ($becados as $b)
			{
				?>
				<tr>
					<td style="width: 100px" class="tableTd"><?php echo $b['Estudiante']['cedula'] ?></td>
					<td style="width: 100px" class="tableTd"><?php echo utf8_decode($b['Estudiante']['nombres'] . ' ' .  $b['Estudiante']['apellidos'])?></td>
					<td style="width: 100px" class="tableTd">
						<?php
							if ($b['Estudiante']['genero'] == 'm')
							{
								echo 'Masculino';
							}else
							{
								echo 'Femenino';
							}
						?>
					</td>
					<td style="width: 100px" class="tableTd"><?php echo $this->Fechas->voltearFecha($b['Estudiante']['fecha_nac']) ?></td>
					<td style="width: 100px" class="tableTd"><?php echo $b['Estudiante']['email'] ?></td>
					<td style="width: 100px" class="tableTd"><?php echo $b['Estudiante']['telefono'] ?></td>
					<td style="width: 100px" class="tableTd"><?php echo utf8_decode($b['Dependencia']['nombre']) ?></td>
				</tr>
				<?php
			}
		 ?>
		
</table>

