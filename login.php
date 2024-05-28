<?php
   require_once 'includes/config_session.inc.php'; 
   require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LogIn.css">
    <title>Document</title>
</head>
<body>
    <div class=form>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="userName" placeholder="Username">
            <input type="password" name="userPassword" placeholder="Password">
            <button>Log In</button> 
        </form>
    </div>
    
    <?php
        checkLoginErrors();
    ?>
</body>
</html>