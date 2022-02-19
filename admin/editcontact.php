<?php
require_once '../functions/connect.php';

$sql = $pdo->prepare("SELECT * FROM contact");
$sql->execute();
$res = $sql->fetch(PDO::FETCH_OBJ);

$id = $res->id;
$city = $_POST['city'];
$phone = $_POST['phone'];
$email= $_POST['email'];

$row = "UPDATE contact SET city=:city, phone=:phone, email=:email WHERE id=:id";
$query = $pdo->prepare($row);
$query->execute(["id" => $id, "city" => $city, "phone" => $phone, "email" => $email]);

echo ('<meta HTTP-EQUIV="REFRESH" Content="0; URL=contact.php">');

?>