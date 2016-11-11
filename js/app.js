angular.module('LostKingdomAPIApp', [])
	.controller('TradegoodsCategoriesController', [ '$http', function( $http ) {
		var self = this;
		$http.get('http://api-dev.lostkingdom.net/api/v1/tradegoodcategories')
			.then(
				function(response) {
					self.categories = response.data;
					console.log( response );
				}
			);
	}]);