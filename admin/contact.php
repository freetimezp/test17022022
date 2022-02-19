<?php
session_start();
require_once '../functions/connect.php';

$sql = $pdo->prepare("SELECT * FROM contact");
$sql->execute();
$res = $sql->fetch(PDO::FETCH_OBJ);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
</head>
<body>
<div>
    <h1>Edit contact info</h1>
    <?php if (!empty($_SESSION['login'])): ?>

        <?= "Hello " . $_SESSION['login']; ?>

        <div>
            <a href="../logout.php">Logout</a>
        </div>
        <form action="editcontact.php" method="post">
            <input type="text" name="city" value="<?= $res->city; ?>">
            <input type="text" name="phone" value="<?= $res->phone; ?>">
            <input type="text" name="email" value="<?= $res->email; ?>">
            <br>
            <input type="submit" value="save">
        </form>


    <?php else: ?>
        <?= '<a href="login.php">You must auth! This link to login page.</a>'; ?>
    <?php endif; ?>
</div>
</body>

</html>