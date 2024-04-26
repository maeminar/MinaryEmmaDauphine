<?php
    session_start();

    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    
    header("Location: https://localhost/dauphineexam/login.php");
?>