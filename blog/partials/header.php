<?php
    include('config/conn.php');
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="./images/blog.png">
    <title>Home | Blog</title>
</head>

<body>
    <header class="head">
        <nav>
            <div class="logo">
                <img src="images/blog.png" alt="">
            </div>
            <div class="hero">
                <div class="links">
                    <a href="index.php"><span>Home</span></a>
                    <a href="newBlog.php"><span>New Blog</span></a>
                    <a href="myBlogs.php"><span>My Blogs</span></a>
                    <a href="account.php"><span>Account</span></a>
                </div>
            </div>
        </nav>
    </header>