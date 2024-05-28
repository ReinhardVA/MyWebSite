<?php

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

function setUser($con, $userID, $userName, $userEMail, $firstName, $lastName, $userPhoneNumber){
    updateUser($con, $userID, $userName, $userEMail, $firstName, $lastName, $userPhoneNumber);
}