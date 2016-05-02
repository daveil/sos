 SOS.controller('TicketComposer',function($scope,$rootScope,$http){
	$scope.submitTicket = function(){
		var ticket  = {
				school:$scope.Ticket.school,
				system:$scope.Ticket.system,
				module:$scope.Ticket.module,
				content:ticketContentComposer($scope.Ticket),
				json_data:JSON.stringify($scope.Ticket),
		};
		$http.post('tickets/add',ticket)
			.then(function success(response){
				var tid = response.data.Ticket.id;
				if(tid){
					alert('Ticket #'+tid+ ' has been created.');
					$rootScope.Tickets.push(response.data);
					$scope.cancelTicket();
				}
			},function error(response){
				alert('ERROR:'+response);
			});
	}
	$scope.cancelTicket = function(){
		$scope.Ticket = {};
	}
	function ticketContentComposer(ticket){
		var content =  ticket.module + ';';
			content += ticket.concern + '\n';
			content += ticket.user + '-' +ticket.level_section + '\n' ;
			content += ticket.student_number + '-' +ticket.student_name + '\n' ;
		return content;
	}
});
