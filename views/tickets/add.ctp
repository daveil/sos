<div class="tickets form">
<?php echo $this->Form->create('Ticket');?>
	<fieldset>
		<legend><?php __('Add Ticket'); ?></legend>
	<?php
		echo $this->Form->input('school');
		echo $this->Form->input('system');
		echo $this->Form->input('module');
		echo $this->Form->input('content');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tickets', true), array('action' => 'index'));?></li>
	</ul>
</div>