<?php
session_start();


$login_valid = "masterkey91";
$pwd_valid = "pwd";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['user'];
    $pwd = $_POST['pwd'];

    if ($login === $login_valid && $pwd === $pwd_valid) {
        $_SESSION['username'] = $login;

        $cookieName = 'visit_count_cookie';
        if (!isset($_COOKIE[$cookieName])) {
            setcookie($cookieName, 1, time() + 3600 * 24 * 30); // Cookie expires in 30 days
        } else {
            setcookie($cookieName, $_COOKIE[$cookieName] + 1, time() + 3600 * 24 * 30);
        }

        header("Location: traitment.php");
        exit();
    } else {
        echo "Please enter valid credentials.";
    }
}
