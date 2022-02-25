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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="about">
    <h1>Edit about info</h1>
    <?php if (!empty($_SESSION['login'])): ?>

        <div class="about-block">
            <div class="about-title">
                <?= "Hello " . $_SESSION['login']; ?>
            </div>
            <a class="about-logout" href="../logout.php">Logout</a>
        </div>

        <form class="c-form" action="editabout.php" method="post" enctype="multipart/form-data">
            <input class="c-input" type="text" name="title" value="<?= $res->title; ?>">
            <input class="c-input" type="text" name="description" value="<?= $res->description; ?>">
            <br>

            <label for="file" class="custom-file-upload">
                Choose image...
            </label>
            <input class="c-input file" id="file" type="file" name="image"/>

            <br>
            <img class="c-img" src="../images/<?=$res->image?>"  alt="image">
            <br>
            <input class="c-btn" type="submit" name="save" value="save">
        </form>


    <?php else: ?>
        <?= '<a href="login.php">You must auth! This link to login page.</a>'; ?>
    <?php endif; ?>
</div>
</body>

</html>
