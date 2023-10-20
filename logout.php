<?php
session_start();
if (isset($_SESSION['user'])) {
    session_destroy();
    header("Location: index.php");
}

if (isset($_SESSION['admin'])) {
    session_destroy();
    header("Location: index.php");
}

exit();
