<?php
	echo $this->Html->script('buscar-dependencias');
	echo $this->Html->script('validar_input_fecha');
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#ano_fin').numeric({
			allowMinus: false,
			allowThouSep : false,
    		allowDecSep: false
		});
	});
</script>

<h2>Agregar Becado</h2><br>

<form id="frm-registrar" action="<?php echo $html->url('/becados/add'); ?>" method="post">

<div class="panel panel-default">
	<div class="panel-heading">Datos del Estudiante</div>
	
		<table class="table">
			<tr>
				<th>Cédula</th>
				<th>Género</th>
			</tr>
			<tr>
				<td><?php echo $est['Estudiante']['cedula'] ?></td>
				<td>
					<?php 
						if($est['Estudiante']['genero']=='m')
						{
							echo 'Maculino';
						}else{
							echo 'Femenino';
						}
					?>
				</td>
			</tr>
			<tr>
				<th>Nombres y Apellidos</th>
				<th>Fecha de Nacimiento</th>
			</tr>
			<tr>
				<td>
					<?php echo $est['Estudiante']['nombres'] . ' ' . $est['Estudiante']['apellidos'] ?>
				</td>
				<td>
					<?php echo $this->Fechas->voltearFecha($est['Estudiante']['fecha_nac'])?>
				</td>
			</tr>
			<tr>
				<th>Estado Civil</th>
				<th>Teléfono</th>
			</tr>
			<tr>
				<td>
					<?php echo $est['Estudiante']['estado_civil'] ?>
				</td>
				<td>
					<?php echo ($est['Estudiante']['telefono'])?>
				</td>
			</tr>
			<tr>
				<th>Residenciado</th>
				<th>Correo Electónico</th>
			</tr>
			<tr>
				<td>
					<?php 
						if($est['Estudiante']['residenciado']=='0'){
							echo 'Sí';
						}else{
							echo 'No';
						}
					?>
				</td>
				<td>
					<?php echo $est['Estudiante']['email'] ?>
				</td>
			</tr>
			<tr>
				<th colspan="2">Dirección</th>
			</tr>
			<tr>
				<td colspan="2"><?php echo $est['Estudiante']['direccion'] ?></td>
			</tr>
		</table>
</div>

<div class="panel panel-default">
	<div class="panel-heading">Datos Académicos</div>
		<table class="table">
			<tr>
				<th>Carrera</th>
				<th>Cohorte</th>
				<th>N. Materias</th>
				<th>N. Aplazadas</th>
				<th>Promedio</th>
			</tr>
			<tr>
				<td>
					<?php echo $ac['Carrera']['nombre'] ?>
				</td>
				<td>
					<?php echo $ac['Academico']['cohorte'] ?>
				</td>
				<td>
					<?php echo $ac['Academico']['n_materias'] ?>
				</td>
				<td>
					<?php echo $ac['Academico']['n_aplazadas'] ?>
				</td>
				<td>
					<?php echo $ac['Academico']['promedio'] ?>
				</td>
			</tr>
		</table>					
</div>

<div class="panel panel-default">
	<div class="panel-heading">Datos del Beneficio</div>
	<div class="panel-body">
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nucleo</label>
					<?php
					echo $this->Form->input('nucleo_id',array(
						'options'=>$nucleos,
						'label'=>false,
						'div'=>false,
						'id' => 'sel-nucleo',
						'class'=>'form-control',
						'required'=>'required',
						'empty'=>true
					));
					?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Dependencia</label>
					<select name="data[dependencia_id]" class="form-control" id="sel-dependencia" required="required"></select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Tipo de Beneficio</label>
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
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Año de Culminación</label>
					<input maxlength="4" class="form-control" id="ano_fin" name="data[ano_fin]" placeholder="Escribe el año de culminación" type="text" required>
				</div>
			</div>
		</div>
	</div>
</div>


	<?php
	echo $this->Form->hidden('mes_fin',array(
		'value'=>'01',
	));
	?>


<input type="hidden" name="data[estudiante_id]" value="<?php echo $est['Estudiante']['id'] ?>">
<button id="btnEnviar" type="submit" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Guardar
</button>
</form>
<br>