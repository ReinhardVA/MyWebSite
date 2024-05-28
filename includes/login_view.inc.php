<?php

function checkLoginErrors(){
    if(isset($_SESSION["errorsLogin"])){
        $errors = $_SESSION["errorsLogin"];

        echo "<br>";

        echo '<div class="error-container">';
        foreach ($errors as $error) {
            echo '<p class="error-message">'.$error.'</p>';
        }
        echo '</div>';

        unset($_SESSION["errorsLogin"]);
    }
    else if(isset($_GET['login']) && $_GET['login'] === "success"){
        echo "<br>";
        echo "<p>Login Success!</p>";
    }
}

function outputUser(){
    if(isset($_SESSION["userID"])) {
        echo '<div class="user-info">';
        echo '<p><span class="info-label">User ID:</span> ' . $_SESSION["userID"] . '</p>';
        echo '<p><span class="info-label">Username:</span> ' . $_SESSION["userUserName"] . '</p>';
        echo '<p><span class="info-label">First Name:</span> ' . $_SESSION["userFirstName"] . '</p>';
        echo '<p><span class="info-label">Last Name:</span> ' . $_SESSION["userLastName"] . '</p>';
        echo '<p><span class="info-label">E-Mail:</span> ' . $_SESSION["userEMail"] . '</p>';
        echo '<p><span class="info-label">Phone Number:</span> ' . $_SESSION["userPhoneNumber"] . '</p>';
        echo '</div>';
    } else {
        echo '<p class="not-logged-in">You are not logged in</p>';
    }
}
/*
    Eğer bu yorumu görüyorsanız anlamadığım bir sorun hakkında yazacağım. LocalHost'ta login.inc.php dosyasındaki
    sessionları bu dosyaya aktarıp localhost'ta çıktı alabiliyorum. Lakin infinityfree'den almış olduğum hosting'de
    bu çalışmıyor. Session'ları test ettim yani aynı dosyada veriyi tutuyorlar ancak login_view.inc.php dosyasına
    bu veri aktarılmıyor. Sorun üzerine saatlerdir düşünüyorum ancak bir yere varamadım. Eğer zamanınızı ayırıp
    yardımcı olmak isterseniz mail adresim: eren_kankilinc@icloud.com
*/
