<?php

function getUser($con, $userName){
    $query = "SELECT * FROM persons WHERE UserName=:userName";

    $stmt = $con -> prepare($query);
    $stmt -> bindParam(":userName",$userName);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}

