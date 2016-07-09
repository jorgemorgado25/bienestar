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

	<h2><a href="<?php echo $this->webroot . 'nucleos/add/' ?>" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i> Nuevo Núcleo</a>Listado de Núcleos</h2><br>

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
			<th>Nombre del Núcleo</th>
			<th width=80px>Acciones</th>
	</tr>
	</thead>
	<?php
	foreach ($nucleos as $nucleo):
		
	?>
	<tr>
		<td><?php echo $nucleo['Nucleo']['id']; ?>&nbsp;</td>
		<td><?php echo $nucleo['Nucleo']['nombre'] ?></td>
		<td>
			<a href="<?php echo $this->webroot . 'nucleos/edit/' . $nucleo['Nucleo']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
</div>