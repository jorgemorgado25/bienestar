<script type="text/javascript">
	$(document).ready(function() {
		$('input').numeric("integer");
	});
</script>

<h2>Total Beneficiados en General</h2>
<br>
<div class="panel panel-default">
	<div class="panel-heading">Seleccione los datos del reporte</div>
	<div class="panel-body">
		<form action="" method="POST">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Mes</label>
					<?php
						echo $this->Form->input('mes',array(
							'options'=>$meses,
							'label'=>false,
							'div'=>false,
							'class'=>'form-control',
							'required'=>'required',
							'empty'=>true
						));
					?>
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