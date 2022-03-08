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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div  class="content">
    <h1>Edit content info</h1>
    <?php if (!empty($_SESSION['login'])): ?>

        <div class="content-block">
            <div class="content-title">
                <?= "Hello " . $_SESSION['login']; ?>
            </div>
            <a  class="content-logout" href="../logout.php">Logout</a>
            <a class="mainpagelink" href="/">Go to main page</a>
        </div>

        <div class="content-form-block">
            <?php while($res = $sql->fetch(PDO::FETCH_OBJ)): ?>
                <form class="c-form" action="editcontent.php/<?=$res->id;?>" method="post" enctype="multipart/form-data">
                    <p>id: <?=$res->id; ?></p>
                    <input class="c-input" type="text" name="title" value="<?= $res->title;?>">
                    <input class="c-input" type="text" name="price" value="<?= $res->price;?>">

                    <br>
                    <label for="file<?=$res->id;?>" class="custom-file-upload">
                        Choose image...
                    </label>
                    <input class="input file" id="file<?=$res->id;?>" type="file" name="image"/>
                    <br>

                    <img class="c-img" src="../img/<?=$res->image;?>"  alt="image">
                    <br>

                    <input  class="c-btn" type="submit" name="save" value="save">
                </form>
            <?php endwhile; ?>

            <div class="c-modal">
                <button class="myBtn">Add new content</button>

                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="c-close">&times;</span>
                        <div>
                            <form class="c-form" action="addcontent.php/<?=$res->id;?>" method="post" enctype="multipart/form-data">
                                <p>id: <?=$res->id; ?></p>
                                <label>enter title:</label>
                                <input class="c-input" type="text" name="title" value="<?= $res->title;?>">
                                <label>enter price:</label>
                                <input class="c-input" type="text" name="price" value="<?= $res->price;?>">

                                <br>
                                <label for="file" class="custom-file-upload">
                                    Choose image...
                                </label>
                                <input class="input file" id="file" type="file" name="image"/>
                                <br>

                                <img class="c-img" src="../img/<?=$res->image;?>"  alt="image">
                                <br>

                                <input  class="c-btn" type="submit" name="save" value="save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <?= '<a href="../login.php">You must auth! This link to login page.</a>'; ?>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.myBtn').on("click", function() {
            $('.modal').css('display', 'block');
        });

        $('.c-close').on("click", function() {
            $('.modal').css('display', 'none');
        });
    });
</script>

</body>

</html>

