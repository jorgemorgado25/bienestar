<?php
	echo $this->Html->script('funciones');
	echo $this->Html->script('validar_datos_beneficiados');
	echo $this->Html->script('validar_input_fecha');
?>

<h2>Agregar Solicitud</h2><br>

<div style="display:none" id="msj1" class="alert alert-danger text-center" role="alert"></div>
<form id="frm-registrar" action="<?php echo $html->url('/solicitantes/add'); ?>" method="post">
<div class="panel panel-default">
	<div class="panel-heading">Datos del Estudiante</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Cédula</label>
					<input class="form-control" id="cedula" name="data[cedula]" placeholder="Escribe la cédula" type="text" required autofocus maxlength=8>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Género</label>
					
					<select name="data[genero]" required class="form-control">
						<option value=""></option>
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
					<input class="form-control" id="nombres" name="data[nombres]" placeholder="Escribe los nombres" type="text" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Apellidos</label>
					<input class="form-control" id="apellidos" name="data[apellidos]" placeholder="Escribe los apellidos" type="text" required >
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Fecha de Nacimiento</label>
					<div class="input-group">
						<input maxlength="10" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" name="data[fecha_nac]" id="fecha_nac" type="date" class="form-control" required placeholder="dd-mm-aaaa">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Estado Civil</label>
					<select class="form-control" name="data[estado_civil]" id="estado_civil" required>
						<option value=""></option>
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
					<input class="form-control" id="telefono" name="data[telefono]" placeholder="Escribe el teléfono" type="text" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Correo Electrónico</label>
					<input class="form-control" id="email" name="data[email]" placeholder="Escribe el correo electrónico" required type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Dirección</label>
					<input class="form-control" id="direccion" name="data[direccion]" placeholder="Escribe la dirección" type="text" required>
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
						<input type="text" id="des_discapacidad" name="data[des_discapacidad]" class="form-control">
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
						<input type="text" id="nombre_etnia" name="data[nombre_etnia]" class="form-control" >
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
						'empty'=>true
					));
				?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Cohorte</label>
					<input class="form-control" id="cohorte" name="data[cohorte]" placeholder="Escribe la cohorte" type="text" required maxlength=5>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Año o Semestre</label>
					<input class="form-control" id="semestre" name="data[semestre]" placeholder="Escribe los datos" type="text" required >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Promedio</label>
					<input class="form-control" id="promedio" name="data[promedio]" placeholder="Escribe el promedio" type="text" required >
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Número de materias</label>
					<input maxlength="3" class="form-control" id="n_materias" name="data[n_materias]" placeholder="Escribe el número de materias" type="text" required >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Número de materias aplazadas</label>
					<input maxlength="3" class="form-control" id="n_aplazadas" name="data[n_aplazadas]" placeholder="Escribe el número de aplazadas" type="text" required >
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
					<input class="form-control" id="codigo" name="data[codigo]" placeholder="Escribe el código" type="text" required >
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Prioridad</label>
					<select class="form-control" name="data[prioridad]" required placehorder="Selecciona la prioridad">
						<option></option>
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
</form>
<br>