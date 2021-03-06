<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/frog.gif">
    <title>Jaba user list</title>
    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
</head>
<body >

<div class="container">
    <!-- Content here -->
    <h1 class="text-center m-5" >USER LIST</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Login</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($userList as $user) { ?>
            <tr>

                <td><a href="user_edit.php?id=<?php echo $user->getId() ?>"><?php echo $user->getLogin() ?></a></td>
                <td><?php echo $user->getName() ?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
    <p class="text-center"><a href="/logout.php" type="submit" class="btn btn-primary">Logout</a></p>
</div>
<p class="mt-5 mb-3 text-muted text-center">&copy; 2018</p>
</body>
</html>