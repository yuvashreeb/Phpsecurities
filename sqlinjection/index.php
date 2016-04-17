<?php
$link=mysqli_connect('localhost', 'dbuser', '123','Name');

function ares($input) {
    if (get_magic_quotes_gpc()) {
        $input = stripslashes($input);
    }
    return mysqli_real_escape_string($input);
}


if (isset($_POST['email'], $_POST['pass'])) {
    $email = ares($_POST['email']);
    $pass = sha1($_POST['pass']);
    echo "SELECT COUNT(`UserId`) FROM `UserSyatem` WHERE `Email` = '{$email}' AND `Password` = '{$pass}'";
    $users = mysqli_query($link,"SELECT COUNT(`UserId`) FROM `UserSystem` WHERE `Email` = '{$email}' AND `Password` = '{$pass}'");
    $total = mysqli_result($users, 0);
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($total)) {
            if ($total == 0) {
                echo '<h2>Incorrect Password</h2>';
            } else {
                echo '<h2>Access Granted</h2>';
            }
        }
        ?>
        <form method="POST" action="">
            <input type="text" name="email">
            <input type="text" name="pass">
            <input type="submit" value="login">
        </form>

    </body>
</html>
