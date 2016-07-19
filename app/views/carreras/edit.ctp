<script>
	$(document).ready(function()
	{
		$("#codigo").alpha({
			allowNumeric : 'true',
			disallow: 'qwertyuiopasdfghjklzxcvbnmñQWERTYUIOPASDFGHJKLZXCVBNMÑ',
			allow: '/'
		});	
	});
</script>


<h2>Editar Carrera</h2><br>

<?php
	if($this->Session->check('Message.flash')):
		echo $this->Session->flash();
	endif;
	?>

<div style="display:none" id="msj1" class="alert alert-danger text-center" role="alert" onsubmit=""></div>
<form id="frm-registrar" action="<?php echo $html->url('/carreras/edit'); ?>" method="post">
<div class="panel panel-default">
	<div class="panel-heading">Datos de la Carrera</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				<div class="form-group">
					<label>Nombre</label>
					<input value="<?php echo $this->data['Carrera']['nombre']?>" class="form-control" id="nombre" name="data[nombre]" placeholder="Escribe el nombre de la carrera" type="text" autofocus required maxlength=150>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<label>Código</label>
					<input value=<?php echo $this->data['Carrera']['codigo']?> class="form-control" id="codigo" name="data[codigo]" placeholder="Escribe el código de la carrera" type="text" required maxlength=50>
				</div>
			</div>			
		</div>
	</div>
</div>

<button id="btnEnviar" type="submit" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Guardar
</button>

<input type="hidden" name="data[id]" value=<?php echo $this->data['Carrera']['id'] ?>>

</form>