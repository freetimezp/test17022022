<?php
session_start();
require_once '../functions/connect.php';

$sql = $pdo->prepare("SELECT * FROM content");
$sql->execute();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
</head>
<body>
<div>
    <h1>Edit content info</h1>
    <?php if (!empty($_SESSION['login'])): ?>

        <?= "Hello " . $_SESSION['login']; ?>

        <div>
            <a href="../logout.php">Logout</a>
        </div>

    <?php while($res = $sql->fetch(PDO::FETCH_OBJ)): ?>
        <form action="editcontent.php/<?=$res->id; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?=$res->id; ?>">
            <input type="text" name="title" value="<?= $res->title; ?>">
            <input type="text" name="price" value="<?= $res->price; ?>">
            <br>
            <input type="file" name="image">
            <br>
            <img src="../img/<?=$res->image?>"  alt="image">
            <br>
            <input type="submit" name="save" value="save">
        </form>
    <?php endwhile; ?>

    <?php else: ?>
        <?= '<a href="../login.php">You must auth! This link to login page.</a>'; ?>
    <?php endif; ?>
</div>
</body>

</html>

