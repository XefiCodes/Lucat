<?php 
    include("bts/header.php");
    include("bts/edit-profile_handler.php");
?>

<div class="edit-prof">
    <!-- Background image -->
    <div class="background">
        <img src="img/edit-profile-bg.jpg" alt="Anime Girl Staring At Sunset" class="w-100">
        <h2 class="fw-bold">Account Settings</h2>
    </div>
    <div class="container">
        <div class="box w-100">
            <!-- Gets the data from the database. -->
            <?php
                $user_data_query = mysqli_query($con, "SELECT username, nickname, email FROM users WHERE username='$userLoggedIn'");
                $row = mysqli_fetch_array($user_data_query);

                $username = $row['username'];
                $nickname = $row['nickname'];
                $email = $row['email'];
            ?>

            <div class="nav-bar">
                <div class="profile">
                    <img src="" alt="User Profile Picture">
                    <h3 class="fw-bold"><?php echo $username; ?></h3>
                    <h5>@<?php echo $nickname; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
