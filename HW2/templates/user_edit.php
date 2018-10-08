<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jaba Edit</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/signin.css" rel="stylesheet">
</head>
<body>

<form class="form-signin" novalidate action="/handle_user_edit.php?id=<?php echo $user->getId() ?>" method="post">
    <h1 class="h3 mb-3 font-weight-normal">User: <?php echo $user->getLogin() ?></h1>
    <input type="text" id="inputLogin" class="form-control mb-3" disabled placeholder="Login" name= "login" value="<?php echo $user->getLogin() ?>">
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" value="<?php echo $user->getEmail() ?>">
    <p class="mb-3 text-left"><?php echo !empty($errors["email"]) ? $errors["email"] : "" ?></p>
    <input type="text" id="inputName" class="form-control" placeholder="Name" name="name" value="<?php echo $user->getName() ?>">
    <p class="mb-3 text-left"><?php echo !empty($errors["name"]) ? $errors["name"] : "" ?></p>
    <input type="password" id="inputPass" class="form-control" placeholder="NEW Password" name="pass">
    <p class="mb-3 text-left"><?php echo !empty($errors["pass"]) ? $errors["pass"] : "" ?></p>
    <div class="form-group">
        <label for="inputState">Role</label>
        <select id="inputState" name="role"  class="form-control">
            <?php
            foreach ($roles as $role => $description) { ?>
                <option value="<?php echo $role ?>" <?php if ($role === $user->getRole()){ ?> selected<?php } ?>><?php echo $description ?></option><?php
            }
            ?>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">Turn on/off</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" name="active" value="1" <?php if ($user->isActive() === true){?> checked<?php } ?> type="checkbox" id="gridCheck1">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2018</p>
</form>
</body>
</html>