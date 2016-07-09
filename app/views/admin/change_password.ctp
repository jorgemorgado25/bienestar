<script>
	$("document").ready(function() {
		$("#contact-form").submit(function() {
			
			if($("#new").val() != $("#re-new").val()){
				$("#msg").html('<small><span class="icon-circle-with-cross"></span> Las contraseñas no coinciden</small>');
				$("#msg").show();
				$("#passw").show();				
				return false;
			}
			
			var serializedForm = $("#contact-form").serialize();
			$.ajax({
				type: "POST",
				url: "<?php echo $this->webroot; ?>admin/realizar_cambio_clave",
				data: serializedForm,
				beforeSend: function() {
					$("#passw").hide();
					$("#cargando").show();
				},
			    success: function(data){
			    	if(data==0){
						$("#msg").html('<span class="icon-circle-with-cross"></span> <small>Contraseña actual incorrecta </small>');
						$("#cargando").hide();
						$("#passw").show();
						$("#msg").show();
					}else{					
						$("#cargando").hide();	
						$("#exito").fadeIn();
					}
				}
			});
			return false;
		});
	});
</script>

	<div id="passw" class="panel panel-default" style="max-width:400px; margin:auto">
		<div class="panel-heading">
			<h2>Cambiar Contraseña</h2>
		</div>
		<div class="panel-body">

			<div style="max-width:400px;display:none" id="msg" role="alert" class="alert alert-danger centered"></div>
			
		
		 	<form action="<?php echo $html->url('/usuarios/change_password'); ?>" method="post" id="contact-form" style="max-width:400px; margin:auto">
				
				<div class="form-group">
					<label>Contraseña actual</label>
					<input class="form-control" type="password" id="current" name="data[current]"  tabindex="1" required autofocus>			
				</div>
		    	<div class="form-group">
					<label>Nueva contraseña</label>
					<input class="form-control" type="password" id="new" name="data[new-password]" tabindex="2" required>			
		    	</div>
		    	<div class="form-group">
					<label>Confirmar contraseña</label>
					<input class="form-control" type="password" id="re-new" name="data[re-current]" tabindex="3" required>
		    	</div>
		    	
					<button class="btn btn-default" name="submit" type="submit" id="btn-submit" tabindex="4">Aceptar</button>		
				
		      </form>
	      </div>
      </div>


	<div id="cargando" style="max-width:400px;display:none; margin:auto" class="centered text-center">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-center">Espere un momento...</h3>
			</div>
			<div class="panel-body">
				<h4 class="text-center text-muted">
					<i class="fa fa-spinner fa-spin fa-4x"></i>
				</h4>
			</div>
		</div>
	</div>

	<div id="exito" style="max-width:400px;display:none; margin:auto" class="centered text-center">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-center">Cambiar Contraseña</h3>
			</div>
			<div class="panel-body">
				<h4 class="text-center text-muted">
					Su contraseña fue cambiada exitosamente
				</h4>
			</div>
		</div>
	</div>
