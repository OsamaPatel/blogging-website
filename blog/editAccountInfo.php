<?php
    include('config/conn.php');
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $id = $_SESSION['id'];

        $sql = "UPDATE users SET
        name = '$name',
        username = '$username',
        email = '$email',
        password = password
        WHERE id='$id'";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            header('location:account.php');
        }else{
            echo 'Error Occured';
        }
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
    <title>Change Account Info | Blog</title>
</head>

<body>
    <div class="auth-wrapper">
        <div class="login-form">
            <form action="" method="post" name="login-form">
                <p class="title">New Info</p>
                <div class="input-field">
                    <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $_SESSION['name']; ?>" class="input user-icon"><br>
                </div>
                <div class="input-field">
                    <input type="text" name="username" placeholder="Enter Your Username" value="<?php echo $_SESSION['username']; ?>" class="input user-icon"><br>
                </div>
                <div class="input-field">
                    <input type="email" name="email" placeholder="Enter Your Email" value="<?php echo $_SESSION['email']; ?>" class="input email-icon"><br>
                </div>
                <input type="submit" class="authbtn" value="Submit" name="submit">
            </form>
        </div>
    </div>
</body>

</html>