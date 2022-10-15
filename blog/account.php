<?php
    include('partials/header.php');
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id='$id'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];
    $username = $row['username'];
    $email = $row['email'];

    $sql2 = "SELECT * FROM blogs WHERE user='$id'";
    $res2 = mysqli_query($conn,$sql2);
    $count = mysqli_num_rows($res2);

?>
    <section class="account">
        <div class="account-wrappper">
            <div class="profile">
                <img src="https://st2.depositphotos.com/1104517/11965/v/950/depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg"
                    alt="">
            </div>
            <div class="account-info">
                <h2>Name : <?php echo $name; ?></h2>
                <h2>Username : <?php echo $username; ?></h2>
                <h2>Email : <?php echo $email; ?></h2>
                <h2>No. Blogs : <?php echo $count ?></h2>
                <div class="actions">
                    <a href="editAccountInfo.php"><button class="primarybtn">Change Account Info</button></a>
                    <a href="logout.php"><button class="dangerbtn">Logout</button></a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>