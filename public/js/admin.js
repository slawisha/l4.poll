(function(){
	var pollsAppAdmin = angular.module('pollsAppAdmin', ['ngRoute', 'pollService', 'answerService', 'pollCtrl', 'ui.sortable']);


		pollsAppAdmin.config(function($routeProvider){
				$routeProvider.
				when('/', {
					controller: 'adminController',
					templateUrl: 'partials/admin.html'
				}).
				when('/poll/:id', {
				controller: 'pollController',
				templateUrl: 'partials/poll.html'
				}).
				otherwise({
				redirectTo: '/'
				});
		});		
})();