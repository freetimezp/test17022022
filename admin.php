<?php
    session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
</head>
<body>
    <div>
        <?php if(!empty($_SESSION['login'])): ?>
            <?="Hello " . $_SESSION['login'];?>
        <div>
            <a href="/logout.php">Logout</a>
        </div>

        <div>
            <a href="admin/contact.php">Contact</a>
            <a href="">Header</a>
            <a href="">Content</a>
            <a href="">About</a>
        </div>

        <?php else: ?>
            <?='<a href="login.php">You must auth! Go to login page.</a>'; ?>
        <?php endif; ?>
    </div>
</body>

</html>