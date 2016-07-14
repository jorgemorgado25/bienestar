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

<h2><a class="btn btn-primary pull-right" href="<?php echo $this->webroot . 'nominas/xls_nomina/' . $cabecera['Cabecera']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-print"></i> Imprimir</a>Detalle de Pago</h2><br>

<div class="panel panel-default">
	<div class="panel-heading">Detalle de Pago</div>
	<div class="panel-body">


		<table class="">
			<tr>
				<td width="100px"><b>Tipo</b></td>
				<td><?php echo $cabecera['Tipo']['nombre'] ?></td>
			</tr>
			<tr>
				<td><b>Mes y Año</b></td>
				<td><?php echo $this->Fechas->becaFin($cabecera['Cabecera']['fecha']) ?></td>
			</tr>
			<tr>
				<td><b>Monto</b></td>
				<td><?php echo $cabecera['Cabecera']['monto'] ?></td>
			</tr>
		</table>
	</div>
</div>

	
<div class="panel panel-default">
	<div class="panel-heading">Listado de Estudiantes</div>
	<div class="panel-body">
		<table class="table table-bordered table-striped" id="dataTable">
			<thead>
				<tr>
					<th>id</th>
					<th>Cédula</th>
					<th>Nombre y Apellido</th>
					<th>Monto</th>
					<th>Núcleo</th>
					<th>Dependencia</th>
				</tr>
			</thead>
			<?php foreach ($nominas as $n): ?>
			<tr>
				<td><?php echo $n['Nomina']['id'] ?></td>
				<td><?php echo $n['Estudiante']['cedula'] ?></td>
				<td><?php echo $n['Estudiante']['nombres'] . ' ' . $n['Estudiante']['apellidos'] ?></td>
				<td><?php echo $n['Nomina']['monto'] ?></td>
				<td><?php echo $n['Nucleo']['nombre'] ?></td>
				<td><?php echo $n['Dependencia']['nombre'] ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>