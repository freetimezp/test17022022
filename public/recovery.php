<?php

session_start();

require_once '../functions/connect.php';
require_once '../vendor/autoload.php';
require_once '../functions/func.php';
require_once '../functions/conf.php';

if(isset($_POST['new_pass'])) {
    //save new pass
    generate_new_pass();
    header("Location: ../login.php");
    die;
}elseif(!empty($_GET['key'])){
    //check access new pass
    if(!check_access_new_pass()) {
        header("Location: ../login.php");
        die;
    }
}else{
    header("Location: ../login.php");
    die;
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recovery password</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="loginsection">
    <div class="recovery-block">
        <h2>
            Recovery password
        </h2>
        <div class="recovery-massage">
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

        <h3>
            Enter new password
        </h3>

        <form method="post">
            <div class="form-group">
                <input type="text" name="password" class="form-control" id="passRecovery" placeholder="password">
                <label class="requiredPass" for="passRecovery">Password</label>
            </div>
            <div>
                <input type="hidden" name="hash" value="<?=$_GET['key'];?>">
                <button type="submit" name="new_pass" class="btn btn-primary">Change password</button>
            </div>

        </form>
    </div>
</div>
</body>

</html>




