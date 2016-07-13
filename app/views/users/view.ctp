<h2>Ver Administrador</h2>
<br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Datos de la Solicitud</h4>
	</div>
	<table class="table table-bordered">
		<tr>
			<th>Nombre y Apellido</th>
			<th>Login</th>
		</tr>
		<tr>
			<td><?php echo $this->data['User']['nombres'] . ' ' . $this->data['User']['apellidos']?></td>
			<td><?php echo $this->data['User']['login'] ?></td>
			<td></td>
		</tr>
		<tr>
			<th>Nivel</th>
			<th>Activo</th>
		</tr>
		<tr>
			<td>
				<?php
					if($this->data['User']['nivel'] == '1')
					{
						echo 'Básico';
					}else
					{
						echo 'Administrador';
					}
				?>
			</td>
			<td>
				<?php
					if($this->data['User']['activo'] == '1')
					{
						echo 'Sí';
					}else
					{
						echo 'No';
					}
				?>
			</td>
		</tr>
	</table> 
</div>