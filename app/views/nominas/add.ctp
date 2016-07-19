<h2>Crear Pagos</h2><br>

<?php
	if($this->Session->check('Message.flash')):
		echo $this->Session->flash();
	endif;
?>

<div class="panel panel-default">
	<div class="panel-heading">Seleccione los datos de pago</div>
	<div class="panel-body">
		<form action="<?php echo $html->url('/nominas/add'); ?>" method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Tipo</label>
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
						<label for="">Mes</label>
						<?php
							echo $this->Form->input('mes',array(
								//'options'=>$meses,
								'options'=>array($mes => $mesmes),
								'label'=>false,
								'div'=>false,
								'class'=>'form-control',
								'required'=>'required',
							));
						?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Año</label>
						<input disabled value=<?php echo $ano ?>  required="required" maxlength=4 id="" type="text" class="form-control" required>
						<input value=<?php echo $ano ?>  required="required" name="data[ano]" maxlength=4 id="" type="hidden" class="form-control" required>
					</div>
				</div>
			</div>
			<button class="btn btn-primary" type="submit"> Aceptar</button>
		</form>
	</div>
</div>