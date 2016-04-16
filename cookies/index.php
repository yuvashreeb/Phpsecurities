
<?php
session_start();

$link=mysqli_connect('localhost', 'dbuser', '123','Name');
if (isset($_POST['email'], $_POST['pass']) || isset($_COOKIE['email'], $_COOKIE['pass'])) {
    if (isset($_COOKIE['email'], $_COOKIE['pass'])) {
        $email = mysql_real_escape_string($link,$_COOKIE['email']);
        $pass = mysql_real_escape_string($link,$_COOKIE['pass']);
    } else {
        $email = mysqli_real_escape_string($link,$_POST['email']);
        $pass = sha1($_POST['pass']);
    }
    $users = mysqli_query("SELECT COUNT(`UserId`) FROM `users` WHERE `Email` = '($email)' AND `Password` = '($pass)';");

    $total = mysqli_result($users, 0);
    if ($total == 1) {
        setcookie('email', $_POST['email'] . time() + 600);
        setcookie('pass', $pass . time() + 600);
        $_SESSION['logged_in'] = 1;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action="" method="POST">
            <p>
<?php
if (isset($_SESSION['logged_in'])) {
    echo 'Your are logged In';
}
?>
                <label for="user">Email:</label>
                <input type="text" name="email" id="email">
            </p>
            <p>
                <label for="pass">Password:</label>
                <input type="text" name="pass" id="pass">
            </p>
            <p>
                <input type="submit" value="Login">
            </p>
        </form>
    </body>
</html>
