'use strict';

angular.module('navBar', []).
    component('navBar',
    {
    templateUrl: '/redpill/templates/nav-bar.html',
    controller:
    function ($location, $scope, $window, DOC_MENU, PATIENT_MENU, AuthService, ProfileService)
    {

        (function initController() 
        {
            $scope.user = AuthService.getSession();
            ProfileService.getBasicInfo($scope.user.current_user.userId, $scope.user.current_user.token)
            .then(function(response)
            {
                $scope.basic_profile = response.data;//mettere anche nomwe e cognome e se immagine non esiste mettere immagine omino 
            })

        })();
        

        $scope.selected = function(path)
        {
            return path == $location.path();
        }
        $scope.is_logged = function()
        {
            return AuthService.isAuthenticated();
        }

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
        //mettere in una funzione per caricamento più veloce
        if ($scope.user.current_user['doctor']){$scope.items = DOC_MENU}else{$scope.items = PATIENT_MENU}


    }
});

