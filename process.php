<?php
    session_start();
    unset($_SESSION["IDcard"]);
    header("Location: index.php");
?>
