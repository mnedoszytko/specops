<script type="text/javascript">
  $(document).ready(function() {
     $.datepicker.regional['pl'];
      $(".datepicker").datepicker();
     });
</script>
<h2>Uzupełnij daty dla wydarzenia <?=$reqevent['Reqevent']['name']?> (<?=$reqevent['Spec']['name']?>)</h2>
<p>
	Wymagane dni: <?=$reqevent['Reqevent']['days'];?>
	</p>
<? if (!empty($events)) { ?>

<div class="related">
	<h3>Daty</h3>
	
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
		<th>Od</th>
		<th>Do</th>
		<th>Dni</th>
		<th>Ukończono</th>
			
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;

		foreach ($events as $event): ?>
		<tr>
			
		
			<td><?php echo $event['Event']['start']; ?></td>
			<td><?php echo $event['Event']['end']; ?></td>
			<td><?php echo $event['Event']['working_days'];?></td>
			<td><?php echo $event['Event']['completed']; ?></td>
			<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['Event']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>


<? } else { ?>
Nie wprowadzono dat
<? } ?>

<?=$this->Form->create('Event',array('url'=>array('controller'=>'events','action'=>'add')));?>
<?=$this->Form->input('start',array('type'=>'text','class'=>'datepicker','required'=>true));?>
<?=$this->Form->input('end',array('type'=>'text','class'=>'datepicker','required'=>true));?>
<?=$this->Form->input('completed',array('type'=>'checkbox'));?>
<?=$this->Form->hidden('schedule_id',array('value'=>$schedule['Schedule']['id']));?>
<?=$this->Form->hidden('reqevent_id',array('value'=>$reqevent['Reqevent']['id']));?>
<?=$this->Form->hidden('redirect_to_referer',array('value'=>true));?>
<?=$this->Form->end('Dodaj');?>


<p>
<?=$this->Html->link('Powrót do planu specki',array('controller'=>'schedules','action'=>'view',$schedule['Schedule']['id']));?>
	</p>