<?php 
    $search = "SELECT * FROM users "
?>
<header>
    <nav>
        <ul>
            <li><img src="img/nya.png" style="width: 50px;"></li>
            <li><div id="siteName">Lucat</div></li>
            <li><a href="index.php" class="left item">Home</a></li>
            <?php if (isset($_SESSION['id'])){ ?>
            <li><a href="profile.php<?php if(isset($_SESSION['id'])){ echo '?id=' .$_SESSION['id'];} ?>" class="left item">Profile</a></li> 
            <?php } ?>
            <li><a href="gallery.php" class="left item">Gallery</a></li>
            </ul>
            <ul class="mid">
                <li>
                    <span class="middle">
                        <form action="searchuser.php" class="theone" method="POST">
                            <input class="edge" type="text" name="searching" placeholder="Want to find someone?">
                            <button type="submit" id="search">
                                <i id="secon" class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </span>
                </li>
            </ul>
            <ul class="right">
                <?php if (isset($_SESSION['id'])){ ?>
                    <li><a href="submit.php" class="sub item">Post</a></li>
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