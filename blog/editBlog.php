<?php
    include('config/conn.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROm blogs WHERE id='$id'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $subtitle = $row['subtitle'];
        $description = $row['description'];
        $image = $row['image'];
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
    <title>EditBlog | Blog</title>
</head>

<body>
    <section class="add-wrapper">
        <div class="form-container">
            <form action="updateblog.php" method="post" name="login-form" enctype="multipart/form-data">
                <p class="title">Create Blog</p>
                <div class="input-field">
                    <input type="text" name="title" placeholder="Enter Your Title" value="<?php echo $title; ?>" class="input title-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <input type="file" name="image" class="input imgbtn" id="imgselect" hidden>
                    <label for="imgselect" class="imglabel">Select Image <span><i
                                class="fa-solid fa-image"></i></span></label>
                    <br>
                </div>
                <div class="current-img" style="display:flex;align-items:center;">
                    <span style="padding-right:5px">Current Image : </span>
                    <img src="<?php echo $siteurl; ?>upload/<?php echo $image; ?>" width="100px" style="margin-top:1rem;" />
                </div>
                <div class="input-field">
                    <input type="text" name="subtitle" placeholder="Enter Your Subtitle" value="<?php echo $subtitle; ?>" class="input title-icon" autocomplete="off"><br>
                </div>
                <div class="input-field">
                    <textarea type="text" name="description" placeholder="Enter Description" rows="3"
                        class="input desc-icon"><?php echo $description; ?></textarea><br>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" class="authbtn" value="Update" name="submit">
            </form>
        </div>
    </section>
</body>

</html>