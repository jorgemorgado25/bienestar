<h2>Editar Núcleo</h2><br>

<div style="display:none" id="msj1" class="alert alert-danger text-center" role="alert"></div>
<?php echo $this->Form->create('Nucleo');?>
<div class="panel panel-default">
	<div class="panel-heading">Datos del Núcleo</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Núcleo</label>
					<?php
						echo $this->Form->input('nombre',array(
							'label'=>false,
							'div'=>false,
							'class'=>'form-control',
							'id'=>'cedula',
							'required'=>'required',
							'placehorder'=>'Escribe el nombre del núcleo'
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