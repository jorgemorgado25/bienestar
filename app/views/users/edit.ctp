<script>
	$(document).ready(function()
	{
		$("#nombres, #apellidos").alpha();
	});
</script>

<h2>Editar Administrador</h2><br>
<?php
	if($this->Session->check('Message.flash')):
		echo $this->Session->flash();
	endif;
?>

<div class="panel panel-default">
	<div class="panel-heading">
		Ingrese los datos
	</div>
	<div class="panel-body">
 

	<?php echo $form->create('User',array(
		'id'=>'frm_add'));?>

		<?php
			echo $form->hidden('id');
		?>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nombre</label>
					<input class="form-control" value="<?php echo $this->data['User']['nombres'] ?>" type="text" id="nombres" name="data[User][nombres]" tabindex="1" required autofocus maxlength=60>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Apellido</label>
					<input class="form-control" value="<?php echo $this->data['User']['apellidos'] ?>" type="text" id="apellidos" name="data[User][apellidos]" tabindex="2" required maxlength=60>
					
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Login</label>
					<span class="form-control" disabled type="text"><?php echo $this->data['User']['login'] ?></span>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Nivel</label>
						<?php
						echo $this->Form->input('nivel',array(
						'options'=> array(1 => 'Básico', 2 => 'Administrador'),
						'label'=>false,
						'div'=>false,
						'class'=>'form-control',
						
					));
				?>
				</div>
			</div>
		</div>

	
	
	<div class="form-group">
		<label>Activo &nbsp;</label>
		<?php
			echo $this->Form->input('activo', array(
				'label'=>false,
				'div'=>false,
			));
		 ?>
	</div>

	<div>
		
		<button class="btn btn-primary" name="submit" type="submit" tabindex="4" id="btn-submit">Aceptar</button>
	</div>
</form>
	</div>	
</div>