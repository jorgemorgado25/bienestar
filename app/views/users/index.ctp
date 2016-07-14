<script type="text/javascript" charset="utf-8">
            $(document).ready(function()
            {
                $('#dataTables-example').DataTable({

                });
            });
        </script>
<script>
	function eliminar(id)
	{
		var confirm= alertify.confirm('Eliminar Administrador','¿Seguro desea eliminar el Administrador?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'}); 	
			confirm.set('onok', function(){
			$(location).attr("href","<?php echo $this->webroot ?>administradores/delete/"+id);
    	});
    }
</script>

	<h2>
		<a href="<?php echo $this->webroot . 'users/add/' ?>" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i> Nuevo Administrador</a>Administradores</h2><br>
	<div class="panel panel-default">
                        <div class="panel-heading">
                           	Todos los administradores
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
     <div class="table-responsive">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="dataTables-example">
				 <thead>
		<tr>
				<th>Nombre</th>
	            <th>Nivel</th>
	            <th>Activo</th>
				<th class="text-center">Acciones</th>
		</tr>
		</thead>
		<?php
		$i = 0;
		foreach ($administradores as $administrador):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $administrador['User']['nombres'] . ' ' . $administrador['User']['apellidos']; ?></td>
			<td><?php
	            $tipo='';
	            switch($administrador['User']['nivel']){
	                case 1:
	                    $tipo='Basico';
	                break;
	                case 2:
	                    $tipo='Avanzado';
	                break;
	            }echo $tipo;?>
				</td>
			<td><?php
				if ($administrador['User']['activo']==1){
					echo 'S&iacute;';
				}else{
					echo'No';}  ?>
			</td>
			<td class="text-center">
				<a title ="Editar" class="btn btn-default btn-sm" href="<?php echo $this->webroot . 'users/edit/' . $administrador['User']['id'] ?>">
					<i class="glyphicon glyphicon-pencil"></i></a>
				<a title="Ver" href="<?php echo $this->webroot . 'users/view/' . $administrador['User']['id'] ?>" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></a>
	    	&nbsp;				
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	

	</div>
	</div>
	</div>