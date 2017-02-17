'use strict';

angular.module('patientList', []).
    component('patientList',
    {
    templateUrl: '/redpill/templates/patient-list.html',
    controller:
    function ($location, $routeParams, $scope, $http)
    {
        var port = 9292;
        var path ="/JSON/pazienti.json";
        var url = "http://localhost:"+ port + path;
        $http.get(url).success(function (response)
        {
            $scope.items = response.pazienti;
        })
    }
});

