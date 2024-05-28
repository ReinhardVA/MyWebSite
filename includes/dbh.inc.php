<?php

$host = 'localhost';
$dbName = 'php_project';
$dbUserName = 'root';
$dbPassword = '';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbName", $dbUserName, $dbPassword);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch  (PDOException $e) {
    die("Connection failed: ". $e -> getMessage());
}