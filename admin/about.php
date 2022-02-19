<?php
session_start();
require_once '../functions/connect.php';

$sql = $pdo->prepare("SELECT * FROM about");
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
    <h1>Edit about info</h1>
    <?php if (!empty($_SESSION['login'])): ?>

        <?= "Hello " . $_SESSION['login']; ?>

        <div>
            <a href="../logout.php">Logout</a>
        </div>
        <form action="editabout.php" method="post" enctype="multipart/form-data">
            <input type="text" name="title" value="<?= $res->title; ?>">
            <input type="text" name="description" value="<?= $res->description; ?>">
            <br>
            <input type="file" name="image">
            <br>
            <img src="../images/<?=$res->image?>"  alt="image">
            <br>
            <input type="submit" name="save" value="save">
        </form>


    <?php else: ?>
        <?= '<a href="login.php">You must auth! This link to login page.</a>'; ?>
    <?php endif; ?>
</div>
</body>

</html>
