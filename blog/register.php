<?php
    include('config/conn.php');
    if(isset($_SESSION['username'])){
        header('location:index.php');
    }
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if($password == $cpassword){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];

            $sql = "INSERT INTO users SET 
            name = '$name',
            username = '$username',
            email = '$email',
            password = '$password'
            ";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                header('location:login.php');
            }else{
                echo 'Error registering your account';
            }
        }else{
            echo 'Password did not match';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <link rel="icon" type="image/x-icon" href="./images/blog.png">
    <title>Register | Blog</title>
</head>

<body>
    <div class="auth-wrapper">
        <div class="login-form">
            <form action="" method="post" name="login-form">
                <p class="title">Register</p>
                <div class="input-field">
                    <input type="text" name="name" placeholder="Enter Your Name" class="input user-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <input type="text" name="username" placeholder="Enter Your Username" class="input user-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <input type="email" name="email" placeholder="Enter Your Email" class="input user-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Enter Your Password"
                        class="input pass-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <input type="password" name="cpassword" placeholder="Confirm Your Username"
                        class="input pass-icon" autocomplete="off"><br>
                </div>
                <input type="submit" class="authbtn" value="Register" name="submit">
                <p>Already have an account?<a href="login.php">Login Here</a></p>
            </form>
        </div>
    </div>
</body>

</html>