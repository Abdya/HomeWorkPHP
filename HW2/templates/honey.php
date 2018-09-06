<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/HW2/assets/images/jaba.gif">

    <title>Jaba Klava</title>

    <!-- Bootstrap core CSS -->
    <link href="/HW2/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/HW2/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" novalidate action="/HW2/index.php" method="post">
    <img class="mb-4" src="/HW2/assets/images/jaba.gif" alt="" width="148" height="114">
    <h1 class="h3 mb-3 font-weight-normal">Welcome</h1>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in or create account</h1>
    <?php
    printik();
    ?>
    <input type="text" id="inputLogin" class="form-control"  placeholder="Login" required autofocus name="enter_login">
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="enter_pass">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <!--<button class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location='test.local/HW2/users/sign_up.php'">Sign up</button>-->
    <input class="btn btn-lg btn-primary btn-block">
    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
</form>
</body>
</html>
