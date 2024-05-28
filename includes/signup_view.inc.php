<?php

function checkSignupErrors(){
    if(isset($_SESSION["errorSignup"])){
       $errors = $_SESSION["errorSignup"];
       
        echo "<br>";

        echo '<div class="error-container">';
        foreach ($errors as $error) {
            echo '<p class="error-message">'.$error.'</p>';
        }
        echo '</div>';

       unset($_SESSION["errorSignup"]);
    }
    else if(isset($_GET["signup"]) && $_GET["signup"]==="success"){
        echo "<br>";
        echo "<p>Sign Up Success!</p>";
    }
    
}
