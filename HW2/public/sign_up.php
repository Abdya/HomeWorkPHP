
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
    $errors = create();
    ?>
    <input type="text" id="inputLogin" class="form-control"  placeholder="Login" value="<?php echo !empty($_POST['login']) ? $_POST['login'] : "" ?>" required autofocus name="login">
    <p class="mb-3 text-left"><?php echo !empty($errors["login"]) ? $errors["login"] : "" ?></p>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="pass">
    <p class="mb-3 text-left"><?php echo !empty($errors["pass"]) ? $errors["pass"] : "" ?></p>
    <input type="text" id="inputEmail" class="form-control" placeholder="Email" value="<?php echo !empty($_POST['email']) ? $_POST['email'] : "" ?>" required name="email">
    <p class="mb-3 text-left"><?php echo !empty($errors["email"]) ? $errors["email"] : "" ?></p>
    <input type="text" id="inputName" class="form-control" placeholder="Name" value="<?php echo !empty($_POST['name']) ? $_POST['name'] : "" ?>" required name="name">
    <p class="mb-3 text-left"><?php echo !empty($errors["name"]) ? $errors["name"] : "" ?></p>
    <button class="btn btn-lg btn-primary btn-block mb-5" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
</form>
</body>
</html>
