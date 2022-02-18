<?php

require_once './functions/connect.php';

$about = $pdo->prepare("SELECT * FROM about");
$about->execute();
$res = $about->fetch(PDO::FETCH_OBJ);

?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/<?=$res->image;?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">

                <h3 style="color: black"><?=$res->title;?></h3>
                <p><?=$res->description;?></p>
                <p><?=$res->description;?></p>

            </div>
        </div>
    </div>
</div>