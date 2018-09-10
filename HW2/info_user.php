<?php
require "common.php";
$login = $_GET["login"];
$user = find($login);
if ($user === null){
    header('Location: /HW2/index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/HW2/assets/images/cat.gif">

    <title>Jaba info</title>

    <!-- Bootstrap core CSS -->
    <link href="/HW2/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/HW2/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="post">
    <img class="mb-4" src="/HW2/assets/images/cat.gif" alt="" width="200" height="200">
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Ваше имечко: <?php echo $user["name"]?></li>
            <li class="list-group-item">Ваш логинчик: <?php echo $user["login"]?></li>
            <li class="list-group-item">Ваше мыльце: <?php echo $user["email"]?></li>
        </ul>
    </div>


    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
</form>
</body>
</html>
