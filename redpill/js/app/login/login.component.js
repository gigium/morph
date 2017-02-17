'use strict';

angular.module('login', []).
    component('login',
    {
    templateUrl: '/redpill/templates/login.html',
    controller:
        function ($scope, AuthService, $window)
        {

            if(AuthService.isAuthenticated())$window.location.assign('/home');;
            (function initController() {
                // reset login status
                AuthService.ClearCredentials();
            })();

            $scope.login = function (username, password)
            {
                AuthService.login(username, password)
                .then( function (response) 
                {
                    if (response.success)
                    {
                        var is_doc = AuthService.isDoctor(response.data.id, response.data.token);
                        is_doc
                        .then(function(doctor)
                            {
                                AuthService.SetCredentials(response.data, doctor)
                                $window.location.assign('/home');
                            });
                    } else 
                    {
                        //FlashService.Error(response.message);
                          $scope.login_success = false;
                    }
                });
            }
        }
})

