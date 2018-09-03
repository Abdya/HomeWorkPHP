<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .colo{
            color: coral;
        }
    </style>
</head>
<body>
<form action="HW2.php" method="post" enctype="multipart/form-data">
    Login: <input type="text" name="enter_login" /><br>
    Password: <input type="text" name="enter_pass" /><br>
    <input type="submit" value="PushPush"/><br>
    <?php
    echo equal();
    ?>
</form>
</body>
</html>