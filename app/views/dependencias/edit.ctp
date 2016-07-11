<script>
	$(document).ready(function()
	{
		$("#supervisor").alpha({
			allow : '.'
		});
	});
</script>

<h2>Editar Dependencia</h2><br>

<div style="display:none" id="msj1" class="alert alert-danger text-center" role="alert"></div>
<?php echo $this->Form->create('Dependencia');
echo $form->hidden('id');
?>

<div class="panel panel-default">
	<div class="panel-heading">Datos de la Dependencia</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Núcleo</label>
					<span disabled class="form-control disabled"><?php echo $this->data['Nucleo']['nombre'] ?></span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Dependencia</label>
					<?php
						echo $this->Form->input('nombre',array(
							'label' => false,
							'div' => false,
							'class' => 'form-control',
							'id' => 'cedula',
							'required' => 'required',
							'maxlength' => '20',
							'placehorder' => 'Escribe el nombre de la dependencia'
						));
					?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Supervisor</label>
					<?php
						echo $this->Form->input('supervisor',array(
							'label'=>false,
							'div'=>false,
							'class'=>'form-control',
							'id'=>'supervisor',
							'required'=>'required',
							'placehorder'=>'Escribe del supervisor'
						));
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<button id="btnEnviar" type="submit" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Guardar
</button>

</form>