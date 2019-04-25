<?php
    session_start();
    if($_SESSION['user_role'] !== 'administrator') {
        header('Location: ../admin-login.php');
      }
    session_unset();
    session_destroy();
    header('Location: ../index.php');
?>