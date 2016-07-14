<script type="text/javascript" charset="utf-8">
            $(document).ready(function()
            {
                $('#dataTables-example').DataTable({
                	"order": [[ 1, "desc" ]]
                });
            });
        </script>

	<h2>Bitácora del Sistema</h2><br>
	<div class="panel panel-default">
        <div class="panel-heading">
           	Registros
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
     <div class="table-responsive">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="dataTables-example">
				 <thead>
		<tr>
				<th>ID</th>
				<th>Login</th>
	            <th>Descripción</th>
	            <th>Fecha</th>
				<th class="text-center">Ver</th>
		</tr>
		</thead>
		<?php
		$i = 0;
		foreach ($auditorias as $audi):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $audi['Auditoria']['id']?></td>
			<td><?php echo $audi['Auditoria']['login']?></td>
			<td><?php echo $audi['Auditoria']['descripcion']?></td>
			<td><?php echo $audi['Auditoria']['created']?></td>
			<td class="text-center">
				<a href="<?php echo $this->webroot . $audi['Auditoria']['url'] . $audi['Auditoria']['resourse'] ?>" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></a>			
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	

	</div>
	</div>
	</div>