<?php

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
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function setUser($con, $userName, $userPassword, $userEMail, $firstName, $lastName, $userPhoneNumber){
    $query = "INSERT INTO Persons (FirstName, LastName, UserName, PhoneNumber, EMail, UserPassword) 
              VALUES (?,?,?,?,?,?)";

    $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);

    $stmt = $con -> prepare($query);
    $stmt -> execute([$firstName, $lastName, $userName, $userPhoneNumber, $userEMail, $hashedPassword]);
}