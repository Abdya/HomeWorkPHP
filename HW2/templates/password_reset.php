<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/jaba.gif">

    <title>Jaba Reset</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" novalidate action="/handle_password_reset.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Welcome</h1>
    <h1 class="h3 mb-3 font-weight-normal">Please enter your login</h1>
    <input type="text" id="inputEmail" class="form-control mb-3"  placeholder="Login" required autofocus name="login">
    <p class="mb-3 text-left"><?php echo !empty($error["login"]) ? $error["login"] : "" ?></p>
    <button class="btn btn-lg btn-success btn-block mb-3" type="submit">Reset password</button>
    <?php if (!empty($_SESSION["password_reset"])):?><p class="text-center">Email will be sent if account with entered login exist</p><?php endif;