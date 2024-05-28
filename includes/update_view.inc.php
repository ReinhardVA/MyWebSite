<?php
function checkUpdateErrors(){
    if(isset($_SESSION["errorUpdate"])){
       $errors = $_SESSION["errorUpdate"];
       
        echo "<br>";

        foreach ($errors as $error) {
            echo "<p>".$error."</p>";
        }

       unset($_SESSION["errorUpdate"]);
    }
    else if(isset($_GET["update"]) && $_GET["update"]==="success"){
        echo "<br>";
        echo "<p>Update Success!</p>";
    }
    
}