<?php echo $this->Html->script('buscar-dependencias'); ?>

<h2>Actualizar Status de Activo</h2><br>

<b>Cédula: </b><?php echo $becado['Estudiante']['cedula'] ?><br>
<b>Nombre y Apellido: </b><?php echo $becado['Estudiante']['nombres'] . ' ' . $becado['Estudiante']['apellidos'] ?>

<br><br>

<div class="panel panel-default">
	<div class="panel-heading"><h4>Datos del Beneficio</h4></div>
	<table class="table">
		<tr>
			<th>Núcleo</th>
			<th>Dependencia</th>
			<th>Tipo</th>
			<th>Activo</th>
			<th>Culminado</th>
			<th>Año Culminación</th>
		</tr>
		<tbody>
			<tr>
				<td id="td-dependencia">
					<?php echo $becado['Nucleo']['nombre'] ?>
				</td>
				<td id="td-dependencia">
					<?php echo $becado['Dependencia']['nombre'] ?>
				</td>
				<td><?php echo $becado['Tipo']['nombre'] ?></td>
				<td id="td-activo">
					<?php 
						if ($becado['Becado']['activo'])
						{
							echo 'Sí';
						}else
						{
							echo 'No';
						}
					?>
				</td>
				<td id="td-culminado">
					<?php 
						if ($becado['Becado']['culminado'])
						{
							echo 'Sí';
						}else
						{
							echo 'No';
						}
					?>
				</td>
				<td id="td-ano-fin">
					<?php echo $becado['Becado']['ano_fin'] ?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<form action="<?php echo $html->url('/becados/update_dependencia'); ?>" method="post">

	<div class="form-group">
		<label>Núcleo</label>
		<?php
			echo $this->Form->input('nucleo_id',array(
				'options'=>$nucleos,
				'value' => $becado['Becado']['nucleo_id'],
				'label'=>false,
				'div'=>false,
				'class'=>'form-control',
				'required'=>'required',
				'id'=>'sel-nucleo'
			));
		?>
	</div>


	<div class="form-group">
		<label>Depedencia</label>
		<?php
			echo $this->Form->input('dependencia_id',array(
				'options'=>$dependencias,
				'value' => $becado['Becado']['dependencia_id'],
				'label'=>false,
				'div'=>false,
				'class'=>'form-control',
				'required'=>'required',
				'id'=>'sel-dependencia'
			));
		?>
	</div>

	<div class="form-group">
		<label>Observaciones</label>

		<textarea name="data[observaciones]" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
	</div>

	<button type="submit" id="btnEnviarCulminado" class="btn btn-primary">Actualizar</button>

	<input name="data[becado_id]" type="hidden" value="<?php echo $becado['Becado']['id'] ?>" id="becado_id"/>
</form>
