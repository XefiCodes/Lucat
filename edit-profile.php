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
            $user_data_query = mysqli_query($con, "SELECT username, nickname, email, bio, loc, website_link, dob FROM users WHERE username='$userLoggedIn'");
            $row = mysqli_fetch_array($user_data_query);

            $username = $row['username'];
            $nickname = $row['nickname'];
            $email = $row['email'];
            $bio = $row['bio'];
            $loc = $row['loc'];
            $website_link = $row['website_link'];
            $dob = $row['dob'];
            ?>

            <input type="radio" name="indicator" id="tb-ac" checked>
            <input type="radio" name="indicator" id="tb-pa">
            <input type="radio" name="indicator" id="tb-ab">
            <input type="radio" name="indicator" id="tb-ca">

            <div class="nav-bar">
                <div class="profile">
                    <div class="img"><img src="img/old/chad.png" alt="User Profile Picture" class="rounded-circle"></div>
                    <h3 class="fw-bold"><?php echo $username; ?></h3>
                    <h5 class="pb-4">@<?php echo $nickname; ?></h5>
                </div>
                <div class="list">

                    <label for="tb-ac"><span class="topic">Account</span></label>
                    <label for="tb-pa"><span class="topic">Password</span></label>
                    <label for="tb-ab"><span class="topic">About</span></label>
                    <label for="tb-ca"><span class="topic">Close Account</span></label>
                </div>
            </div>
            <div class="text-content">
                <div class="tb-ac text">
                    <h3 class="fw-bold">Account Settings</h3>
                    <!-- Form for users to change their first name, last name, email and bio. -->
                    <form action="edit-profile.php" method="POST">
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
                            <textarea class="w-100" type="text" name="bio"><?php echo $bio; ?></textarea>
                        </div>
                        <br>
                        <input type="submit" name="update_account" value="Update">
                    </form>
                </div>
                <div class="tb-pa text">
                    <h3 class="fw-bold">Password Settings</h3>
                    <!-- Form for users to change their first name, last name, email and bio. -->
                    <form action="edit-profile.php" method="POST">
                        <div class="section">
                            <p class="fs-5">Old Password</p>
                            <input class="w-100" type="password" name="old_password">
                        </div>
                        <div class="section">
                            <p class="fs-5">New Password</p>
                            <input class="w-100" type="password" name="new_password_1">
                        </div>
                        <div class="section">
                            <p class="fs-5">Re-enter Password</p>
                            <input class="w-100" type="password" name="new_password_2">
                        </div>
                        <br>
                        <input type="submit" name="update_password"value="Update">
                        <br>
                    </form>
                </div>
                <div class="tb-ab text">
                    <h3 class="fw-bold">About Settings</h3>
                    <!-- Form for users to change their first name, last name, email and bio. -->
                    <form action="edit-profile.php" method="POST">
                        <div class="section">
                            <p class="fs-5">Location</p>
                            <input class="w-100" type="text" name="loc" value="<?php echo $loc; ?>">
                        </div>
                        <div class="section">
                            <p class="fs-5">Portfolio Link</p>
                            <input class="w-100" type="text" name="website" value="<?php echo $website_link; ?>">
                        </div>
                        <div class="section">
                            <p class="fs-5">Date of Birth</p>
                            <input class="w-100" type="text" name="dob" value="<?php echo $dob; ?>">
                        </div>
                        <br>
                        <input type="submit" name="update_about" value="Update">
                        <br>
                    </form>
                </div>
                <div class="tb-ca text">
                    <h3 class="fw-bold">Close Account</h3>
                    <!-- Form for users to change their first name, last name, email and bio. -->
                    <form action="edit-profile.php" method="POST">
                        <p class="fs-5">Are you sure you want to close your account? It will hide all your activity from everyone else but you'll be able to reopen it by logging in!</p>
                        <br>
                        <input type="submit" name="close_account" value="Yes, I'm Sure">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<br><br>