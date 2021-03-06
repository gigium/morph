/**
 * Created by luigi on 05/02/17.
 */
morpheus.factory('AuthService', function ($http, $rootScope, $cookies, $q) {

    var AuthService  = {};
    $rootScope.session = {logged: false, current_user:{}};
   


    AuthService.login = function(username, password, callback)
    {
        var defer = $q.defer();
       
        $http({
                method: 'POST',
                url: '/bluepill/api/users/token',
                data: {'username': username, 'password':password},
                headers: {'Content-Type': 'application/json', 'Accept':'application/json'}
            }).then(function successCallback(response) 
            {   
                defer.resolve(response.data); 

            }, 
            function errorCallback(response) 
            {
                defer.resolve(response.data.message)
            });

            return defer.promise;
                 
    };



    AuthService.logout = function()
    {
        AuthService.ClearCredentials();
        $cookies.remove('session');
    }




    AuthService.SetCredentials = function (user, is_doc) 
    {

        // set default auth header for http requests
        $rootScope.session =    
            {
                logged: true,
                current_user:
                        {
                            token: user.token, 
                            userId: user.id, 
                            doctor: is_doc
                        }
            };


        // store user details in globals cookie that keeps user logged in for 1 week (or until they logout)
        var cookieExp = new Date();
        cookieExp.setDate(cookieExp.getDate() + 7);
        $cookies.putObject('session', $rootScope.session, {expires: cookieExp});
        
    };




    AuthService.ClearCredentials  = function  ()
    {
        $rootScope.session = {logged:false, current_user:{}}
    };




    AuthService.isAuthenticated = function ()
    {
        //TODO Isauth restituisce solo rootscope, se esistono cookie carica sessione da cookie
        if(!$rootScope.session['logged'])
        {
            var cookies = $cookies.getObject('session') ;
            if(cookies != null)
                $rootScope.session = cookies;
            else
                $rootScope.session = {logged: false, current_user:{}};
        }
        return $rootScope.session['logged'];
    };



    AuthService.getSession = function ()
    {
        return $rootScope.session;
    }


    AuthService.isDoctor = function(id, token)
    {
        var defer = $q.defer();
        $http({
            method: 'GET',
            url: '/bluepill/api/users/doctor/'+id,
            headers: {'Accept':'application/json', 'Authorization': token}
        }).then(function successCallback(response) 
        {
           defer.resolve(response.data.data['doctor']);       
        }, 
        function errorCallback(response) 
        {

        });
        
          return defer.promise;

    }


    AuthService.registerUser = function(email, password, doctor)
    {
        var defer = $q.defer();
        $http({
                method: 'POST',
                url: '/bluepill/api/users/register',
                data: {'username': email, 'password':password, 'doctor':doctor},
                headers: {'Content-Type': 'application/json', 'Accept':'application/json'}
            }).then(function successCallback(response) 
            {
                defer.resolve(response.data); 

            }, 
            function errorCallback(response) 
            {

            });

            return defer.promise;
                 
    };


    AuthService.registerProfile = function(token, name, surname, birthdate, address, birthplace, sex, id_user)
    {
        var defer = $q.defer();
        $http({
                method: 'POST',
                url: '/bluepill/api/profiles',
                data: {
                        "name": name,
                        "surname": surname,
                        "birthdate": birthdate,
                        "address": address, 
                        "birthplace": birthplace,
                        "sex": sex,
                        "id_user": id_user
                      },
                headers: {
                            'Content-Type': 'application/json',
                            'Accept':'application/json',
                            'Authorization':token
                         }
            }).then(function successCallback(response) 
            {
                defer.resolve(response.data); 

            }, 
            function errorCallback(response) 
            {

            });

            return defer.promise;
    }



    AuthService.activatePillDispenser = function(token, pillcode, id_user)
    {
        var defer = $q.defer();
        $http({
                method: 'POST',
                url: '/bluepill/api/pilldispensers/activatepilldispenser/' + pillcode,
                data: {
                        "id_user": id_user
                      },
                headers: {
                            'Content-Type': 'application/json',
                            'Accept':'application/json',
                            'Authorization':token
                         }
            }).then(function successCallback(response) 
            {
                defer.resolve(response.data); 

            }, 
            function errorCallback(response) 
            {

            });

            return defer.promise;
    }


    return AuthService
});