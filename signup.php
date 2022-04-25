<?php session_start(); ?>
<html>
    <head>
        <title>Signup Lucat</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="Styles/index.css" rel="stylesheet">
        <link href="Styles/global.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                <li><div id="siteName">Lucat</div></li>
                <!-- <li><a href="#" class="left">Home</a></li>
                <li><a href="profile.html" class="left">Profile</a></li>
                <li><a href="gallery.html" class="left">Gallery</a></li> -->
                </ul>
                <!-- <ul class="right">
                    <li><a href="#" class="sub">Submit</a></li>
                    <li><a href="commissions.html" class="com">Commissions</a></li>
                    <li><a href="#" class="sub">me</a></li>
                </ul> -->
            </nav>
        </header>
        <section>
            <div>
                <form class="box" action="bts/account_created.php" method="post" enctype="multipart/form-data">
                    <h3>Signup</h3>
                    <input type="text" name="em" placeholder="Email" required>
                    <input type="text" name="un" placeholder="Username" required>
                    <input type="password" name="pw" placeholder="Password" required>
                    <?php if(isset($_SESSION['error'])) { ?>
                        <div id="error" style="padding: 5px 0px 5px 0px; margin-bottom: 10px; color: white; background-color: #dc143c;">
                            <?php echo $_SESSION['error']; ?>
                        </div>
                    <?php } ?>
                    <!-- <div class="divide">
                        <input type="submit" value="CREATE ACCOUNT" style="padding: 5px 50px 5px 50px;">
                        <a href="main.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                    </div> -->
                </form>
            </div>
        </section>
    </body>
</html>
<?php session_destroy(); ?>