<h2>Rechazar Solicitud</h2><br>

<b>Cédula: </b>
<?php echo $solicitud['Estudiante']['cedula'] ?><br>
<b>Estudiante: </b>
<?php echo $solicitud['Estudiante']['nombres'] . ' ' . $solicitud['Estudiante']['apellidos'] ?>
<form action="<?php echo $html->url('/solicitantes/negar'); ?>" method="post">

	<div>		
		<div class="form-group">
			
		<div class="form-group">
			<label>Observaciones</label>

			<textarea name="data[observaciones]" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
		</div>

	</div>
	<div class="modal-footer">
	<button type="submit" id="btnEnviarActivo" class="btn btn-primary">Aceptar</button>
		<input name="data[solicitante_id]" type="hidden" value="<?php echo $solicitud['Solicitante']['id'] ?>"/>
	</form>