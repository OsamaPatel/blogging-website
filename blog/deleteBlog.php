<?php
    include('config/conn.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM blogs WHERE id='$id'";
        $res = mysqli_query($conn,$sql);
        if($res==true){
            header('location:myBlogs.php');
        }else{
            echo 'Error Occured';
        }
    }
?>