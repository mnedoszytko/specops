<div class="specs form">
<?php echo $this->Form->create('Spec'); ?>
	<fieldset>
		<legend><?php echo __('Edit Spec'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Spec.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Spec.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Specs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reqevents'), array('controller' => 'reqevents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reqevent'), array('controller' => 'reqevents', 'action' => 'add')); ?> </li>
	</ul>
</div>
