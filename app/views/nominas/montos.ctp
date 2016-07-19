<script type="text/javascript">
	$(document).ready(function() {
		$('input').numeric({
			allowMinus   : false,
	    	allowThouSep : false,
	    	allowDecSep: true,
	    	allow: '.'
		});
	});
</script>

<h2>Actualizar Montos</h2><br>

<?php
	if($this->Session->check('Message.flash')):
		echo $this->Session->flash();
	endif;
?>
	
<div class="panel panel-default">
	<div class="panel-heading">Montos de Becas en Bolívares</div>
	<div class="panel-body">
		<form action="<?php echo $html->url('/nominas/montos'); ?>" method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Ayudantía</label>
						<input name="data[ayudantia]" value="<?php echo $ayudantia['Tipo']['monto'] ?>" maxlength=9 id="monto-ayudantia" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Bolsa de Trabajo</label>
						<input name="data[bolsa]" value="<?php echo $bolsa['Tipo']['monto'] ?>" maxlength=9 id="monto-bolsa" type="text" class="form-control" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Preparaduría</label>
						<input name="data[prepara]" value="<?php echo $prepara['Tipo']['monto'] ?>" maxlength=9 id="monto-prepara" type="text" class="form-control" required>
					</div>
				</div>
			</div>		
			<button class="btn btn-primary" type="submit"> Actualizar</button>	
		</form>
	</div>
</div>