<div class="becados form">
<?php echo $this->Form->create('Becado');?>
	<fieldset>
		<legend><?php __('Edit Becado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('estudiante_id');
		echo $this->Form->input('dependencia_id');
		echo $this->Form->input('tipo_id');
		echo $this->Form->input('mes_fin');
		echo $this->Form->input('ano_fin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Becado.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Becado.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Becados', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Estudiantes', true), array('controller' => 'estudiantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estudiante', true), array('controller' => 'estudiantes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dependencias', true), array('controller' => 'dependencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dependencia', true), array('controller' => 'dependencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos', true), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo', true), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activos', true), array('controller' => 'activos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activo', true), array('controller' => 'activos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hdependencias', true), array('controller' => 'hdependencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hdependencia', true), array('controller' => 'hdependencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nominas', true), array('controller' => 'nominas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nomina', true), array('controller' => 'nominas', 'action' => 'add')); ?> </li>
	</ul>
</div>