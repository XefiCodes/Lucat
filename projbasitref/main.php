<?php session_start(); ?>
<html>
    <head>
        <title>ConNet</title>
        <link rel="stylesheet" href="CSS/signupstyle.css">
    </head>
    <body>
        <div class="titlee"><span class="gray">: C</span>O<span class="yellow">ИN</span>E<span class="grey">T :</span></div>
        <form class="box" action="login.php" method="post">
            <h3>Log In to connect with people! </h3>
            <input type="text" name="un" placeholder="Username" required>
            <input type="password" name="pw" placeholder="Password" required>
            <input type="submit" name="Login" value="Log In" style="padding: 5px 112px 5px 112px;">
            <?php if(isset($_SESSION['error'])) { ?>
                <div id="error" style="padding: 5px 0px 5px 0px; color: white; background-color: #dc143c;">
                    <?php echo $_SESSION['error']; ?>
                </div>
            <?php } ?>
            <p>Don't have an account? <span class="sign"><a href="signup.php">Sign up here.</a></span></p>
        </form>
    </body>
</html>
<?php session_destroy(); ?>