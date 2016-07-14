<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#dataTable').DataTable({
			"columnDefs": [{
			"targets": [0],
			"visible": false,
			"searchable": false
			}],
			
		});
	});
</script>

	<h2><a href="<?php echo $this->webroot . 'carreras/add/' ?>" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i> Nueva Carrera</a>Listado de Carreras</h2><br>

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
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th>Nombre la Carrera</th>
			<th>Código</th>
			<th width=80px>Acciones</th>
	</tr>
	</thead>
	<?php
	foreach ($carreras as $carrera):
		
	?>
	<tr>
		<td><?php echo $carrera['Carrera']['id']; ?>&nbsp;</td>
		<td><?php echo $carrera['Carrera']['nombre'] ?></td>
		<td><?php echo $carrera['Carrera']['codigo'] ?></td>
		<td>
			<a title="Editar" href="<?php echo $this->webroot . 'carreras/edit/' . $carrera['Carrera']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
</div>