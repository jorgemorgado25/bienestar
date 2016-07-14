<style type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid;
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	.titulo{
		font-weight: bolder;
	}
   
</style>

<table>
	<tr>
		<td class="titulo" colspan="5">LISTADO DE PAGOS</td>
	</tr>
	<tr>
		<td colspan="5">Tipo de Beneficio: <?php echo utf8_decode($cabecera['Tipo']['nombre'])  ?></td>
	</tr>
	<tr>
		<td colspan="5">Mes y A&ntilde;o: <?php echo $this->Fechas->becaFin($cabecera['Cabecera']['fecha']) ?></td>
	</tr>
	<tr>
		<td colspan="5">Monto: <?php echo $cabecera['Cabecera']['monto'] ?></td>
	</tr>
	<tr>
		<td class="tableTd" style="width: 100px"><b>CEDULA</b></td>
		<td class="tableTd" style="width: 300px"><b>NOMBRE Y APELLIDO</b></td>
		<td class="tableTd" style="width: 100px"><b>MONTO</b></td>
		<td class="tableTd" style="width: 200px"><b>NUCLEO</b></td>
		<td class="tableTd" style="width: 200px"><b>DEPENDENCIA</b></td>
	</tr>
	<?php
		$total = 0;
		foreach ($nominas as $n)
		{
	?>
			<tr>
				<td class="tableTd">
					<?php echo $n['Estudiante']['cedula'] ?>
				</td>
				<td class="tableTd">
					<?php echo utf8_decode($n['Estudiante']['nombres'] . ' ' . $n['Estudiante']['apellidos']) ?>
				</td>
				<td class="tableTd">
					<?php echo $n['Nomina']['monto'] ?>
				</td>
				<td class="tableTd">
					<?php echo utf8_decode($n['Nucleo']['nombre']) ?>
				</td>
				<td class="tableTd">
					<?php echo utf8_decode($n['Dependencia']['nombre']) ?>
				</td>
			</tr>
	<?php
			$total = $total + $n['Nomina']['monto'];
		}
	?>
	<tr>
		<td colspan="5">Cantidad de Beneficiados: <?php echo count($nominas) ?></td>
	</tr>
	<tr>
		<td colspan="5">Total en Bolivares: <?php echo $total ?></td>
	</tr>
</table>