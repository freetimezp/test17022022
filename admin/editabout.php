<?php
require_once '../functions/connect.php';

$sql = $pdo->prepare("SELECT * FROM about");
$sql->execute();
$res = $sql->fetch(PDO::FETCH_OBJ);

if(isset($_POST['save'])) {
    $list = [".php", ".zip", ".js", ".html", ".rar"];
    foreach ($list as $item) {
        if(preg_match("/$item$/", $_FILES['image']['name'])) {
            exit("Choose another file please.");
        }
    }

    $type = getimagesize($_FILES['image']['tmp_name']);
    if($type && ($type['mime'] === 'image/png' || $type['mime'] === 'image/ipg' || $type['mime'] === 'image/jpeg')) {
        if($_FILES['image']['size'] < 1240 * 1000) {
            $upload = '../img/' . $_FILES['image']['name'];

            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {
                echo "File upload success";
            }else{
                echo "Error upload file";
            }
        }else{
            exit("Very large file. Choose another..");
        }
    }else{
        exit("Type of file not right");
    }
}

$id = $res->id;
$title = $_POST['title'];
$description = $_POST['description'];
$image = '../img/' . $_FILES['image']['name'];

$row = "UPDATE about SET title=:title, description=:description, image=:image WHERE id=:id";
$query = $pdo->prepare($row);
$query->execute(["id" => $id, "title" => $title, "description" => $description, "image" => $image]);

echo ('<meta HTTP-EQUIV="REFRESH" Content="0; URL=about.php">');

?>
