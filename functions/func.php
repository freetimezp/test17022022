<?php

function getProducts() {
    global $pdo;
    $res = $pdo->query("SELECT * FROM content");
    return $res->fetchAll();
}

function getProduct($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM content WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_to_cart($product) {
    if(isset($_SESSION['cart'][$product['id']])) {
        $_SESSION['cart'][$product['id']]['qty'] += 1;
    }else{
        $_SESSION['cart'][$product['id']] = [
            'title' => $product['title'],
            'price' => $product['price'],
            'image' => $product['image'],
            'qty' => 1
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}

