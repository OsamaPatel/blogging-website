<?php
    include('config/conn.php');
    session_destroy();
    header('location:login.php');
?>