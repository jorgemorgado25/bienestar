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

<h2>Listado de Pagos</h2><br>

<?php
	if($this->Session->check('Message.flash')):
		echo $this->Session->flash();
	endif;
?>
	
<div class="panel panel-default">
	<div class="panel-heading">Listado de pagos generados</div>
	<div class="panel-body">
		<table class="table table-bordered table-striped" id="dataTable">
			<thead>
				<tr>
					<th>id</th>
					<th>Tipo</th>
					<th>Mes y Año</th>
					<th>Monto</th>
					<th width=70px>Acciones</th>
				</tr>
			</thead>
			<?php foreach ($cabeceras as $c): ?>
			<tr>
				<td><?php echo $c['Cabecera']['id'] ?></td>
				<td><?php echo $c['Tipo']['nombre'] ?></td>
				<td><?php echo $this->Fechas->becaFin($c['Cabecera']['fecha']) ?></td>
				<td><?php echo $c['Cabecera']['monto'] ?></td>
				<td>
					<a title="Ver Listado de Pagos" href="<?php echo $this->webroot . 'nominas/view/' . $c['Cabecera']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-search"></i></a>

					<a title="Imprimir" href="<?php echo $this->webroot . 'nominas/xls_nomina/' . $c['Cabecera']['id'] ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-print"></i></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>