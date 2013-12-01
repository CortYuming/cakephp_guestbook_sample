<div class="greetings view">
<h2><?php echo __('Greeting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($greeting['Greeting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($greeting['Greeting']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($greeting['Greeting']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($greeting['Greeting']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Greeting'), array('action' => 'edit', $greeting['Greeting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Greeting'), array('action' => 'delete', $greeting['Greeting']['id']), null, __('Are you sure you want to delete # %s?', $greeting['Greeting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Greetings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Greeting'), array('action' => 'add')); ?> </li>
	</ul>
</div>
