<div class="greetings form">
<?php echo $this->Form->create('Greeting'); ?>
	<fieldset>
		<legend><?php echo __('Add Greeting'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Greetings'), array('action' => 'index')); ?></li>
	</ul>
</div>
