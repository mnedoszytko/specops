<div class="specs form">
<?php echo $this->Form->create('Spec'); ?>
	<fieldset>
		<legend><?php echo __('Add Spec'); ?></legend>
	<?php
		echo $this->Form->input('name');
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Specs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reqevents'), array('controller' => 'reqevents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reqevent'), array('controller' => 'reqevents', 'action' => 'add')); ?> </li>
	</ul>
</div>
