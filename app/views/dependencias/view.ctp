<div class="dependencias view">
<h2><?php  __('Dependencia');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dependencia['Dependencia']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dependencia['Dependencia']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Supervisor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dependencia['Dependencia']['supervisor']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dependencia', true), array('action' => 'edit', $dependencia['Dependencia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Dependencia', true), array('action' => 'delete', $dependencia['Dependencia']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $dependencia['Dependencia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dependencias', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dependencia', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Becados', true), array('controller' => 'becados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Becado', true), array('controller' => 'becados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hdependencias', true), array('controller' => 'hdependencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hdependencia', true), array('controller' => 'hdependencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nominas', true), array('controller' => 'nominas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nomina', true), array('controller' => 'nominas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Becados');?></h3>
	<?php if (!empty($dependencia['Becado'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Estudiante Id'); ?></th>
		<th><?php __('Dependencia Id'); ?></th>
		<th><?php __('Tipo Id'); ?></th>
		<th><?php __('Mes Fin'); ?></th>
		<th><?php __('Ano Fin'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($dependencia['Becado'] as $becado):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $becado['id'];?></td>
			<td><?php echo $becado['estudiante_id'];?></td>
			<td><?php echo $becado['dependencia_id'];?></td>
			<td><?php echo $becado['tipo_id'];?></td>
			<td><?php echo $becado['mes_fin'];?></td>
			<td><?php echo $becado['ano_fin'];?></td>
			<td><?php echo $becado['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'becados', 'action' => 'view', $becado['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'becados', 'action' => 'edit', $becado['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'becados', 'action' => 'delete', $becado['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $becado['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Becado', true), array('controller' => 'becados', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Hdependencias');?></h3>
	<?php if (!empty($dependencia['Hdependencia'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Becado Id'); ?></th>
		<th><?php __('Dependencia Id'); ?></th>
		<th><?php __('Flag'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Observaciones'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($dependencia['Hdependencia'] as $hdependencia):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $hdependencia['id'];?></td>
			<td><?php echo $hdependencia['becado_id'];?></td>
			<td><?php echo $hdependencia['dependencia_id'];?></td>
			<td><?php echo $hdependencia['flag'];?></td>
			<td><?php echo $hdependencia['created'];?></td>
			<td><?php echo $hdependencia['observaciones'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'hdependencias', 'action' => 'view', $hdependencia['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'hdependencias', 'action' => 'edit', $hdependencia['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'hdependencias', 'action' => 'delete', $hdependencia['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hdependencia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hdependencia', true), array('controller' => 'hdependencias', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Nominas');?></h3>
	<?php if (!empty($dependencia['Nomina'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Cabecera Id'); ?></th>
		<th><?php __('Tipo Id'); ?></th>
		<th><?php __('Becado Id'); ?></th>
		<th><?php __('Dependencia Id'); ?></th>
		<th><?php __('Monto'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($dependencia['Nomina'] as $nomina):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $nomina['id'];?></td>
			<td><?php echo $nomina['cabecera_id'];?></td>
			<td><?php echo $nomina['tipo_id'];?></td>
			<td><?php echo $nomina['becado_id'];?></td>
			<td><?php echo $nomina['dependencia_id'];?></td>
			<td><?php echo $nomina['monto'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'nominas', 'action' => 'view', $nomina['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'nominas', 'action' => 'edit', $nomina['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'nominas', 'action' => 'delete', $nomina['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $nomina['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Nomina', true), array('controller' => 'nominas', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
