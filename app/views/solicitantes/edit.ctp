<?php
	echo $this->Html->script('funciones');
	echo $this->Html->script('validar_datos_beneficiados');
	echo $this->Html->script('validar_input_fecha');
?>

<h2>Editar Solicitud</h2><br>

<form id="frm-registrar" action="<?php echo $html->url('/solicitantes/edit'); ?>" method="post">

<div style="display:none" id="msj1" class="alert alert-danger text-center" role="alert"></div>

<div class="panel panel-default">
	<div class="panel-heading">Datos del Estudiante</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Cédula</label>
					<input class="form-control" value="<?php echo $this->data['Estudiante']['cedula'] ?>" id="cedula-edit" name="data[cedula]" placeholder="Escribe la cédula" type="text" required maxlength=8>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Género</label>					
					<select value="<?php echo $this->data['Estudiante']['genero'] ?>" name="data[genero]" id="genero" required class="form-control">
						<option value="m">Masculino</option>
						<option value="f">Femenino</option>
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nombres</label>
					<input class="form-control" value="<?php echo $this->data['Estudiante']['nombres'] ?>" id="nombres" name="data[nombres]" placeholder="Escribe los nombres" type="text" required maxlength="60">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Apellidos</label>
					<input class="form-control" id="apellidos" value="<?php echo $this->data['Estudiante']['apellidos'] ?>" name="data[apellidos]" placeholder="Escribe los apellidos" type="text" required maxlength="60">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Fecha de Nacimiento</label>
					<div class="input-group">
						<input maxlength="10" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" name="data[fecha_nac]" id="fecha_nac" value="<?php echo $this->Fechas->voltearFecha($this->data['Estudiante']["fecha_nac"]);?>" type="text" class="form-control" required placeholder="dd/mm/aaaa">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Estado Civil</label>
					<select class="form-control" name="data[estado_civil]" id="estado_civil" required>
						<option value="Soltero">Soltero</option>
						<option value="Casado">Casado</option>
						<option value="Divorciado">Divorciado</option>
						<option value="Viudo">Viudo</option>
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Teléfono</label>
					<input class="form-control" id="telefono" value="<?php echo $this->data['Estudiante']['telefono'] ?>" name="data[telefono]" placeholder="Escribe el teléfono" type="text" required maxlength="20">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Correo Electrónico</label>
					<input class="form-control" id="email-edit" value="<?php echo $this->data['Estudiante']['email'] ?>" name="data[email]" placeholder="Escribe el correo electrónico" type="email" required maxlength="80">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Dirección</label>
					<input class="form-control" id="direccion" name="data[direccion]" value="<?php echo $this->data['Estudiante']['direccion'] ?>" placeholder="Escribe la dirección" type="text" required maxlength="200">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Posee alguna discapacidad</label>
					<div class="input-group">
						<span class="input-group-addon">
						<input id="chkdiscapacidad" type="checkbox" name="data[discapacidad]">
						</span>
						<input type="text" value="<?php echo $this->data['Estudiante']['des_discapacidad'] ?>" id="des_discapacidad" name="data[des_discapacidad]" class="form-control" maxlength="60">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Pertenece a alguna Etnia Indígena</label>
					<div class="input-group">
						<span class="input-group-addon">
						<input id="chketnia" type="checkbox" name="data[etnia]">
						</span>
						<input type="text" value="<?php echo $this->data['Estudiante']['nombre_etnia'] ?>" id="nombre_etnia" name="data[nombre_etnia]" class="form-control" maxlength="60">
					</div>
				</div>
			</div>
		</div>
		<div class="row">			
			<div class="col-md-6">
				<div class="form-group">
					<label>Residenciado</label>&nbsp
					<input type="checkbox" id="residenciado" name="data[residenciado]" />
				</div>
			</div>
		</div>
	</div>
</div>


<div class="panel panel-default">
	<div class="panel-heading">Datos Académicos</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<label>Carrera</label>				
				<?php
					echo $this->Form->input('carrera_id',array(
						'options'=>$carreras,
						'label'=>false,
						'div'=>false,
						'class'=>'form-control',
						'required'=>'required',
						'id'=>'carreras'
					));
				?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Cohorte</label>
					<input class="form-control" value="<?php echo $est['Academico']['cohorte'] ?>" id="cohorte" name="data[cohorte]" placeholder="Escribe la cohorte" type="text" required maxlength="5">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Año o Semestre</label>
					<input class="form-control" value="<?php echo $est['Academico']['semestre'] ?>" id="semestre" name="data[semestre]" placeholder="Escribe los datos" type="text" required maxlength="20">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Promedio</label>
					<input class="form-control" value="<?php echo $est['Academico']['promedio'] ?>" id="promedio" name="data[promedio]" placeholder="Escribe el promedio" type="text" required >
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Número de materias</label>
					<input maxlength="3" class="form-control" value="<?php echo $est['Academico']['n_materias'] ?>" id="n_materias" name="data[n_materias]" placeholder="Escribe el número de materias" type="text" required >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Número de materias aplazadas</label>
					<input maxlength="3" class="form-control" value="<?php echo $est['Academico']['n_aplazadas'] ?>" id="n_aplazadas" name="data[n_aplazadas]" placeholder="Escribe el número de aplazadas" type="text" required >
				</div>
			</div>
		</div>		
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">Datos de la Solicitud</div>
	<div class="panel-body">
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Código</label>
					<input class="form-control" id="codigo-edit" value="<?php echo $this->data['Solicitante']['codigo'] ?>" name="data[codigo]" placeholder="Escribe el código" type="text" required maxlength="20">
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Prioridad</label>
					<select class="form-control" id="prioridad" name="data[prioridad]" required placehorder="Selecciona la prioridad">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="display:none" id="msj2" class="alert alert-danger text-center" role="alert"></div>

<button id="btn-validar" type="button" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Guardar
</button>

<button style="display:none" id="btnEnviar" type="submit" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Guardar
</button>
<br>

<input value="<?php echo $this->data['Estudiante']['residenciado'] ?>" type="hidden" id="hidden-residenciado" name="data[residenciado]">

	<input value="<?php echo $this->data['Estudiante']['etnia'] ?>" type="hidden" id="hidden-etnia" name="data[etnia]">

	<input value="<?php echo $this->data['Estudiante']['discapacidad'] ?>" type="hidden" id="hidden-discapacidad" name="data[discapacidad]">
	
<input type="hidden" name="data[estudiante_id]" value="<?php echo $est['Estudiante']['id'] ?>">
<input type="hidden" name="data[academico_id]" value="<?php echo $ac['Academico']['id'] ?>">

<?php echo $form->hidden('id' ,array('value' => $this->data['Solicitante']['id'])); ?>
</form><br>

<script type="text/javascript">
	$(document).ready(function() {

		$("#residenciado").click(function()
		{
			if($('#residenciado').prop('checked'))
			{
				$("#hidden-residenciado").val(1);
			}else
			{
				$("#hidden-residenciado").val(0);
			}
		});

		$("#chketnia").click(function()
		{
			if($('#chketnia').prop('checked'))
			{
				$("#hidden-etnia").val(1);
			}else
			{
				$("#hidden-etnia").val(0);
			}
		});

		$("#chkdiscapacidad").click(function()
		{
			if($('#chkdiscapacidad').prop('checked'))
			{
				$("#hidden-discapacidad").val(1);
			}else
			{
				$("#hidden-discapacidad").val(0);
			}
		});

		if(<?php echo $this->data['Estudiante']['residenciado'] ?>==1)
		{
			$("#residenciado").prop("checked", true);
		}
		if(<?php echo $this->data['Estudiante']['discapacidad'] ?>==1)
		{
			$("#chkdiscapacidad").prop("checked", true);
		}
		if(<?php echo $this->data['Estudiante']['etnia'] ?>==1)
		{
			$("#chketnia").prop("checked", true);
		}
		
		$('#carreras option[value=<?php echo $ac['Academico']['carrera_id'] ?>]').attr('selected','selected');
		$('#prioridad option[value=<?php echo $this->data['Solicitante']['prioridad'] ?>]').attr('selected','selected');
		$('#estado_civil option[value=<?php echo $est['Estudiante']['estado_civil'] ?>]').attr('selected','selected');
		if("<?php echo $est['Estudiante']['genero'] ?>"=="m"){
			$('#genero option[value=m]').attr('selected','selected');
		}else{
			$('#genero option[value=f]').attr('selected','selected');
		}

	});
</script>