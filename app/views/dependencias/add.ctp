<script>
	$(document).ready(function()
	{
		$("#supervisor").alpha({
			allow : '.'
		});
		$("#dependencia").alpha();
	});
</script>

<h2>Agregar Dependencia</h2><br>

<div style="display:none" id="msj1" class="alert alert-danger text-center" role="alert"></div>
<form id="frm-registrar" action="<?php echo $html->url('/dependencias/add'); ?>" method="post">
<div class="panel panel-default">
	<div class="panel-heading">Datos de la Dependencia</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Núcleo</label>
					<?php
					echo $this->Form->input('nucleo_id',array(
						'options'=>$nucleos,
						'label'=>false,
						'div'=>false,
						'class'=>'form-control',
						'required'=>'required',
						'empty'=>true
					));
					?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Dependencia</label>
					<input maxlength="100" class="form-control" id="dependencia" name="data[nombre]" placeholder="Escribe el nombre de la dependencia" type="text" required autofocus>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Supervisor</label>
					<input class="form-control" id="supervisor" name="data[supervisor]" placeholder="Escribe el nombre del supervisor" type="text" required>
				</div>
			</div>
		</div>
	</div>
</div>

<button id="btnEnviar" type="submit" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Guardar
</button>