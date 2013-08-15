<div class="reqevents form">
<?php echo $this->Form->create('Reqevent'); ?>
	<fieldset>
		<legend><?php echo __('Edit Reqevent'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('spec_id');
		echo $this->Form->input('name');
		echo $this->Form->input('type',array('options'=>Configure::read('Events.types')));
		echo $this->Form->input('days');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Reqevent.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Reqevent.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reqevents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Specs'), array('controller' => 'specs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spec'), array('controller' => 'specs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
