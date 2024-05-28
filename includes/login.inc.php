<?php

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location:../index.php");
    die();
}

$userName = $_POST["userName"];
$userPassword = $_POST["userPassword"];

try {
    require_once "dbh.inc.php";
    require_once "login_model.inc.php";
    require_once "login_contr.inc.php";

    $errors = [];

    if(isInputEmpty($userName, $userPassword)){
        $errors["emptyInput"] = "Boş alanları doldurunuz";
    }
    
    $result = getUser($con, $userName);

    if(isUsernameWrong($result)){
        $errors["loginIncorrect"] = "Hatalı giriş bilgisi.";
    }
    if(!isUsernameWrong($result) && isUserpasswordWrong($userPassword,$result["UserPassword"])){
        $errors["loginIncorrect"] = "Hatalı giriş bilgisi.";
    }


    require_once 'config_session.inc.php';

    if($errors){
        $_SESSION["errorsLogin"] = $errors;
        header("Location:../login.php");
        die();
    } 

    $_SESSION["userID"] = $result["PersonID"];
    $_SESSION["userUserName"] = $result["UserName"];
    $_SESSION["userFirstName"] = $result["FirstName"];
    $_SESSION["userLastName"] = $result["LastName"];
    $_SESSION["userEMail"] = $result["EMail"];
    $_SESSION["userPhoneNumber"] = $result["PhoneNumber"];

    header("Location: ../profile.php?login=success");

    $con = null;
    $stmt = null;
    die();

} catch (PDOException $e) {
    die("Sorgu Başarısız.".$e->getMessage());
}