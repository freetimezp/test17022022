<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="loginsection">
        <div class="login">
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
        </div>

        <div class="registration">
            <h2>Create new user</h2>

            <form class="c-form" action="registration.php" method="post">
                <input  class="btn btn-primary" type="submit" name="registration" value="registration">
            </form>

        </div>
    </div>
</body>

</html>



