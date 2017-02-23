'use strict';

angular.module('register', []).
    component('register',
    {
    templateUrl: '/redpill/templates/register.html',
    controller:
    function ($scope, AuthService, Flash, $location)
    {
        
        $scope.step = 1; 
        $scope.user = {};
        $scope.doctor = false;//default checked option

        /*per completezza dovrebbe controllare se mail è già esistente pero sti cazzi*/
        $scope.registerStepOne = function(email, password, password_confirm, doctor)
        {
            console.log(doctor)
            if(password==password_confirm && password && email && password_confirm && doctor!=null) 
            {
               
               AuthService.registerUser(email, password, doctor)
                .then(function(response)
                    {
                        if(response.success)
                        {
                            $scope.user = response.data;
                            $scope.step += 1;
                        }
                        else
                        {
                            Flash.create('danger', "<strong>ERRORE!</strong> c'è stato un errore nel registrare i tuoi dati");
                        }
                    });
 
            }else
            {
               if(password!=password_confirm)
                    Flash.create('danger', '<strong>ERRORE!</strong> la password confermata non corrisponde');
               if(!password || !password_confirm || !email || doctor!=null) 
                    Flash.create('danger', '<strong>ERRORE!</strong>ci sono dei campi vuoti');
            }
        } 



        $scope.registerStepTwo = function(name, surname, birthdate, address, birthplace, sex)
        {
            if(allFieldsFull(name, surname, birthdate, address, birthplace, sex))
            {
                AuthService.registerProfile
                ($scope.user.token, name, surname, birthdate.year + "-" +birthdate.month + "-" + birthdate.day, address, birthplace, sex, $scope.user.id)
                .then(function(response)
                {
                    if(response.success)
                        $scope.step+=1;
                    else
                    {
                        Flash.create('danger', "<strong>ERRORE!</strong> c'è stato un errore nel registrare i tuoi dati");                        
                    }
                })
            }
            else
            {
                Flash.create('danger', '<strong>ERRORE!</strong> ci sono uno o più campi vuoti');
            }
        }


        var allFieldsFull = function(name, surname, birthdate, address, birthplace, sex)
        {
                return name!=null&&surname!=null&&birthdate!=null&&address!=null&&birthplace!=null&&sex!=null;
        }

//impostare mess di errore come ricevuti da server|||   
        $scope.registerStepThree = function(pillcode)
        {
            if(pillcode != null)
            {
                AuthService.activatePillDispenser
                ($scope.user.token, pillcode, $scope.user.id)
                .then(function(response)
                {
                    if(response.success)
                    {    
                        $scope.step+=1;
                    }
                    else
                    {
                        Flash.create('danger', "<strong>ERRORE!</strong> c'è stato un errore nel registrare i tuoi dati");                        
                    }
                })
            }
            else
            {
                Flash.create('danger', '<strong>ERRORE!</strong> ci sono uno o più campi vuoti');
            }
            
        }


        $scope.registerStepFour = function()
        {
            $location.path('/login').replace();
        }


    }
});

