angular.module('pollService', [])

	.factory('pollService', function($http) {
		return {
			get: function(page, perPage){
				return $http.get('/api/v1/polls?page=' + page + '&perpage=' + perPage);
			},
			getPoll: function(pollId){
				return $http.get('api/v1/polls/' + pollId);
			},
			update: function(pollId, question, pollOrder){
				return $http({
					method: 'PUT',
					url: '/api/v1/polls/' + pollId,
					params: {question: question, order: pollOrder }
				});
			},
			save: function(newPoll, pollOrder){
				return $http({
					method: 'POST',
					url: '/api/v1/polls',
					params: {question: newPoll, order: pollOrder}
				});
			},
			delete: function(pollId){
				return $http({
					method: 'DELETE',
					url: '/api/v1/polls/' + pollId
				})
			}
		}
	});