<?php

session_start();

require_once './functions/connect.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/functions/func.php';
require_once __DIR__ . '/functions/conf.php';

$sql = $pdo->prepare("SELECT * FROM header");
$sql->execute();
$res = $sql->fetch(PDO::FETCH_ASSOC);

$image = $res['image'];
$name = $res['name'];

require 'public/header.php';

//session_destroy();

?>

    <div class="intro-section" style="background-image: url('images/<?=$image;?>');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mx-auto text-center" data-aos="fade-up">
                    <h1><?=$name;?></h1>
                </div>
            </div>
        </div>
    </div>

<?php
require 'public/content.php';
require 'public/about.php';
require 'public/letter.php';
require 'public/slider.php';
require 'public/formv.php';
require 'public/footer.php';
?>