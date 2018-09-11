<?php
require "common.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/HW2/assets/images/frog.gif">

    <title>Jaba user list</title>

    <!-- Bootstrap core CSS -->
    <link href="/HW2/assets/css/bootstrap.css" rel="stylesheet">


</head>
<body>
<?php
$big_boy=parse();
foreach ($big_boy as $value){?>

    <a href="edit_user.php?login=<?php echo $value["login"]?>" class="h3 mb-3 font-weight-normal"><?php echo "User: {$value['name']}\n";?></a><?php
}
?>

<p class="mt-5 mb-3 text-muted text-center">&copy; 2018</p>
</body>
</html>