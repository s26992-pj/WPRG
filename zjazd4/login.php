<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = 'admin';
    $password = 'password';
    
    $input_username = htmlspecialchars($_POST['username']);
    $input_password = htmlspecialchars($_POST['password']);

    if ($input_username == $username && $input_password == $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $input_username;
        setcookie('login', $input_username, time() + (86400 * 30), "/");
        header('Location: index.php');
        exit();
    } else {
        $login_error = "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($login_error)): ?>
        <p style="color: red;"><?php echo $login_error; ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
