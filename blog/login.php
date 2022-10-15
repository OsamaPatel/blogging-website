<?php
    include('config/conn.php');
    if(isset($_SESSION['username'])){
        header('location:index.php');
    }
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT * FROM users WHERE username='$username'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count>0){
            while($row = mysqli_fetch_assoc($res)){
                if($password = $row['password']){
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $password;

                    if(isset($_POST['remember'])){
                        setcookie ("username",$username,time()+(10*365*24*60*60));
                        setcookie ("password",$password,time()+(10*365*24*60*60));
                    }else{
                        if(isset($_COOKIE['username'])){
                            setcookie ("username","");
                        }
                        if(isset($_COOKIE['password'])){
                            setcookie ("password","");
                        }
                    }

                    header('location:index.php');
                }else{
                    
                }
            }
        }else{
            echo 'Account Does not exist';
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
    <title>Login | Blog</title>
</head>

<body>
    <div class="auth-wrapper">
        <div class="login-form">
            <form action="" method="post" name="login-form">
                <p class="title">Login</p>
                <div class="input-field">
                    <input type="text" name="username" placeholder="Enter Your Username" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>" class="input user-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Enter Your Password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>"
                        class="input pass-icon" autocomplete="off"><br>
                </div>
                <div class="remember-box">
                    <p class="remember">Remember Me</p><input type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])){ echo 'checked'; } ?> class="check"><br>
                </div>
                <input type="submit" class="authbtn" value="Login" name="submit">
                <p>Don't have an account?<a href="register.php">Register Here</a></p>
            </form>
        </div>
    </div>
</body>

</html>