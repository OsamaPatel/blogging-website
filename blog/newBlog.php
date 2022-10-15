<?php
    include('config/conn.php');
    $user = $_SESSION['id'];
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $description = $_POST['description'];
        
        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];
            $tmp = explode('.',$image_name);
            $extension = end($tmp);
            $image_name = 'Blog-'.rand(000,999).'.'.$extension;
            $old_path = $_FILES['image']['tmp_name'];
            $new_path = "./upload/".$image_name;
            $upload = move_uploaded_file($old_path, $new_path);
            if($upload == true){
                echo 'Uploaded Successfully';
            }else{
                echo 'upload failed';
            }
        }else{
            $image_name = "";
        }

        $sql = "INSERT INTO blogs SET
        title = '$title',
        subtitle = '$subtitle',
        description = '$description',
        image = '$image_name',
        user = '$user'
        ";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            header('location:myBlogs.php');
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
    <title>MyBlogs | Blog</title>
</head>

<body>
    <section class="add-wrapper">
        <div class="form-container">
            <form action="" method="post" name="login-form" enctype="multipart/form-data">
                <p class="title">Create Blog</p>
                <div class="input-field">
                    <input type="text" name="title" placeholder="Enter Your Title" class="input title-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <input type="file" name="image" class="input imgbtn" id="imgselect" hidden>
                    <label for="imgselect" class="imglabel">Select Image <span><i
                                class="fa-solid fa-image"></i></span></label>
                    <br>
                </div>
                <div class="input-field">
                    <input type="text" name="subtitle" placeholder="Enter Your Subtitle" class="input title-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <textarea type="text" name="description" placeholder="Enter Description" rows="3"
                        class="input desc-icon"></textarea><br>
                </div>
                <input type="submit" class="authbtn" value="Create" name="submit">
            </form>
        </div>
    </section>
</body>

</html>