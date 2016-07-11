<script>
	$(document).ready(function()
	{
		$("#nombre").alpha();
	});
</script>

<h2>Agregar Núcleo</h2><br>

<div style="display:none" id="msj1" class="alert alert-danger text-center" role="alert" onsubmit=""></div>
<form id="frm-registrar" action="<?php echo $html->url('/nucleos/add'); ?>" method="post">
<div class="panel panel-default">
	<div class="panel-heading">Datos del Núcleo</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Núcleo</label>
					<input class="form-control" id="nombre" name="data[nombre]" placeholder="Escribe el nombre del núcleo" type="text" autofocus required>
				</div>
			</div>			
		</div>
	</div>
</div>

<button id="btnEnviar" type="submit" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Guardar
</button>