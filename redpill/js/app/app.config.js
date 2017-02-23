'use strict';

angular.module('morpheus').
    config(function(
        $locationProvider,
        $routeProvider
    ){
        $locationProvider.html5Mode({
            enabled:true
        })
    $routeProvider.
        when("/", {
            template: "<a href='/register'>registrati</a> o <a href='/login'>loggati</a>"
        }).
        when("/login", {
            template: "<login></login>"
        }).
        when("/register", {
            template: "<register></register>"
        }).
        when("/loading/:id", {
           template: "<loading></loading>"
        }).
        when("/home", {
            template: "<dashboard></dashboard>",
        }).
        when("/patient/:id", {
           template: "<patient-detail></patient-detail>"
        }).
        otherwise({
            template: "<h1>404 NOT FOUND</h1>"
    })
});

/*run.$inject = ['AuthService','$rootScope', '$location', '$http'];//$cookies
function run(AuthService ,$rootScope, $location, $http)//$cookies
    {
       //  // keep user logged in after page refresh
       //  var current_user =  AuthService.getCurrentUSer();
       // // if (current_user == {})current_user = $cookies.getObject('globals') || {};
       //
       //  if (AuthService.isAuthenticated())
       //  {
       //
       //      $http.defaults.headers.common['Authorization'] = 'Basic ' + current_user.sessionId;
       //  }

        $rootScope.$on("$locationChangeSuccess", function()
        {
          console.log(AuthService.isAuthenticated())
          $rootScope.logged = AuthService.isAuthenticated()
            // redirect to login page if not logged in and trying to access a restricted page
         /*   if (AuthService.isAuthenticated()) {
                $location.path('/');
            }
        });
    }*/



morpheus.run(function(AuthService,$rootScope, $location, NOT_LOGGED_PATHS)
{

 $rootScope.$on("$routeChangeStart", function()
        {
            console.log();
            if(
              !AuthService.isAuthenticated() 
                && 
                !(
                  NOT_LOGGED_PATHS.LOGIN == $location.path() 
                  ||  $location.path() == "/" 
                  || $location.path() == NOT_LOGGED_PATHS.REGISTER
                )
              )$location.path("/").replace();
            
            // redirect to login page if not logged in and trying to access a restricted page
         /*   if (AuthService.isAuthenticated()) {
                $location.path('/');
            }*/
        });
})
    