angular.module('answerService',[])
	
	.factory('answerService', function($http){
		return {
			get: function(id){
				return $http.get('api/v1/polls/' + id + '/answers')
			},
			vote: function(id){
				return $http({
					method: 'PUT',
					url: 'api/v1/answers/' + id + '/vote', 
				});
			},
			update: function(id, answerText, answerVotes){
				return $http({
					method: 'PUT',
					url: 'api/v1/answers/' + id + '/update',
					params: {answer: answerText, votes: answerVotes}
				});
			},
			save: function(pollId, newAnswer){
				return $http({
					method: 'POST',
					url: 'api/v1/polls/' + pollId + '/answers',
					params: {poll_id: pollId, answer:newAnswer}
				});
			},
			delete: function(id){
				return $http({
					method:'DELETE',
					url: 'api/v1/answers/' + id
				});
			}
		}
	});