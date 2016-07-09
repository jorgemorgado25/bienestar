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

	<?php
		if($this->Session->check('Message.flash')):
			echo $this->Session->flash();
		endif;
	?>

	<div class="panel panel-default">
	<div class="panel-body">

		<div class="table-responsive">
	<table class="table table-bordered table-striped" id="dataTable">
		<thead>
	<tr>
			<th>id</th>
			<th>Cédula</th>
			<th>Estudiante</th>
			<th>Núcleo</th>
			<th>Tipo de Beneficio</th>			
			<th width="100px">Acciones</th>
	</tr>
</thead>
	<?php
	
	foreach ($becados as $becado):
		
	?>
	<tr>
		<td><?php echo $becado['Becado']['id']; ?></td>
		<td><?php echo $becado['Estudiante']['cedula']; ?></td>
		<td>
			<?php echo $becado['Estudiante']['nombres'] . ' ' .$becado['Estudiante']['apellidos']?>
		</td>
		<td>
			<?php echo $becado['Nucleo']['nombre'] ?>
		</td>
		<td>
			<?php echo $becado['Tipo']['nombre']?>
		</td>
		<td>
			<a title="Editar" href="<?php echo $this->webroot . 'becados/view/' . $becado['Becado']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
		</div>
</div>
</div>