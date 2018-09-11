<?php
require "common.php";
$login = $_GET["login"];
$user=find($login);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jaba Edit</title>

    <!-- Bootstrap core CSS -->
    <link href="/HW2/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/HW2/assets/css/signin.css" rel="stylesheet">
</head>
<body>

<form class="form-signin" novalidate action="/HW2/edit_user.php">
    <h1 class="h3 mb-3 font-weight-normal">User: <?php echo $user["name"]?></h1>
    <input type="text" id="inputLogin" class="form-control"  placeholder="Login" value="<?php echo $user["login"] ?>">
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" value="<?php echo $user["email"] ?>">
    <input type="text" id="inputName" class="form-control" placeholder="Name" value="<?php echo $user["name"] ?>">
    <div class="form-group">
        <label for="inputState">Role</label>
        <select id="inputState" class="form-control">
            <?php
            foreach ($roles as $role => $description) {
                    ?>
                    <option<?php if ($role === $user["role"]){ ?> selected<?php } ?>><?php echo $description ?></option><?php
            }
                ?>
        </select>
    </div>
    <div class="form-group row">
    <div class="col-sm-2">Turn on/off</div>
    <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" checked type="checkbox" id="gridCheck1">
        </div>
    </div>
    </div>
    <div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2018</p>
</form>
</body>
</html>