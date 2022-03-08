<?php
    session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="admin">
        <?php if(!empty($_SESSION['login'])): ?>
        <div class="admin-login">
            <p class="admin-title"><?="Hello " . $_SESSION['login'];?></p>
            <a class="admin-logout" href="logout.php">Logout</a>
            <a class="mainpagelink" href="/">Go to main page</a>
        </div>

        <div class="admin-links">
            <a href="admin/contact.php">Contact</a>
            <a href="">Header</a>
            <a href="admin/content.php">Content</a>
            <a href="admin/about.php">About</a>
        </div>

        <?php else: ?>
            <?='<a href="login.php">You must auth! Go to login page.</a>'; ?>
        <?php endif; ?>
    </div>
</body>

</html>