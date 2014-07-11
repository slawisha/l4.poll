(function(){
	angular.module('pollsAppAdmin').controller('adminController', function($scope, pollService){

		$scope.pages = [];

		var perPage = 10;

		$scope.loadPage = function(pageNumber, perPage){
			pollService.get(pageNumber, perPage)
				.success(function(data){
					$scope.polls = data.data;
				});
		}
		
		var loadPolls = function() {
			pollService.get(1,perPage)
				.success(function(data){
					$scope.currentPage = data.current_page;
					$scope.lastPage = data.last_page;
					$scope.polls = data.data;
					for (i=1;i<=$scope.lastPage;i++){
						$scope.pages.push(i);
					}
				});
			}

		loadPolls();	

		$scope.loadFirstPage = function(){
			$scope.loadPage(1,3);
			$scope.currentPage=1;
		};

		$scope.loadLastPage = function(){
			$scope.loadPage($scope.lastPage,3);
			$scope.currentPage = $scope.lastPage;
		};

		$scope.loadNthPage = function(pageNumber){
			$scope.loadPage(pageNumber,3);
			$scope.currentPage = pageNumber;
		}

		$scope.addPoll = function(){
			$scope.polls.push({ "order": $scope.polls.length, "question":$scope.newPoll, "created_at" :  new Date().toDateString()});
			console.log($scope.polls.length);
			pollService.save($scope.newPoll, $scope.polls.length-1);
			$scope.newPoll= null;
			loadPolls();
		};

		$scope.deletePoll = function(pollId, index){
			$scope.polls.splice(index,1);
			pollService.delete(pollId);
		};

		$scope.sortableOptions = {
			placeholder: 'placeholder',
			 axis: 'y',
			 stop: function(event, ui){
			 	for (var index in $scope.polls) {
       			 $scope.polls[index].order = index;
       			 pollService.update($scope.polls[index].id, $scope.polls[index].question, $scope.polls[index].order);
      			}
			 }
		}

	});

})();