<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "testing17022022";

$conn = new mysqli($host, $user, $password, $db);

$msg = '';

if(isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $path = "img/slider/" . $image;

    $sql = $conn->query("INSERT INTO slider (image_path) VALUES ('$path')");
    //exit();

    if($sql) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $msg = 'Image uploaded success';
    }else{
        $msg = 'error';
    }
}

$result = $conn->query("SELECT image_path FROM slider");

?>

<div id="slider">
    <h2 class="text-center bg-dark text-light mb-2">Slider</h2>
    <div class="row">
        <div class="col-lg-12 mb-4 mt-4">
            <div id="slider-demo" class="carousel slide" data-bs-ride="carousel">

                <ul class="carousel-indicators">
                    <?php
                        $i = 0;
                        foreach ($result as $row) {
                            $actives = '';
                            if($i == 0) {
                                $actives = 'active';
                            }
                    ?>
                    <li data-bs-target="#slider-demo" data-bs-slide-to="<?=$i;?>" class="<?=$actives;?>"></li>
                    <?php $i++; } ?>
                </ul>

                <div class="carousel-inner" style="background: #000">
                    <?php
                        $i = 0;
                        foreach ($result as $row) {
                            $actives = '';
                            if($i == 0) {
                                $actives = 'active';
                            }
                    ?>
                    <div class="carousel-item <?=$actives;?>">
                        <img src="<?=$row['image_path'];?>" width="100%" height="800">
                    </div>
                    <?php $i++; } ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#slider-demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Prev</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#slider-demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4 bg-dark rounded">
            <h4 class="text-center text-light p-1 mt-2">Select image to upload!</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="image" class="form-control mb-4" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="upload" class="btn btn-warning btn-block mb-2" value="UPLOAD IMAGE">
                </div>
                <div class="form-group pt-2 pb-2">
                    <h5 class="text-center text-light">
                        <?=$msg;?>
                    </h5>
                </div>
            </form>
        </div>
    </div>
</div>
