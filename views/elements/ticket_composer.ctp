<?php echo $this->Html->script('ticket_composer',array('inline'=>false));?>
<div class="tickets form" ng-controller="TicketComposer">
<?php echo $this->Form->create('Ticket',array('action'=>'add'));?>
<fieldset>
	<legend><?php __('Create Ticket'); ?></legend>
	<?php echo $this->Form->input('school',array('ng-model'=>'Ticket.school','maxlength'=>10,'placeholder'=>'School Name'));?>
	<?php echo $this->Form->input('system',array('ng-model'=>'Ticket.system','maxlength'=>5,'placeholder'=>'ERB/ISMS'));?>
	<?php echo $this->Form->input('module',array('ng-model'=>'Ticket.module','maxlength'=>20,'placeholder'=>'Grade Entry/Assessment etc.'));?>
	<div class="composer-concern">
	<label for="TicketConcern" class="pull-left">Concern</label>
	<span class="pull-right">{{140 - Ticket.concern.length}}</span>
	</div>
	<?php echo $this->Form->input('concern',array('label'=>false,'ng-model'=>'Ticket.concern','type'=>'textarea','maxlength'=>140,'placeholder'=>'Summary of concern, maximum of 140 characters.'));?>
	<?php echo $this->Form->input('user',array('ng-model'=>'Ticket.user','maxlength'=>20,'placeholder'=>'User\'s full name'));?>	
	<?php echo $this->Form->input('level_section',array('label'=>'Level & Section *','ng-model'=>'Ticket.level_section','maxlength'=>20,'placeholder'=>'G8 Example'));?>
	<?php echo $this->Form->input('sno',array('label'=>'Sno **','ng-model'=>'Ticket.student_number','maxlength'=>20,'placeholder'=>'Student number'));?>
	<?php echo $this->Form->input('student',array('label'=>'Student **','ng-model'=>'Ticket.student_name','maxlength'=>20,'placeholder'=>'Student\'s  name'));?>
</fieldset>
<pre>

{{Ticket.school}} {{Ticket.system}}: {{Ticket.module}}. 
{{Ticket.concern}}.
{{Ticket.user}} - {{Ticket.level_section}}  				
{{Ticket.student_name}} {{Ticket.student_number}}
</pre>
<?php echo $this->Form->submit('Submit Ticket',array('type'=>'button')); ?>
<?php echo $this->Form->submit('Cancel Ticket',array('type'=>'reset')); ?>
NOTES:
<ul>
	<li>* Use keyword "ALL" to denote scope <i>(ex. ALL GS, ALL G7)</i></li>
	<li>** Leave blank if concern section or level wide</li>
</ul>
<?php echo $this->Form->end();?>
</div>