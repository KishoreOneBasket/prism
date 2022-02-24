<?php
    session_start();
    unset($_SESSION['user_id']);
    $_SESSION['status'] = "Logout Successful.";
    header("Location: ../");
    exit();
?>