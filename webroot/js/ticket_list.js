SOS.controller('TicketList',function($scope,$rootScope,$http){
	$rootScope.Tickets = [];
	$http.get('tickets').then(function success(response){
		$rootScope.Tickets = response.data;
	});
});