<script>
	$(document).ready(function()
	{
		$("#nombres, #apellidos").alpha();
	});
</script>

<script type="text/javascript">
	$("document").ready(function()
	{
		$("#err-pass").hide();
		$("#frm_add").submit(function()
		{
			if($("#pass").val() != $("#re-pass").val())
			{
				$("#err-pass").show();
				$("#pass").addClass("alert-danger");
				$("#re-pass").addClass("alert-danger");			 
				return false;
			}else{
				return true;
			}
		});
	});
</script>
<h2>Nuevo Administrador</h2><br>
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

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nombre</label>
					<input class="form-control" type="text" id="nombres" name="data[User][nombres]" type="text" tabindex="1" required autofocus>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Apellido</label>
					<input class="form-control" type="text" id="apellidos" name="data[User][apellidos]" type="text" tabindex="2" required>
					
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Login</label>
					<input class="form-control" type="text" name="data[User][login]" type="text" tabindex="4" required maxlength=25>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Nivel</label>
						<select required name="data[User][nivel]" id="sel-nivel" class="form-control">
							<option value=""></option>
							<option value="1">Básico</option>
							<option value="2">Avanzado</option>
						</select>
				</div>
			</div>
		</div>
		<div id="err-pass" class="alert alert-danger">Las contraseñas no coinciden</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" id="pass" type="password" name="data[User][password]" type="text" tabindex="5" required maxlength=32>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Re-password</label>
					<input class="form-control" id="re-pass" type="password" name="data[User][re-password]" type="text" tabindex="6" required maxlength=32>
				</div>
			</div>
		</div>
	
	
	<div class="form-group">
		<label>Activo &nbsp;</label>
		<input type="checkbox" name="data[User][activo]" checked>
	</div>

	<div>
		<button class="btn btn-primary" name="submit" type="submit" tabindex="4" id="btn-submit">Aceptar</button>
	</div>
</form>
	</div>	
</div>