<?php

function updateUser($con, $userID, $userName, $userEMail, $firstName, $lastName, $userPhoneNumber){
    $query = "UPDATE persons 
              SET FirstName = :firstName, LastName = :lastName, UserName  = :newUserName, PhoneNumber = :phoneNumber, EMail = :eMail
              WHERE PersonID = :id;";

    $stmt = $con -> prepare($query);
    $stmt->bindParam(":id",$userID);
    $stmt->bindParam(":firstName",$firstName);
    $stmt->bindParam(":lastName",$lastName);
    $stmt->bindParam(":newUserName",$userName);
    $stmt->bindParam(":phoneNumber",$userPhoneNumber);
    $stmt->bindParam(":eMail",$userEMail);
    
    if ($stmt->execute()) {
        return true;
    } else {
        $errorInfo = $stmt->errorInfo();
        error_log("Update failed: " . print_r($errorInfo, true));
        return false;
    }
}

function getUserName($con, $userName){
    $query = "SELECT UserName FROM persons WHERE UserName = :userName;";

    $stmt = $con->prepare($query);
    $stmt->bindParam(":userName", $userName);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getUserEMail($con, $userEMail){
    $query = "SELECT EMail FROM persons WHERE EMail = :userEMail;";
    $stmt = $con->prepare($query);
    $stmt -> bindParam(":userEMail", $userEMail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}