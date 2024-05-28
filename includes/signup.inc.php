<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    die();
}

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$userName = $_POST["userName"];
$userPassword = $_POST["userPassword"];
$userEMail = $_POST["userEMail"];
$userPhoneNumber = $_POST["userPhoneNumber"];

try {
    require_once 'dbh.inc.php';
    require_once 'signup_model.inc.php';
    require_once 'signup_contr.inc.php';

    $errors = [];
    
    if(isInputEmpty($userName, $userPassword, $userEMail, $firstName, $lastName, $userPhoneNumber)){
        $errors["emptyInput"] = "Tüm boş alanları doldurunuz";
    }
    if(isEMailInvalid($userEMail)){
        $errors["InvalidEMail"] = "Geçersiz bir e-posta adresi girdiniz.";
    }
    if(isUserNameTaken($con, $userName)){
        $errors["UserNameTaken"] = "Bu kullanıcı adı bir başkası tarafından alınmış.";
    }
    if(isUserEMailRegistered($con, $userEMail)){
        $errors["EMailRegistered"] = "Bu e-posta adresi başkası tarafından alınmış.";
    }

    require_once 'config_session.inc.php';

    if($errors){//veri varsa true, yoksa false döndürür
        $_SESSION["errorSignup"] = $errors;
        header("Location:../signUp.php");
        die();
    }

    createUser($con, $userName, $userPassword, $userEMail, $firstName, $lastName, $userPhoneNumber);

    header("Location: ../index.php?signup=success");

    $con = null;
    $stmt = null;

    die();
} catch (PDOException $e) {
    die("Sorgu başarısız.".$e->getMessage());
}
