<?php

function isInputEmpty($userName, $userPassword, $userEMail, $firstName, $lastName, $userPhoneNumber ){
    
    if( empty($userName)     || 
        empty($userPassword) || 
        empty($userEMail)    || 
        empty($firstName)    ||
        empty($lastName)     ||
        empty($userPhoneNumber)){
            return true;
        } else{
            return false;
        }
}

function isEMailInvalid($userEMail){
    if(!filter_var($userEMail, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function isUserNameTaken($con, $userName){
    if(getUserName($con, $userName)){
        return true;
    }
    else{
        return false;
    }
}

function isUserEMailRegistered($con, $userEMail){
    if(getUserEMail($con, $userEMail)){
        return true;
    }
    else{
        return false;
    }
}


function createUser($con, $userName, $userPassword, $userEMail, $firstName, $lastName, $userPhoneNumber){
    setUser($con, $userName, $userPassword, $userEMail, $firstName, $lastName, $userPhoneNumber);
}