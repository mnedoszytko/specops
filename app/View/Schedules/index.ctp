<div class="schedules index">
	<h2><?php echo __('Schedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			
			<th><?php echo $this->Paginator->sort('name'); ?></th>
<th><?php echo $this->Paginator->sort('spec_id'); ?></th>

			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('end'); ?></th>
			<th>Dni roboczych</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($schedules as $schedule): ?>
	<tr>
		
		
		<td><?php echo h($schedule['Schedule']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($schedule['Spec']['name'], array('controller' => 'specs', 'action' => 'view', $schedule['Spec']['id'])); ?>
		</td>
		<td><?php echo h($schedule['Schedule']['start']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['end']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['wdays']); ?>&nbsp;</td>
		<td class="actions">

			<!-- <?php echo $this->Html->link('Program', array('controller'=>'reqevents','action' => 'spec', $schedule['Schedule']['spec_id'])); ?> -->
			<?php echo $this->Html->link('Grafik', array('action' => 'view', $schedule['Schedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $schedule['Schedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $schedule['Schedule']['id']), null, __('Are you sure you want to delete # %s?', $schedule['Schedule']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Schedule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Specs'), array('controller' => 'specs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spec'), array('controller' => 'specs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
