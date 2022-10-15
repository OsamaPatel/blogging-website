<?php
    include('partials/header.php');
?>
    <section class="home-wrapper">
        <div class="left-panel">
            <h1>Recommended Feed</h1>
            <?php
                $sql = "SELECT * FROM blogs ORDER BY RAND() LIMIT 4";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                    while($row = mysqli_fetch_assoc($res)){
                        $title = $row['title'];
                        $image = $row['image'];
                        $subtitle = $row['subtitle'];
                        $description = $row['description'];
                        $user = $row['user'];
                        ?>
                        <div class="feed">
                            <img src="<?php echo $siteurl ?>upload/<?php echo $image; ?>"
                                alt="">
                            <h2><?php echo $title; ?></h2>
                            <h3><?php echo $subtitle; ?></h3>
                            <p><?php echo $description; ?></p>
                        </div>
                        <hr>
                        <?php
                    }
                }else{
                    ?>
                        <p>No Recommendation at the moment</p>
                    <?php
                }
            ?>
            
        </div>
        <div class="vert-line">&nbsp;</div>
        <div class="mid-panel">
            <h1>For You</h1>
            <?php
                $sql = "SELECT * FROM blogs LIMIT 10";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                    while($row = mysqli_fetch_assoc($res)){
                        $title = $row['title'];
                        $image = $row['image'];
                        $subtitle = $row['subtitle'];
                        $description = $row['description'];
                        ?>
            <div class="feed">
                <div class="image">
                    <img src="<?php echo $siteurl ?>upload/<?php echo $image; ?>"
                        alt="">
                </div>
                <div class="content">
                    <h2><?php echo $title; ?></h2>
                    <h3><?php echo $subtitle; ?></h3>
                    <p><?php echo $description; ?></p>
                </div>
            </div>
            <hr>
            <?php
                    }
                }else{
                    ?>
                        <p>No Blogs at the moment</p>
                    <?php
                }
            ?>
        </div>
        <div class="vert-line">&nbsp;</div>
        <div class="right-panel">
            <h1>Trending Topics</h1>
            <?php
                $sql = "SELECT * FROM blogs ORDER BY RAND() LIMIT 5";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                    while($row = mysqli_fetch_assoc($res)){
                        $title = $row['title'];
                        $image = $row['image'];
                        $subtitle = $row['subtitle'];
                        $description = $row['description'];
                        ?>
                        <div class="feed">
                            <img src="<?php echo $siteurl ?>upload/<?php echo $image; ?>"
                                alt="">
                            <h2><?php echo $title; ?></h2>
                            <h3><?php echo $subtitle; ?></h3>
                            <p><?php echo $description; ?></p>
                        </div>
                        <hr>
                        <?php
                    }
                }else{
                    ?>
                        <p>No Trending Blogs at the moment</p>
                    <?php
                }
            ?>
        </div>
    </section>
</body>
</html>