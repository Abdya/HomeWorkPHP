
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/cat.gif">

    <title>Jaba sign up</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="post">
    <img class="mb-4" src="/assets/images/cat.gif" alt="" width="200" height="200">
    <h1 class="h3 mb-3 font-weight-normal">Welcome</h1>
    <h1 class="h3 mb-3 font-weight-normal">create account</h1>
    <?php
    create();
    ?>
    <input type="text" id="inputLogin" class="form-control"  placeholder="Login" value="<?php echo !empty($_POST['enter_login']) ? $_POST['enter_login'] : "" ?>" required autofocus name="enter_login">
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="enter_pass">
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" value="<?php echo !empty($_POST['enter_email']) ? $_POST['enter_email'] : "" ?>" required name="enter_email">
    <input type="text" id="inputName" class="form-control" placeholder="Name" value="<?php echo !empty($_POST['enter_name']) ? $_POST['enter_name'] : "" ?>" required name="enter_name">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
</form>
</body>
</html>
