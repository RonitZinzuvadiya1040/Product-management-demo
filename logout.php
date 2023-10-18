<?php
session_start();
if (isset($_SESSION['user'])) {
    session_destroy();
    header("Location: user-login.php");
}

if (isset($_SESSION['admin'])) {
    session_destroy();
    header("Location: admin-login.php");
}

exit();
