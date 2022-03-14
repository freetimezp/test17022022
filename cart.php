<?php

//error_reporting(-1);

session_start();
require_once 'functions/connect.php';
require_once 'functions/func.php';

If(isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product = getProduct($id);
            if(!$product) {
                echo json_encode(['code' => 'error', 'answer' => 'error product']);
            }else{
                add_to_cart($product);
                ob_start();
                require  __DIR__ . '/cart-modal.php';
                $cart = ob_get_clean();
                echo json_encode(['code' => 'ok', 'answer' => $cart]);
            }
            break;
    }
}

