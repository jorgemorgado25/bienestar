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

	<h2><a href="<?php echo $this->webroot . 'dependencias/add/' ?>" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i> Nueva Dependencia</a>Listado de Dependencias</h2><br>

	<?php
	if($this->Session->check('Message.flash')):
		echo $this->Session->flash();
	endif;
?>

	<?php //echo var_dump($dependencias) ?>

	<div class="panel panel-default">
	<div class="panel-body">
	<div class="table-responsive">
	<table class="table table-bordered table-striped" id="dataTable">
	<thead>
	<tr>
			<th><?php echo $dependencia['Dependencia']['id']; ?></th>
			<th>Nombre de Dependencia</th>
			<th>Núcleo</th>
			<th>Supervisor</th>
			<th width=80px>Acciones</th>
	</tr>
	</thead>
	<?php
	foreach ($dependencias as $dependencia):
		
	?>
	<tr>
		<td><?php echo $dependencia['Dependencia']['id']; ?>&nbsp;</td>
		<td><?php echo $dependencia['Dependencia']['nombre']; ?>&nbsp;</td>
		<td><?php echo $dependencia['Nucleo']['nombre']; ?>&nbsp;</td>
		<td><?php echo $dependencia['Dependencia']['supervisor']; ?>&nbsp;</td>
		<td>
			<a title="Editar" href="<?php echo $this->webroot . 'dependencias/edit/' . $dependencia['Dependencia']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
</div>