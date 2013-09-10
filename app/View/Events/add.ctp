<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('schedule_id');
		echo $this->Form->input('reqevent_id');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('completed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reqevents'), array('controller' => 'reqevents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reqevent'), array('controller' => 'reqevents', 'action' => 'add')); ?> </li>
	</ul>
</div>
