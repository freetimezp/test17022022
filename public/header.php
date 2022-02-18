<?php
require_once './functions/connect.php';

$main = $pdo->prepare("SELECT * FROM contact");
$main->execute();
$res = $main->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Тестовый сайт</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <div class="header-top bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-lg-3">
                    <a href="index.php">
                        <span style="color: black;font-weight: bold">Логотип</span>
                    </a>
                </div>
                <div class="col-lg-3 d-none d-lg-block">

                    <div class="quick-contact-icons d-flex">

                        <div class="text">
                            <span class="h4 d-block"><?=$res['city'];?></span>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="quick-contact-icons d-flex">

                        <div class="text">
                            <span class="h4 d-block"><?=$res['phone'];?></span>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 d-none d-lg-block">
                    <div class="quick-contact-icons d-flex">

                        <div class="text">
                            <span class="h4 d-block"><?=$res['email'];?></span>

                        </div>
                    </div>
                </div>

                <div class="col-6 d-block d-lg-none text-right">
                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                            class="icon-menu h3"></span></a>
                </div>
            </div>
        </div>
    </div>

