<?php
    require_once 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div class="form-container">
        <h2>Update Profile</h2>
        <form action="includes/update.inc.php" method="post">
            <input type="text" name="id" placeholder="User ID">
            <input type="text" name="firstName" placeholder="First Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="text" name="userName" placeholder="Username">
            <input type="email" name="userEMail" placeholder="E-Mail">
            <input type="tel" name="userPhoneNumber" pattern="0\d{3}\d{3}\d{4}" 
                placeholder="0___-___-____" title="Phone number should match 0XXX-XXX-XXXX">
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
