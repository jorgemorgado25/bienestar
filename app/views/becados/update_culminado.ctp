<script>
	$( document ).ready(function() {
    	$('#ano_fin').numeric("integer");
	});
</script>
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

	<form action="<?php echo $html->url('/becados/update_culminado'); ?>" method="post">

	<div>		
		<div class="form-group">
			<label>Cambiar Status</label>
			<?php
				if($becado['Becado']['culminado'] == 1)
				{
					$opciones = $arrCulminadoNo;
					//unset($opciones[12]);
					$culminado = 0;
				}else
				{
					$opciones = $arrCulminadoSi;
					$culminado = 1;
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

		<input size="10" type="hidden" id="hidden-culminado" value="<?php echo $culminado ?>" name = "data[culminado]"/>

		<div 
		<?php 
				if($becado['Becado']['culminado'] == 0)
				{
					echo "class='hidden form-group'";
				}else
				{
					echo "class='form-group'";
				}
			?>
		>
			<label>Año Fin</label>

			<input value="<?php echo $becado['Becado']['ano_fin'] ?>" type="text" name="data[ano_fin]" id="ano_fin"  class="form-control" required maxlength="4">
		</div>

		<div class="form-group">
			<label>Observaciones</label>

			<textarea name="data[observaciones]" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
		</div>

	</div>
	<div class="modal-footer">
		<input name="data[becado_id]" type="hidden" value="<?php echo $becado['Becado']['id'] ?>" id="becado_id"/>
	<button type="submit" id="btnEnviarCulminado" class="btn btn-primary">Actualizar</button>
	
	</form>
	</div>