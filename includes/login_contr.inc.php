<?php

    function isInputEmpty($userName, $userPassword){
        if(empty($userName) || empty($userPassword)){
            return true;
        }
        else{
            return false;
        }
    }

    function isUsernameWrong(bool|array $result){
        if(!$result){
            return true;
        }
        else{
            return false;
        }
    }

    function isUserpasswordWrong($userPassword, $hashedPassword){
        if(!password_verify($userPassword, $hashedPassword)){
            return true;
        }
        else{
            return false;
        }
    }