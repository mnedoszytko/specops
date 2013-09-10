<script language="Javascript">
$(document).ready(function() {
 $.datepicker.regional['pl'];
 
 $(".datepicker").datepicker();
});


</script>
<div class="schedules form">
<?php echo $this->Form->create('Schedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Schedule'); ?></legend>
	<?php
		echo $this->Form->input('spec_id');
		echo $this->Form->input('name');
		echo $this->Form->input('start',array('label'=>'Początek (rrrr-mm-dd)','type'=>'text','class'=>'datepicker'));
		echo $this->Form->input('end',array('label'=>'Koniec (rrrr-mm-dd)','type'=>'text','class'=>'datepicker'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Schedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Specs'), array('controller' => 'specs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spec'), array('controller' => 'specs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
