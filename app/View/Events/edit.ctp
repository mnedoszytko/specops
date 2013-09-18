<script type="text/javascript">
  $(document).ready(function() {
     $.datepicker.regional['pl'];
      $(".datepicker").datepicker();
     });
</script>

<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('schedule_id');
		echo $this->Form->input('reqevent_id');
		echo $this->Form->input('start',array('type'=>'text','class'=>'datepicker'));
		echo $this->Form->input('end',array('type'=>'text','class'=>'datepicker'));
		echo $this->Form->input('completed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reqevents'), array('controller' => 'reqevents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reqevent'), array('controller' => 'reqevents', 'action' => 'add')); ?> </li>
	</ul>
</div>
