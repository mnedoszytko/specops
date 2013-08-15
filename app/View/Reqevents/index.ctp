<div class="reqevents index">
	<h2><?php echo __('Reqevents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('spec_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('days'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($reqevents as $reqevent): ?>
	<tr>
		<td><?php echo h($reqevent['Reqevent']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reqevent['Spec']['name'], array('controller' => 'specs', 'action' => 'view', $reqevent['Spec']['id'])); ?>
		</td>
		<td><?php echo h($reqevent['Reqevent']['name']); ?>&nbsp;</td>
		<td><?php echo h($reqevent['Reqevent']['type']); ?>&nbsp;</td>
		<td><?php echo h($reqevent['Reqevent']['days']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reqevent['Reqevent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reqevent['Reqevent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reqevent['Reqevent']['id']), null, __('Are you sure you want to delete # %s?', $reqevent['Reqevent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Reqevent'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Specs'), array('controller' => 'specs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spec'), array('controller' => 'specs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
