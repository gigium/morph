'use strict';

angular.module('navBar', []).
    component('navBar',
    {
    templateUrl: '/redpill/templates/nav-bar.html',
    controller:
    function ($scope, $window, DOC_MENU, PATIENT_MENU, AuthService)
    {

        var user = AuthService.getSession();


        $scope.logout = function()
        {
            AuthService.logout();
            $window.location.assign('/');
        }



    	$scope.toggle = function() 
        {
        	$scope.showgraphSidebar = !$scope.showgraphSidebar;
    		console.log($scope.showgraphSidebar)
    	}



    	$scope.items = {}
        console.log(user);
    	if (user.current_user['doctor']){$scope.items = DOC_MENU}else{$scope.items = PATIENT_MENU}


    }
});

