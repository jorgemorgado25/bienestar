<h2>Pago por Alumno</h2>
<br>

<?php
	if($this->Session->check('Message.flash')):
		echo $this->Session->flash();
	endif;
?>

<div class="panel panel-default">
	<div class="panel-heading">Seleccione los datos del reporte</div>
	<div class="panel-body">
		<form action="" method="POST">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Cédula</label>
					<input name="data[cedula]" type="text" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Año</label>
					<input required="required" name="data[ano]" maxlength=4 id="" type="text" class="form-control" required>
				</div>
			</div>
		</div>
		<button class="btn btn-primary" type="submit"> Aceptar</button>
		</form>
	</div>
</div>