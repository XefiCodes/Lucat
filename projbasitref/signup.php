<?php session_start(); ?>
<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="css/signupstyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <div class="titlee"><span class="gray">: C</span>O<span class="yellow">ИN</span>E<span class="grey">T :</span></div>
        <form class="box" action="created.php" method="post" enctype="multipart/form-data">
            <h3>Signup</h3>
            <input type="text" name="em" placeholder="Email" required>
            <input type="text" name="un" placeholder="Username" required>
            <input type="password" name="pw" placeholder="Password" required>
            <?php if(isset($_SESSION['error'])) { ?>
                <div id="error" style="padding: 5px 0px 5px 0px; margin-bottom: 10px; color: white; background-color: #dc143c;">
                    <?php echo $_SESSION['error']; ?>
                </div>
            <?php } ?>
            <div class="divide">
                <input type="submit" value="CREATE ACCOUNT" style="padding: 5px 50px 5px 50px;">
                <a href="main.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </div>
        </form>
    </body>
</html>
<?php session_destroy(); ?>