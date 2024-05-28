<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/login_view.inc.php';
    require_once 'includes/update_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-container">
        <?php outputUser(); ?>
        <div class="buttons">
            <form action="includes/logout.inc.php" method="post">
                <button class="btn">Log Out</button> 
            </form>
            <form action="update.php" method="post">
                <button class="btn">Update Profile</button> 
            </form>
        </div>
        <div class="update-errors">
            <?php checkUpdateErrors(); ?>
        </div>
    </div>
</body>
</html>
