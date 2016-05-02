 SOS.controller('TicketComposer',function($scope,$rootScope,$http){
	$scope.submitTicket = function(){
		if($scope.saving) alert('Saving. Please wait.');
		var ticket  = {
				school:$scope.Ticket.school,
				system:$scope.Ticket.system,
				module:$scope.Ticket.module,
				content:ticketContentComposer($scope.Ticket),
				json_data:JSON.stringify($scope.Ticket),
		};
		$scope.saving =true;
		$http.post('tickets/add',ticket)
			.then(function success(response){
				$scope.saving = false;
				var tid = response.data.Ticket.id;
				if(tid){
					alert('Ticket #'+tid+ ' has been created.');
					$rootScope.Tickets.push(response.data);
					$scope.cancelTicket();
				}
			},function error(response){
				$scope.saving =false;
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
			if(ticket.student_number)
				content += ticket.student_number + '-';
			if(ticket.student_name)
				content += ticket.student_name + '\n' ;
		return content;
	}
});
