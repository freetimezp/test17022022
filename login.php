<?php

session_start();

require_once './functions/connect.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/functions/func.php';
require_once __DIR__ . '/functions/conf.php';

    if(isset($_POST['recovery'])) {
        recover();
        header("Location: login.php");
        die;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="loginsection">
        <div class="login">
            <h2>
                Login to site or admin panel
            </h2>

            <form action="admin/admin.php" method="post">
                <div class="form-group">
                    <input type="text" name="login" placeholder="Enter login">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary">Enter</button>
            </form>
        </div>

        <div class="recovery">
            <h2>Recovery password</h2>
            <form class="row" method="post">
                <div>
                    <input type="text" name="email" class="form-control" id="#emailRecovery" placeholder="mail@ukraine.ua">
                    <?php if($_SESSION['error']): ?>
                        <p><?=$_SESSION['error'];?></p>
                        <? unset($_SESSION['error']); ?>
                    <?php else: ?>
                        <p></p>
                    <?php endif;?>
                    <?php if($_SESSION['success']): ?>
                        <p><?=$_SESSION['success'];?></p>
                        <? unset($_SESSION['success']); ?>
                    <?php else: ?>
                        <p></p>
                    <?php endif;?>
                </div>
                <div>
                    <button type="submit" name="recovery" class="btn btn-primary">Recovery</button>
                </div>
            </form>
        </div>

        <div class="registration">
            <h2>Create new user</h2>

            <form class="c-form" action="registration.php" method="post">
                <input  class="btn btn-primary" type="submit" name="registration" value="registration">
            </form>

        </div>
    </div>
</body>

</html>



