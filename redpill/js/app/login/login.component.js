'use strict';

angular.module('login', []).
    component('login',
    {
    templateUrl: '/redpill/templates/login.html',
    controller:
        function ($scope, AuthService, $window, Flash)
        {

//uso funzione perchè refresha più velocemente per qualche motivo
            $scope.is_logged = function ()
            {
                return AuthService.isAuthenticated();
            };

            (function initController() 
            {
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
                                AuthService.SetCredentials(response.data, doctor);
                                $scope.login_success = true;

                                $window.location.assign('/home');
                            });
                    } else 
                    {
                        Flash.create('danger', "<strong>ERRORE!</strong> " + response);
                    }
                });

            }



        }
})

