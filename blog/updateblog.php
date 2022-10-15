<?php
    include('config/conn.php');

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
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
            $image_name = $_POST['image'];
        }

        $sql = "UPDATE blogs SET 
        title = '$title',
        subtitle = '$subtitle',
        description = '$description',
        image = '$image_name'
        WHERE id = '$id'
        ";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            header('location:myBlogs.php');
        }else{
            echo 'Error Occured';
        }
    }

?>