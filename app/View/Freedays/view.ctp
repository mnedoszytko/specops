<div class="freedays view">
<h2><?php echo __('Freeday'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($freeday['Freeday']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($freeday['Freeday']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($freeday['Freeday']['date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Freeday'), array('action' => 'edit', $freeday['Freeday']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Freeday'), array('action' => 'delete', $freeday['Freeday']['id']), null, __('Are you sure you want to delete # %s?', $freeday['Freeday']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Freedays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Freeday'), array('action' => 'add')); ?> </li>
	</ul>
</div>
