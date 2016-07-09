<script type="text/javascript">
$(document).ready(function()
{
	$("#contact-form").submit(function()
	{
		$("#spin").show();
		$("#loginbox").hide();
		serializedForm = $("#contact-form").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo $this->webroot ?>front/buscar_usuario",
			data: serializedForm,
			success: function(data)
			{
				console.log(data);
				if(data == 'null')
				{					
					$("#spin").hide();
					$("#loginbox").show();
					$("#mensaje-error").html("<b><small>Sus credenciales son incorrectas</small></b>");
					$("#txt-login").addClass("alert-danger");
					$("#txt-password").addClass("alert-danger");
					$("#mensaje-error").show();
				}else
				{
					data = JSON.parse(data);
					console.log(data['activo']);
					if(data['activo'] == 1)
					{
						$(location).attr("href","<?php echo $this->webroot ?>solicitantes" + '/index/');
					}else
					{
						$("#spin").hide();
						$("#loginbox").show();
						$("#mensaje-error").html("<b><small>Su acceso al sistema está deshabilitado</small></b>");
						$("#txt-login").addClass("alert-danger");
						$("#txt-password").addClass("alert-danger");
						$("#mensaje-error").show();
					}
					
				}
			}
		});
		return false;
	});
});

function show_msj(msj)
{
	$('#msj1').html(msj);
	$('#msj1').fadeIn();
}

</script>
<div style="margin-top:40px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

	<div id="loginbox" class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<h3><i class="fa fa-key" aria-hidden="true"></i>
 Ingreso de Usuario</h3>
			</div>
		</div>

		<div style="padding-top:30px" class="panel-body">

			<form method="post" id="contact-form" class="form-horizontal" role="form">
			<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
			<div style="display:none; margin-bottom:15px" id="mensaje-error" class="text-danger text-center" role="alert">Sus datos son incorrectos</br></div>

			<div style="margin-bottom: 25px" class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input id="txt-login" class="form-control" name="data[login]" placeholder="Escribe tu nombre de usuario" type="text" tabindex="1" autofocus id="login" required>
			</div>

			<div style="margin-bottom: 25px" class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input id="txt-password" id="password" class="form-control" name="data[password]" placeholder="Escribe tu contrase&ntilde;a" type="password" tabindex="2" required>
			</div>                                   


			<div class="input-group">
			<div style="margin-top:0px" class="form-group">
			<!-- Button -->

			<div class="col-sm-12 controls">
				<button class="btn btn-primary" name="submit" type="submit" id="btn-submit">Ingresar al Sistema</button>
			</div>
			</div>
			</form>
		</div>
	</div>
</div>

<div id="spin" style="display:none">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="text-center">Cargando sus datos</h3>
		</div>
		<div class="panel-body">
			<p class="text-center text-default"><br>
				<i class="fa fa-spinner fa-spin fa-4x"></i><br>
			</p>
		</div>
	</div>
</div>