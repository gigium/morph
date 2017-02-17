'use strict';

angular.module('dashboard', []).
    component('dashboard',
    {
    templateUrl: '/redpill/templates/dashboard.html',
    controller:
    function ( $scope, $rootScope, AuthService)
    {


        
        var today = new Date().toString()
        var date = 
        {
            day_name: today.slice(0, 3),
            month_name: today.slice(4, 7),
            day_number: today.slice(8, 11),
            year: today.slice(11, 15)
        }
        var doc = false; 
        console.log (date)
//


    }
});

