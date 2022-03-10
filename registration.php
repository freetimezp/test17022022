<?php
session_start();

$login = "";
$admin = 0;
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'testing17022022');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="reg-form">
    <h1>Registration</h1>
    <form class="c-form" action="" method="post" enctype="multipart/form-data">
        <label>enter login:</label>
        <input class="c-input" type="text" name="login" placeholder="<?php if($_POST['login']): ?><?=$_POST['login'];?><?php else: ?>Your login<?php endif; ?>">
        <br>
        <label>enter password:</label>
        <input class="c-input" type="text" name="pass" placeholder="<?php if($_POST['pass']): ?><?=$_POST['pass'];?><?php else: ?>Your password<?php endif; ?>">
        <br>
        <label>confirm password:</label>
        <input class="c-input" type="text" name="passconfirm" placeholder="<?php if($_POST['passconfirm']): ?><?=$_POST['passconfirm'];?><?php else: ?>Your confirm password<?php endif; ?>">
        <br>

        <input  class="btn btn-primary" type="submit" name="reg" value="adduser">
    </form>
</body>

</html>

<?php
if(isset($_POST['reg'])) {
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password_1 = mysqli_real_escape_string($db, $_POST['pass']);
    $password_2 = mysqli_real_escape_string($db, $_POST['passconfirm']);

    if (empty($login)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM users WHERE login='$login' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['login'] === $login) {
            array_push($errors, "Username already exists");
        }
    }

    if (count($errors) == 0) {
        //$password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (id, login, password, admin) 
  			  VALUES(NULL, '$login', '$password_1', $admin)";
        mysqli_query($db, $query);
        $_SESSION['login'] = $login;
        echo ('<meta HTTP-EQUIV="REFRESH" Content="0; URL=login.php">');
    }else {
        foreach ($errors as $item => $error) {
            echo $error . '<br>';
        }
    }
}
?>



