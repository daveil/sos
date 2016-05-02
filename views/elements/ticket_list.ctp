<?php echo $this->Html->script('ticket_list',array('inline'=>false));?>
<div class="actions" ng-controller="TicketList">
	<h3>Recent tickets</h3>
	<ul >
		<li  ng-if="!Tickets.length">No tickets yet.</li>
		<li ng-if="Tickets.length" ng-repeat="t in Tickets">
			<a title="#{{t.Ticket.id}}: {{t.Ticket.school}} {{t.Ticket.system}}: {{t.Ticket.module}}" href="tickets/view/{{t.Ticket.id}}">
			{{t.Ticket.school}} {{t.Ticket.system}}: {{t.Ticket.module}}
			</a>
		</li>
		<li  ng-if="Tickets.length>=3"><a href="tickets">View all</a></li>
	</ul>
</div>