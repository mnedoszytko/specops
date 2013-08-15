<div class="specs view">
<h2><?php echo __('Spec'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($spec['Spec']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($spec['Spec']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($spec['Spec']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($spec['Spec']['end']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Spec'), array('action' => 'edit', $spec['Spec']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Spec'), array('action' => 'delete', $spec['Spec']['id']), null, __('Are you sure you want to delete # %s?', $spec['Spec']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Specs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spec'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reqevents'), array('controller' => 'reqevents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reqevent'), array('controller' => 'reqevents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reqevents'); ?></h3>
	<?php if (!empty($spec['Reqevent'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Spec Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Days'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($spec['Reqevent'] as $reqevent): ?>
		<tr>
			<td><?php echo $reqevent['id']; ?></td>
			<td><?php echo $reqevent['spec_id']; ?></td>
			<td><?php echo $reqevent['name']; ?></td>
			<td><?php echo $reqevent['type']; ?></td>
			<td><?php echo $reqevent['days']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reqevents', 'action' => 'view', $reqevent['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reqevents', 'action' => 'edit', $reqevent['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reqevents', 'action' => 'delete', $reqevent['id']), null, __('Are you sure you want to delete # %s?', $reqevent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reqevent'), array('controller' => 'reqevents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
