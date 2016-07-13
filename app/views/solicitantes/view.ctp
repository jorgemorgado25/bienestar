<h2><a class="btn btn-primary pull-right" target="_blank" href="<?php echo $this->webroot . 'solicitantes/pdf_solicitud/' . $solicitante['Estudiante']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-print"></i> Imprimir</a>Ver Solicitud</h2><br>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Datos del Estudiante</h4>
	</div>
	<table class="table table-bordered">
		<tr>
			<th>Cédula</th>
			<th>Nombre y Apellidos</th>
		</tr>
		<tr>
			<td><?php echo $solicitante['Estudiante']['cedula'] ?></td>
			<td><?php echo $solicitante['Estudiante']['nombres'] . ' ' . $solicitante['Estudiante']['apellidos'] ?></td>
		</tr>
		<tr>
			<th>Género</th>
			<th>Fecha Nacimiento</th>
		</tr>
		<tr>
			<td>
				<?php 
					if($solicitante['Estudiante']['genero'] == 'm')
					{
						echo 'Masculino';
					}else
					{
						echo 'Femenino';
					}
				  ?>
			</td>
			<td>
				<?php echo $this->Fechas->voltearFecha($solicitante['Estudiante']['fecha_nac']) ?>
			</td>
		</tr>
		<tr>
			<th>Email</th>
			<th>Teléfono</th>
		</tr>
		<tr>
			<td><?php echo $solicitante['Estudiante']['email'] ?></td>
			<td><?php echo $solicitante['Estudiante']['telefono'] ?></td>
		</tr>
	</table> 
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Datos de la Solicitud</h4>
	</div>
	<table class="table table-bordered">
		<tr>
			<th>Status</th>
			<th>Código</th>
			<th>Prioridad</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<td>
				<?php
					if($solicitante['Solicitante']['negada'] == 0)
					{
						echo 'Pendiente';
					}else
					{
						echo 'Rechazada';
					}
				?>
			</td>
			<td><?php echo $solicitante['Solicitante']['codigo'] ?></td>
			<td><?php echo $solicitante['Solicitante']['prioridad']?></td>
			<td><?php echo $this->Fechas->voltearFecha($solicitante['Solicitante']['created']) ?></td>
		</tr>
	</table> 
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Historial de Status</h4>
	</div>
	<table class="table table-bordered">
		<tr>
			<th>Status</th>
			<th>Observaciones</th>
			<th>Fecha</th>
		</tr>
		<?php 
			foreach ($solicitante['Stsolicitud'] as $s)
			{
		?>
				<tr>
					<td><?php echo $s['status'] ?></td>
					<td><?php echo $s['observaciones'] ?></td>
					<td><?php echo $this->Fechas->voltearFecha($s['created']) ?></td>
				</tr>
		<?php
			}
		?>
	</table>
</div>