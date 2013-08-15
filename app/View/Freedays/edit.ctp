<div class="freedays form">
<?php echo $this->Form->create('Freeday'); ?>
	<fieldset>
		<legend><?php echo __('Edit Freeday'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Freeday.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Freeday.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Freedays'), array('action' => 'index')); ?></li>
	</ul>
</div>
