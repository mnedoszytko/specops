<?
$event_types = Configure::read('Events.types');
?>
<script type="text/javascript">
	$(document).ready(function() {

		$(".datepicker").datepicker();

	});

</script>
<div class="schedules view">
<h2><?=$schedule['Schedule']['name']?> - <?=$schedule['Spec']['name']?></h2>
	<dl>
		
		
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['name']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Spec'); ?></dt>
		<dd>
			<?php echo $this->Html->link($schedule['Spec']['name'], array('controller' => 'specs', 'action' => 'view', $schedule['Spec']['id'])); ?>
			&nbsp;
		</dd>		

		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['end']); ?>
			&nbsp;
		</dd>

		<dt>Dni roboczych:</dt>
		<dd>
		 <?php echo $schedule['Schedule']['wdays'];?>
		</dd>
	</dl>



<h2>Plan specjalizacji</h2>
<table>
<th>Typ</th>
<th>Nazwa</th>
<th>Dni</th>

<? foreach ($schedule['Spec']['Reqevent'] as $re) { ?>
<tr>
<td><?=$event_types[$re['type']]?></td>
<td><?=$re['name']?></td>
<td><?=$re['days']?></td>

</tr>
<? } ?>


</table>

<h2>Mój grafik</h2>
<? if (!empty($schedule['Event'])) { ?>
<? foreach ($schedule['Event'] as $event) { ?>

<? } ?>
<? } else { ?>
	jest pusty
<? } ?>

<ul>

	<?=$this->Form->create('Event');?>
		
		<?=$this->Form->hidden('schedule_id',array('value' => array('value' => $schedule['Schedule']['id'])));?>
		<?=$this->Form->input('reqevent_id');?>
		<?=$this->Form->input('start',array('type'=>'text','class'=>'datepicker'));?>
		<?=$this->Form->input('end',array('type'=>'text','class'=>'datepicker'));?>		
	<?=$this->Form->end('Dodaj');?>

</ul>


</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Schedule'), array('action' => 'edit', $schedule['Schedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Schedule'), array('action' => 'delete', $schedule['Schedule']['id']), null, __('Are you sure you want to delete # %s?', $schedule['Schedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specs'), array('controller' => 'specs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spec'), array('controller' => 'specs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($schedule['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Reqevent Id'); ?></th>
		<th><?php echo __('Starts'); ?></th>
		<th><?php echo __('Ends'); ?></th>
		<th><?php echo __('Schedule Id'); ?></th>
		<th><?php echo __('Completed'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($schedule['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['reqevent_id']; ?></td>
			<td><?php echo $event['starts']; ?></td>
			<td><?php echo $event['ends']; ?></td>
			<td><?php echo $event['schedule_id']; ?></td>
			<td><?php echo $event['completed']; ?></td>
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
