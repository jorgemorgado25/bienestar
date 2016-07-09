<script type="text/javascript">
	$(document).ready(function() {
		$('#txt-ano').numeric("integer");
	});
</script>

<!-- Modal Activo-->

<div class="modal fade" id="modal-activo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Actualizar Status</h4>
	</div>

	<form url="/becados/" method="post" id="frmActivo">

	<div class="modal-body">		
		<div class="form-group">
			<label>Cambiar Status</label>
			<?php
				if($becado['Becado']['activo'] == 1)
				{
					$opciones=$arrInactivo;
					unset($opciones[12]);
					$acti = 0;
				}else{
					$opciones=$arrActivo;
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
	</div>
</div>
</div>
</div>


<!-- Modal Culminado-->

<div class="modal fade" id="modal-culminado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Actualizar Status</h4>
	</div>

	<form url="/becados/" method="post" id="frmCulminado">

	<div class="modal-body">		
		<div class="form-group">
			<label>Cambiar Status</label>
			<?php
				if($becado['Becado']['culminado'] == 1)
				{
					$opciones = $arrCulminadoNo;
					//unset($opciones[12]);
					$culminado = 0;
				}else{
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

		<div class="form-group">
			<label>Año Fin</label>

			<input type="text" name="data[ano_fin]" id="ano_fin"  class="form-control">
		</div>

		<div class="form-group">
			<label>Observaciones</label>

			<textarea name="data[observaciones]" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
		</div>

	</div>
	<div class="modal-footer">
	<button type="submit" id="btnEnviarCulminado" class="btn btn-primary">Actualizar</button>
		<input name="data[becado_id]" type="hidden" value="<?php echo $becado['Becado']['id'] ?>" id="becado_id"/>
	</form>
	</div>
</div>
</div>
</div>


<!-- Modal Dependencia-->

<div class="modal fade" id="modal-dependencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Actualizar Dependencia</h4>
	</div>

	<form url="/becados/" method="post" id="frmDependencia">

	<div class="modal-body">		
		<div class="form-group">
		<label>Nueva Dependencia</label>
			<?php
				echo $this->Form->input('dependencia_id',array(
					'options'=>$dependencias,
					'label'=>false,
					'div'=>false,
					'class'=>'form-control',
					'required'=>'required',
					'empty'=>true
				));
			?>
		</div>
		<div class="form-group">
			<label>Observaciones</label>
			<input type="text" id="" name="data[observaciones]" class="form-control">
		</div>
	</div>
		<div class="modal-footer">
		<button type="submit" id="btnEnviarDependencia" class="btn btn-primary">Actualizar</button>
		<input name="data[becado_id]" type="hidden" value="<?php echo $becado['Becado']['id'] ?>" id="becado_id"/>
	</form>
</div>
</div>
</div>
</div>