<header>
    <nav>
        <ul>
            <li><div id="siteName">Lucat</div></li>
            <li><a href="index.php" class="left item">Home</a></li>
            <li><a href="profile.php<?php if(isset($_SESSION['id'])){ echo '?id=' .$_SESSION['id'];} ?>" class="left item">Profile</a></li> 
            <li><a href="gallery.php" class="left item">Gallery</a></li>
            </ul><ul class="right">
                <?php if (isset($_SESSION['id'])){ ?>
                    <li><a href="submit.php" class="sub item">Submit</a></li>
                    <li><a href="commissions.php" class="com item">Commissions</a></li>
                <?php } else { ?>
                    <li><a href="signin.php" class="sub item">Login</a></li>
                    <li><a href="signup.php" class="com item">Sign up</a></li>
                <?php } ?>
                <li><a href="users.php" class="extra sep"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                <?php if (isset($_SESSION['id'])){ ?>
                    <li><a href="logout.php" class="extra off"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
                <?php } ?>
            </ul>
        </ul>
    </nav>
</header>