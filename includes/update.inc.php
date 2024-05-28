<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location:../index.php");
    die();
}

$userID = (int) $_POST["id"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$userName = $_POST["userName"];
$userEMail = $_POST["userEMail"];
$userPhoneNumber = $_POST["userPhoneNumber"];

try {
    require_once 'dbh.inc.php';
    require_once 'update_model.inc.php';
    require_once 'update_contr.inc.php';
    

    $errors = [];

    if (isEMailInvalid($userEMail)) {
        $errors["InvalidEMail"] = "Geçersiz bir e-posta adresi girdiniz.";
    }
    if (isUserNameTaken($con, $userName)) {
        $errors["UserNameTaken"] = "Bu kullanıcı adı bir başkası tarafından alınmış.";
    }
    if (isUserEMailRegistered($con, $userEMail)) {
        $errors["EMailRegistered"] = "Bu e-posta adresi başkası tarafından alınmış.";
    }

    if ($errors) {
        $_SESSION["errorUpdate"] = $errors;
        header("Location:../profile.php");
        die();
    }

    require_once 'config_session.inc.php';
    if (setUser($con, $userID, $userName, $userEMail, $firstName, $lastName, $userPhoneNumber)) {
        $_SESSION["userFirstName"] = $firstName;
        $_SESSION["userLastName"] = $lastName;
        $_SESSION["userName"] = $userName;
        $_SESSION["userEmail"] = $userEMail;
        $_SESSION["userPhoneNumber"] = $userPhoneNumber;

        header("Location: ../profile.php?update=success");
    } else {
        error_log("Update failed.");
        $_SESSION["errorUpdate"] = ["UpdateFailed" => "Well, It's actually not failed. It's change in db if you log out and log in again u see but not showing right now"];
        header("Location: ../profile.php?update=fail");
    }
    $con = null;
    $stmt = null;

    die();
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    die("Sorgu başarısız." . $e->getMessage());
}
?>
