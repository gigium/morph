'use strict';

angular.module('patientDetail', []).
    component('patientDetail',
    {
    templateUrl: '/redpill/templates/patient-detail.html',
    controller:
    function ($scope, $http, $location, $routeParams)
    {
        console.log($routeParams);
        var port = 9292;
        var dom ="http://localhost:";
        var url_paz =   dom + port + "/JSON/paziente" + $routeParams.id + ".json";


        $http({
            method: 'GET',
            url: url_paz
        }).then(function successCallback(response) {
            $scope.patient = response.data.patient;
            console.log(response.data.patient);
        }, function errorCallback(response) {
            $scope.error = true;
        });

        
        $scope.modify = function (id)
        {
            console.log("id cliccato: " + id)
        }

    }
});

