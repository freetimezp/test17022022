<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <h2>
        Login to admin panel
    </h2>

    <form action="admin/admin.php" method="post">
        <div class="form-group">
            <input type="text" name="login" placeholder="Enter login">
        </div>
        <div class="form-group">
            <input type="text" name="password" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Enter</button>
    </form>
</body>

</html>



