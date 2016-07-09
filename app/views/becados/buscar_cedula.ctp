<script type="text/javascript">
	$(document).ready(function() {
		$("#cedula").numeric("integer");
	});
</script>
<div style="margin-top:40px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

	<?php
		if($this->Session->check('Message.flash')):
			echo $this->Session->flash();
		endif;
	?>
	
	<div id="loginbox" class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<h3>Buscar Estudiante</h3>
			</div>
		</div>

		<div style="padding-top:30px" class="panel-body">
			<form method="post" id="contact-form" action="<?php echo $html->url('/becados/buscar_cedula'); ?>">
			<div class="form-group">
				<label>Cédula</label>
				<input class="form-control" name="data[cedula]" placeholder="Escribe la cédula del estudiante" type="text" tabindex="1" autofocus id="cedula" required maxlength=8>
			</div>			
			<div class="form-group">
				<button class="btn btn-default" name="submit" type="submit" id="btn-submit">Buscar</button>			
			</form>
		</div>                   
	</div>
</div>