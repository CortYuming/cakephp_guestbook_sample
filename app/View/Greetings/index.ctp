<div class="title">
	<h1>Greetings</h1>
</div>

<div class="greetings form">
	<?php echo $this->Form->create('Greeting'); ?>
	<fieldset>
		<?php
		echo $this->Form->input('name',
		array('label' => '', 'placeholder' => 'Name')
		);
		echo $this->Form->input('comment',
		array('label' => '', 'placeholder' => 'Comment')
		);
		?>
	<?php echo $this->Form->end('Greet'); ?>
	</fieldset>
</div>

<div class="greetings index">
	<table cellpadding="0" cellspacing="0">
	<colgroup span="1" width="30%">
	<colgroup span="2" valign="middle">

	<?php foreach ($greetings as $greeting): ?>
	<tr>
		<td>
			<?php echo h($greeting['Greeting']['name']); ?><br />
			<small><?php echo h($greeting['Greeting']['created']); ?></small>
		</td>
		<td><?php echo h($greeting['Greeting']['comment']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
