<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../static/styles.css">
</head>
<body>

<div class="login_container">
    <br>
    <h1 class="pale_container">WAREHOUSE MANAGEMENT SYSTEM</h1>

    <?php
    if (!empty($message)): ?>
        <h2 class="error_container"><?php echo htmlspecialchars($message); ?></h2>
    <?php endif; ?>

    <div class="login_form">
        <form action="../index.php" method="POST">
            <div>
                <label for="username"></label>
                <input type="text" name="username" id="username" placeholder=" username">
            </div>
            <div>
                <label for="password"></label>
                <input type="text" name="password" id="password" placeholder=" password">
            </div>
            <br>
            <div>
                <button type="submit" name="login" value="login">Login</button>
            </div>
        </form>
    </div>

</div>
</body>
</html>