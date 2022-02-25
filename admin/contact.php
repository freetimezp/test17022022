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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div  class="contact">
    <h1>Edit contact info</h1>
    <?php if (!empty($_SESSION['login'])): ?>

        <div class="contact-block">
            <div class="contact-title"><?= "Hello " . $_SESSION['login']; ?></div>
            <a class="contact-logout" href="../logout.php">Logout</a>
        </div>

        <form class="c-form" action="editcontact.php" method="post">
            <input class="c-input" type="text" name="city" value="<?= $res->city; ?>">
            <input class="c-input" type="text" name="phone" value="<?= $res->phone; ?>">
            <input class="c-input" type="text" name="email" value="<?= $res->email; ?>">
            <br>
            <input  class="c-btn"  type="submit" value="save">
        </form>

    <?php else: ?>

        <?= '<a href="login.php">You must auth! This link to login page.</a>'; ?>

    <?php endif; ?>
</div>
</body>

</html>