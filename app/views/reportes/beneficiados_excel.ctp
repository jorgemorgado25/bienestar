<h2>Beneficiados Excel</h2>
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

			<div class="col-md-4">
				<div class="form-group">
					<label for="">Núcleo</label>
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
					<label for="">Tipo de Beneficio</label>
					<?php
					echo $this->Form->input('tipo_id',array(
						'options'=>$tipos,
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
					<label for="">Status</label>
					<?php
					echo $this->Form->input('status',array(
						'options'=>array(1 => 'Activo', 2 => 'Inactivo', 3 => 'Culminado'),
						'label'=>false,
						'div'=>false,
						'class'=>'form-control',
						'required'=>'required',
						'empty'=>true
					));
					?>
				</div>
			</div>
			
		</div>
		<button class="btn btn-primary" type="submit"> Aceptar</button>
		</form>
	</div>
</div>