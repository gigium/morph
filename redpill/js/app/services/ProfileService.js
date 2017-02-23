morpheus.factory('ProfileService', function ($http, $q) {

    var ProfileService  = {};


    ProfileService.getBasicInfo = function(id ,token)
    {
    	var defer = $q.defer();
        $http({
            method: 'GET',
            url: '/bluepill/api/profiles/basicinfo/'+id,
            headers: {'Accept':'application/json', 'Authorization': token}
        }).then(function successCallback(response) 
        {
           defer.resolve(response.data);       
        }, 
        function errorCallback(response) 
        {

        });
        
        return defer.promise;
    }


	return ProfileService;

});