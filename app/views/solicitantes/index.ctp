<script type="text/javascript" charset="utf-8">

	$(document).ready(function()
	{

		$(".btn").click(function() {
    if($("#collapseme").hasClass("out")) {
        $("#collapseme").addClass("in");
        $("#collapseme").removeClass("out");
    } else {
        $("#collapseme").addClass("out");
        $("#collapseme").removeClass("in");
    }
});

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
	<h2> <a href="<?php echo $this->webroot . 'solicitantes/add/' ?>" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i> Nueva Solicitud</a> Solicitudes Pendientes</h2>
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
			<th width=130px>Acciones</th>
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
			<a title="Ver Ficha del Solicitante" href="<?php echo $this->webroot . 'solicitantes/view/' . $solicitante['Solicitante']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i></a>

			<a title="Descargar PDF" target="_blank" href="<?php echo $this->webroot . 'solicitantes/pdf_solicitud/' . $solicitante['Estudiante']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-print"></i></a>
			<a title="Rechazar Solicitud" href="<?php echo $this->webroot . 'solicitantes/negar/' . $solicitante['Solicitante']['id'] ?>"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-sign"></span></a>

			<a title="Becar" class="btn btn-sm btn-primary" href="<?php echo $this->webroot . 'becados/add/' . $solicitante['Estudiante']['cedula'] ?>"><span class="glyphicon glyphicon-ok-sign"></span></a>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
</div>
</div>