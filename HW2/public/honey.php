<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/jaba.gif">

    <title>Jaba Klava</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" novalidate action="/index.php" method="post">
    <img class="mb-4" src="/assets/images/jaba.gif" alt="" width="148" height="114">
    <h1 class="h3 mb-3 font-weight-normal">Welcome</h1>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in or create account</h1>
    <?php
    if ($error){?>
        <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php    }?>

    <input type="text" id="inputLogin" class="form-control mb-3"  placeholder="Login" required autofocus name="enter_login">
    <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required name="enter_password">
    <div class="form-check mb-3 text-left">
        <input class="form-check-input" type="checkbox" name="remember" value="1" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a href="/logic_signup.php" id="btn" class="btn btn-lg btn-success btn-block mb-3" type="button">Sign up</a>
    <a href="/password_reset_logic.php">Forget password?</a>

    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
</form>
</body>
</html>
