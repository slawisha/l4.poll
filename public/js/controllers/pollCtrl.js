angular.module('pollCtrl',[])

	.controller('pollController', function($scope, $routeParams, $http, pollService, answerService ){

		var pollId = $routeParams.id;

		$scope.hideQuestionForm = true;

		$scope.clickedIndex = null;
		$scope.clickedVote = null;

		pollService.getPoll(pollId)
			.success(function(data){
				$scope.poll = data;
			});
		

		$scope.getAnswers = function(){
			answerService.get(pollId)
			.success(function(data){
				$scope.answers = data;
			});
		}

		$scope.getAnswers();

		$scope.showTitleForm = function(){
			$scope.hideQuestionForm = false;
		};

		$scope.updateQuestion = function(pollId,pollQuestion, pollOrder){
			$scope.hideQuestionForm = true;
			pollService.update(pollId,pollQuestion, pollOrder);
		};

		$scope.addAnswer = function(pollId){
			$scope.answers.push({"id":$scope.answers.length+1, "text":$scope.newAnswer, "votes":0, "created_at" :  new Date().toDateString()});
			answerService.save(pollId,$scope.newAnswer);
			$scope.newAnswer= null;
		};

		$scope.deleteAnswer = function(answerId, index){
			$scope.answers.splice(index,1);
			answerService.delete(answerId);
		};

		$scope.editAnswer = function(index){
			$scope.clickedIndex = index;
			
		};

		$scope.cancelAnswerEdit = function(){
			$scope.clickedIndex = null;
			$scope.getAnswers();
		}

		$scope.changeAnswer = function(answerId, answerText, answerVotes){
			$scope.clickedIndex = null;
			answerService.update(answerId, answerText, answerVotes);
		}

		$scope.editVotes = function(index){
			$scope.clickedVote = index;	
		};

		$scope.cancelVoteEdit = function(){
			$scope.clickedVote = null;
			$scope.getAnswers();
		}

		$scope.changeVotes = function(answerId, answerText, answerVotes){
			$scope.clickedVote = null;
			answerService.update(answerId, answerText, answerVotes);
		}

		
	});