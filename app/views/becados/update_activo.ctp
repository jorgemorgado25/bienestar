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


	<form action="<?php echo $html->url('/becados/update_activo'); ?>" method="post">

	<div>		
		<div class="form-group">
			<label>Cambiar Status</label>
			<?php
				if($becado['Becado']['activo'] == 1)
				{
					$opciones=$arrInactivo;
					//unset($opciones[12]);
					$acti = 0;
				}else
				{
					$opciones=$arrActivo;
					unset($opciones[1]);
					$acti = 1;
				}
				echo $this->Form->input('status',array(
					'options'=>$opciones,
					'label'=>false,
					'div'=>false,
					'class'=>'form-control',
					'required'=>'required',
					'empty'=>true,
					'id'=>'sel-status'
				));
			?>
		</div>

		<input size="10" type="hidden" id="hidden-activo" value="<?php echo $acti ?>" name="data[activo]"/>

		<div class="form-group">
			<label>Observaciones</label>

			<textarea name="data[observaciones]" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
		</div>

	</div>
	<div class="modal-footer">
	<button type="submit" id="btnEnviarActivo" class="btn btn-primary">Actualizar</button>
		<input name="data[becado_id]" type="hidden" value="<?php echo $becado['Becado']['id'] ?>" id="becado_id"/>
	</form>

<br><br>