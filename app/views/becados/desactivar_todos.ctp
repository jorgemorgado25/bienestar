<script>
	$(document).ready(function(){
		$("#btnValidar").click(function()
		{
			if($("#sel-tipo").val() == '')
			{
				alert('Seleccione una opción');
				return false;
			}
			
			bootbox.dialog({
		  message: "¿Realmente desea desactivar los beneficiados?<br/><small class='text-danger'>Nota: Se recomienda realizar un respaldo de Base de Datos antes de ejecutar esta acción.</smal>",
		  title: "Desactivar Beneficiados",
		  buttons: {
		    danger: {
		      label: "Aceptar",
		      className: "btn-default",
		      callback: function() {
		      	$("#btnEnviar").click();
		      }
		    },
		    main: {
		      label: "Cancelar",
		      className: "btn-primary",
		      callback: function() {
		        
		      }
		    }
		  }
		});
		
		});
	});
</script>

<h2>Desactivar Todos los Becados</h2><br>

<div style="display:none" id="msj1" class="alert alert-danger text-center" role="alert" onsubmit=""></div>
<form id="frm-registrar" action="" method="post">
<div class="panel panel-default">
	<div class="panel-heading">Seleccione el tipo de beneficio</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Tipo</label>
					<?php
					
					echo $this->Form->input('tipo_id',array(
						'empty' => true,
						'options'=>$tipos,
						'label'=>false,
						'div'=>false,
						'id' => 'sel-tipo',
						'class'=>'form-control',
						'required'=>'required',
						'empty'=>true
					));
					
					?>
				</div>
			</div>			
		</div>
	</div>
</div>

<button id="btnValidar" type="button" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Aceptar
</button>

<button style="display:none" id="btnEnviar" type="submit" class="btn btn-primary">
	<i class="fa fa-save fa-fw"></i> Enviar
</button>

</form>