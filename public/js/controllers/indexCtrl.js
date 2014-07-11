angular.module('indexCtrl',['ui.bootstrap', 'ngAnimate'])

	.controller('indexController', function($scope, $http, pollService, answerService,  $modal, $log){
		var perPage = 6;
		$scope.dataAvailable = true;
		$scope.pages = [];

		$scope.loadPage = function(pageNumber, perPage){
			pollService.get(pageNumber,perPage)
				.success(function(data){
					$scope.polls = data.data;
				});
		}

			pollService.get(1,perPage)
				.success(function(data){
					$scope.currentPage = data.current_page;
					$scope.lastPage = data.last_page;
					$scope.polls = data.data;
					for (i=1;i<=$scope.lastPage;i++){
						$scope.pages.push(i);
					}
				});	

		$scope.loadFirstPage = function(){
			$scope.loadPage(1, perPage);
			$scope.currentPage=1;
		};

		$scope.loadLastPage = function(){
			$scope.loadPage($scope.lastPage, perPage);
			$scope.currentPage = $scope.lastPage;
		};

		$scope.loadNthPage = function(pageNumber){
			$scope.loadPage(pageNumber,perPage);
			$scope.currentPage = pageNumber;
		}

		

		$scope.open = function(pollId,pollName){

			var modalInstance = $modal.open({
		      templateUrl: 'partials/modal.html',
		      controller: ModalInstanceCtrl,
		      resolve: {
		        pollId: function () {			        
		          return pollId;
		        },
		        pollName: function(){
		        	return pollName
		        }
		      }
		    });


		    modalInstance.result.then(function (selectedItem) {
		      $scope.selected = selectedItem;
		      console.log($scope.selected);
		      answerService.vote(selectedItem)
		      	.success(function(data){
		      		console.log(data);
		      	})
		    }, function () {
		      $log.info('Modal dismissed at: ' + new Date());
		    });
		};

		var ModalInstanceCtrl = function ($scope, $modalInstance, pollId, pollName) {

		   answerService.get(pollId)
					.success(function(data){
						$scope.items = data;
					});
					
		  $scope.pollName = pollName;

		  $scope.selected = {
		    item: ""
		  };

		  $scope.ok = function () {
		    $modalInstance.close($scope.selected.item);
		  };

		  $scope.cancel = function () {
		    $modalInstance.dismiss('cancel');
		  };
		};

		$scope.viewPollResult = function(pollId, pollName){
			var modalInstance = $modal.open({
		      templateUrl: 'partials/modal-results.html',
		      controller: ModalInstanceCtrl,
		      resolve: {
		        pollId: function () {			        
		          return pollId;
		        },
		        pollName: function(){
		        	return pollName
		        }
		      }
		  });
		};
});