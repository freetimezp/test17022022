<?php
require_once './functions/connect.php';

$data = $pdo->prepare("SELECT * FROM content");
$data->execute();
$res = $data->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">

                <h3 style="color: black">Products</h3>
            </div>
        </div>
        <div class="row">

            <?php foreach ($res as $key => $item): ?>
                <div class="col-lg-3 col-md-6 mb-lg-0">
                    <div class="person">
                        <figure>
                            <img src="img/<?=$item['image'];?>" alt="Image" class="img-fluid content-img">
                        </figure>
                        <div class="person-contents">
                            <h3><?=$item['title'];?></h3>
                            <span style="color: red;font-weight: bold"><?=$item['price'];?></span>
                        </div>
                        <?php if($_SESSION['login']): ?>
                            <a href="../public/addtocart.php?id=<?=$item['id'];?>" class="addtocart">
                                Add to cart
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
