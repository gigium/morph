'use strict';

angular.module('register', []).
    component('register',
    {
    templateUrl: '/redpill/templates/register.html',
    controller:
    function ($location, $routeParams, $scope, $http, Flash)
    {

        $scope.step = 1; 
        $scope.registerStepOne = function(email, password, password_confirm, doctor)
        {
            if(password == password_confirm)
            {
                console.log(email, password, doctor);
                $scope.step+=1;
            }else
            {
                $scope.error = "inputError1"; 
                var message = '<strong>ERRORE!</strong> la password confermata non corrisponde';
                Flash.create('danger', message);
            }

        } 
    }
});

