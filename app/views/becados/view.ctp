<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#dataTable').DataTable({
			//"bPaginate": false,
        	"bFilter": false,
        	"bLengthChange": false,
        	"iDisplayLength": 5,
        	"order": [[3, "desc" ]],
        	//"bInfo": false
		});
	});
</script>

<h2>Detalle de Beneficiado</h2><br/>

<?php
	if($this->Session->check('Message.flash')):
		echo $this->Session->flash();
	endif;
?>

<div class="panel panel-default">
	<div class="panel-heading"><h4>Datos del Estudiante &nbsp;<a title="Editar" href="<?php echo $this->webroot . 'becados/edit_profile/' . $est['Estudiante']['id']?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-pencil"></i></a></h4></div>
		<table class="table table-striped">
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
							echo 'Masculino';
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
						if($est['Estudiante']['residenciado']==0)
						{
							echo 'No';
						}else{
							echo 'Sí';
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
	<div class="panel-heading"><h4>Datos Académicos</h4></div>
	<table class="table">
		<tr>
			<th>Carrera</th>
			<th>Semestre</th>
			<th>Cohorte</th>
		</tr>
		<tr>
			<td><?php echo $academico["Carrera"]["nombre"] ?></td>
			<td><?php echo $academico["Academico"]["semestre"] ?></td>
			<td><?php echo $academico["Academico"]["cohorte"] ?></td>
		</tr>
	</table>
</div>

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

<div class="panel panel-default" style="padding:10px">
	<div class="panel-heading">
		<h4>Historial Activo</h4>
	</div>
	<table class="table" id="dataTable">
		<thead>
			<tr>
				<th>Activo</th>
				<th>Status</th>
				<th>Observaciones</th>
				<th>Fecha Sistema</th>
			</tr>
		</thead>
		<tbody id="datos-activo">
			<?php 
				foreach ($hact as $h)
				{
					?>
						<tr>
							<td>
								<?php
									if($h['Activo']['activo'])
									{
										echo 'Sí';
									}else
									{
										echo 'No';
									}
									
								?>
							</td>
							<td>
								<?php
									
									if($h['Activo']['activo'])
									{
										echo $arrActivo[$h['Activo']['status']];
									}else
									{
										echo $arrInactivo[$h['Activo']['status']];
									}								
								?>
							</td>
							</td>
							<td><?php echo $h['Activo']['observaciones'] ?></td>
							<td><?php echo $this->Fechas->FormatoFecha($h['Activo']['created']) ?></td>
						</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>

<a href="<?php echo $this->webroot . 'becados/update_activo/' . $becado['Becado']['id'] ?>" class="btn btn-primary pull-right" id="btn-activo"
	<?php 
		if ($becado['Becado']['culminado'])
		{
			echo 'disabled';
		}
	?>
><i class="glyphicon glyphicon-refresh"></i> &nbsp;Actualizar Status</a>
<p><br/></p><p><br/></p>


<div class="panel panel-default">
	<div class="panel-heading">
	<h4>Historial Culminado</h4>

	</div>
	<table class="table">
		<tr>
			<th>Culminado</th>
			<th>Status</th>
			<th>Año Fin</th>
			<th>Observaciones</th>
			<th>Fecha Sistema</th>
		</tr>
		<tbody id="datos-culminado">
			<?php 
				foreach ($hcul as $h)
				{
					?>
						<tr>
							<td>
								<?php
									if($h['Hculminado']['culminado'])
									{
										echo 'Sí';
									}else
									{
										echo 'No';
									}
									
								?>
							</td>
							<td>
								<?php
									
									if($h['Hculminado']['culminado'])
									{
										echo $arrCulminadoSi[$h['Hculminado']['status']];
									}else
									{
										echo $arrCulminadoNo[$h['Hculminado']['status']];
									}								
								?>
							</td>
							<td><?php echo $h['Hculminado']['ano_fin'] ?></td>
							<td><?php echo $h['Hculminado']['observaciones'] ?></td>
							<td><?php echo $this->Fechas->FormatoFecha($h['Hculminado']['created']) ?></td>
						</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>

<a href="<?php echo $this->webroot . 'becados/update_culminado/' . $becado['Becado']['id'] ?>" class="btn btn-primary pull-right" id="btn-culminado"><i class="glyphicon glyphicon-refresh"></i> &nbsp;Actualizar Status</a>
<p><br/></p><p><br/></p>


<div class="panel panel-default">
	<div class="panel-heading"><h4>Historial de Dependencia</h4></div>
	<table class="table">
	
	<tr>
		<th>Núcleo</th>
		<th>Dependencia</th>
		<th>Observaciones</th>
		<th>Fecha</th>	
	</tr>
	<tbody id="datos-dependencia">
		<?php 
				foreach ($hdep as $h)
				{
					?>
						<tr>
							<td id="td-dependencia">
								<?php echo $h['Nucleo']['nombre'] ?>
							</td>
							<td><?php echo $h['Dependencia']['nombre'] ?></td>
							<td><?php echo $h['Hdependencia']['observaciones'] ?></td>
							<td><?php echo $this->Fechas->FormatoFecha($h['Hdependencia']['created']) ?></td>
						</tr>
					<?php
				}
			?>
	</tbody>
	</table>
</div>

<a href="<?php echo $this->webroot . 'becados/update_dependencia/' . $becado['Becado']['id'] ?>" class="btn btn-primary pull-right" id="btn-culminado"
	<?php 
		if ($becado['Becado']['culminado'])
		{
			echo 'disabled';
		}
	?>
><i class="glyphicon glyphicon-refresh"></i> &nbsp;Actualizar Status</a>

<p><br/></p><p><br/></p>