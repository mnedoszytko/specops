<div class="reqevents view">
<h2><?php echo __('Reqevent'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reqevent['Reqevent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Spec'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reqevent['Spec']['name'], array('controller' => 'specs', 'action' => 'view', $reqevent['Spec']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($reqevent['Reqevent']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($reqevent['Reqevent']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Days'); ?></dt>
		<dd>
			<?php echo h($reqevent['Reqevent']['days']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reqevent'), array('action' => 'edit', $reqevent['Reqevent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reqevent'), array('action' => 'delete', $reqevent['Reqevent']['id']), null, __('Are you sure you want to delete # %s?', $reqevent['Reqevent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reqevents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reqevent'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specs'), array('controller' => 'specs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spec'), array('controller' => 'specs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($reqevent['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Reqevent Id'); ?></th>
		<th><?php echo __('Starts'); ?></th>
		<th><?php echo __('Ends'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($reqevent['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['reqevent_id']; ?></td>
			<td><?php echo $event['starts']; ?></td>
			<td><?php echo $event['ends']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
