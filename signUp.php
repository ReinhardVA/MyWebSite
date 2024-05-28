<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SignUp.css">
    <title>Document</title>
</head>
<body>
  
    <div class="form">
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="firstName" placeholder="First Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="text" name="userName" placeholder="Username">
            <input type="password" name="userPassword" placeholder="Password">
            <input type="email" name="userEMail" placeholder="E-Mail">
            <input type="tel" name="userPhoneNumber" pattern="0\d{3}\d{3}\d{4}" 
                placeholder="0___-___-____" title="Phone number should match 0XXX-XXX-XXXX">
            <button>Sign Up</button>
        </form>
    </div>
    <?php
        checkSignupErrors();
    ?>
</body>
</html>