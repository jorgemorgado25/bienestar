<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#dataTable').DataTable({
			"columnDefs": [{
			"targets": [0],
			"visible": false,
			"searchable": false
			}],
			"order": [[0, "desc" ]],
		});
	});
</script>
	<h2>Solicitudes Rechazadas</h2>
	<?php
		if($this->Session->check('Message.flash')):
			echo $this->Session->flash();
		endif;
	?>
	<br/>
	<div class="panel panel-default">
	<div class="panel-body">

		<div class="table-responsive">
	<table class="table table-bordered table-striped" id="dataTable">
		<thead>
		<tr>
			<th>id</th>
			<th>Cédula</th>
			<th>Nombres y Apellidos</th>
			<th>Código</th>
			<th>P</th>
			<th>Fecha</th>
			<th width=90px>Acciones</th>
		</tr>
	</thead>
	<?php
	foreach ($solicitantes as $solicitante):
		
	?>
	<tr>
		<td><?php echo $solicitante['Solicitante']['id']; ?></td>
		<td><?php echo $solicitante['Estudiante']['cedula']?></td>
		<td><?php echo $solicitante['Estudiante']['nombres'] . ' ' . $solicitante['Estudiante']['apellidos']  ?></td>
		<td><?php echo $solicitante['Solicitante']['codigo']; ?></td>
		<td><?php echo $solicitante['Solicitante']['prioridad']; ?></td>
		<td><?php echo $this->Fechas->FormatoFecha($solicitante["Solicitante"]["created"]);?></td>
		<td class="actions">

			<a title="Mover a Pendientes" href="<?php echo $this->webroot . 'solicitantes/mover/' . $solicitante['Solicitante']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-transfer"></i></a>

			<a title="Ver Ficha" href="<?php echo $this->webroot . 'solicitantes/view/' . $solicitante['Solicitante']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i></a>

			<a title="Descargar PDF" target="_blank" href="<?php echo $this->webroot . 'solicitantes/pdf_solicitud/' . $solicitante['Estudiante']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-print"></i></a>
			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
</div>
</div>