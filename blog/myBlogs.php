<?php
    include('partials/header.php');
    $user = $_SESSION['id'];
    
?>
    <section>
        <div class="myblogs">
            <?php
                $sql = "SELECT * FROM blogs WHERE user='$user'";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $subtitle = $row['subtitle'];
                        $description = $row['description'];
                        $image_name = $row['image'];
            ?>
                        <div class="feed">
                            <div class="image">
                                <img src="<?php echo $siteurl ?>upload/<?php echo $image_name ?>"
                                    alt="">
                            </div>
                            <div class="content">
                                <h2><?php echo $title; ?></h2>
                                <h3><?php echo $subtitle; ?></h3>
                                <p><?php echo $description; ?></p>
                                <div class="actions">
                                    <a href="editBlog.php?id=<?php echo $id; ?>"><button class="primarybtn">Edit <span><i class="fa-solid fa-pen-to-square"></i></span></button></a>
                                    <a href="deleteBlog.php?id=<?php echo $id; ?>"><button class="dangerbtn">Delete <span><i class="fa-solid fa-trash"></i></span></button></a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }else{
                    ?>
                        <h1>You Haven't Uploaded any Blogs</h1>
                    <?php
                }
            ?>
            
        </div>
    </section>
</body>

</html>