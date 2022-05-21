<?php
include("bts/header.php");
include("bts/edit-profile_handler.php");
?>

<div class="edit-prof">
    <!-- Background image -->
    <img src="img/edit-profile-bg.jpg" alt="Anime Girl Staring At Sunset" class="bg-img w-100">

    <div class="container">
        <h2 class="fw-bold">Account Settings</h2>
        <div class="box mt-4">
            <!-- Gets the data from the database. -->
            <?php
            $user_data_query = mysqli_query($con, "SELECT username, nickname, email, bio FROM users WHERE username='$userLoggedIn'");
            $row = mysqli_fetch_array($user_data_query);

            $username = $row['username'];
            $nickname = $row['nickname'];
            $email = $row['email'];
            $bio = $row['bio'];
            ?>

            <div class="nav-bar">
                <div class="profile">
                    <div class="img"><img src="img/old/chad.png" alt="User Profile Picture" class="rounded-circle"></div>
                    <h3 class="fw-bold"><?php echo $username; ?></h3>
                    <h5 class="pb-4">@<?php echo $nickname; ?></h5>
                </div>
                <a href="#" class="text-decoration-none fs-5 fw-bold pt-3 pb-3">Account</a>
                <a href="#" class="text-decoration-none fs-5 fw-bold pt-3 pb-3">Password</a>
                <a href="#" class="text-decoration-none fs-5 fw-bold pt-3 pb-3">About</a>
                <a href="#" class="text-decoration-none fs-5 fw-bold pt-3 pb-3">Close Account</a>
            </div>
            <div class="edit">
                <h3 class="fw-bold">Account Settings</h3>
                <!-- Form for users to change their first name, last name, email and profile picture. -->
                <form action="settings.php" method="POST">
                    <div class="name">
                        <div class="section">
                            <p class="fs-5">Username</p>
                            <input class="w-100" type="text" name="uname" value="<?php echo $username; ?>">
                        </div>
                        <div class="section">
                            <p class="fs-5">Nickname</p>
                            <input class="w-100" type="text" name="nname" value="<?php echo $nickname; ?>">
                        </div>
                    </div>
                    <div class="section">
                        <p class="fs-5">Email</p>
                        <input class="w-100" type="text" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="section">
                        <p class="fs-5">Biography</p>
                        <textarea class="w-100" type="text" name="bio" value="<?php echo $bio; ?>"></textarea>
                    </div>
                    <br>
                    <input type="submit" name="update_details" id="save_details" value="Update" class="info settings_submit">
                    <br>
                </form>

            </div>
        </div>
    </div>
</div>
<br><br>