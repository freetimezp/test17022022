<?php

require_once '../functions/connect.php';
session_start();


$login = $_POST['login'];
$password = $_POST['password'];

$sql = $pdo->prepare("SELECT id, login FROM users WHERE login=:login AND password=:password");
$sql->execute(array('login' => $login, 'password' => $password));
$array = $sql->fetch(PDO::FETCH_ASSOC);

//print_r($array);

if($array['id'] > 0) {
    $_SESSION['login'] = $array['login'];
    header('location: http://test17022022/admin.php');
}else{
    header('location: http://test17022022/login.php');
}