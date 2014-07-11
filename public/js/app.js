(function(){
	var pollsApp = angular.module('pollsApp',['ngRoute', 'angularCharts', 'pollAlert', 'pollService', 'answerService',
								 'indexCtrl', 'pollCtrl', 'ngAnimate']);

	function pollsAppRouteConfig($routeProvider,  $locationProvider){
		$routeProvider.
			when('/', {
				controller: 'indexController',
				templateUrl: 'partials/list.html'
			}).
			when('views/:id/stats', {
				controller: 'statsController',
				templateUrl: 'partials/stats.html'
			}).
			otherwise({
				redirectTo: '/'
			});

			// $locationProvider.html5Mode(true);
	}

	pollsApp.config(pollsAppRouteConfig);

})();