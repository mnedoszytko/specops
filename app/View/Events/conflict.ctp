<h2>Konflikty dla wydarzenia <?=$event['Reqevent']['name']?> (<?=$event['Schedule']['name']?>) </h2>

Planowany termin: <strong><?=$event['Event']['start']?> - <?=$event['Event']['end']?></strong><br>

<h3>Konflikty:</h3>
<ul>
<? foreach ($conflicts as $c) { ?>
	<li><?=$c['Reqevent']['name']?> (<?=$c['Schedule']['name']?>): <strong><?=$c['Event']['start']?> - <?=$c['Event']['end']?></strong></li>
<? } ?>
</ul>
