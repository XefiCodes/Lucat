<?php
    ini_set("display_errors", "off");

    include_once 'connect.php';

    $url = basename($_SERVER['PHP_SELF']);
    $query = $_SERVER['QUERY_STRING'];
    if($query){
    $url .= "?".$query;
    }
    $_SESSION['current_page'] = $url;

    $name = $_SESSION['username'];
    $result = mysqli_query($d,"SELECT * FROM users WHERE username = '$name'");
    $all = mysqli_fetch_array($result);
    $pind = $all["uid"];
?>
<html>
    <head>
        <title>ConNet</title>
        <link rel="stylesheet" href="CSS/signupstyle.css">
        <link rel="stylesheet" href="CSS/edit.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            function view() {
                pic.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    </head>
    <body>
        <section class="seperate">
            <div class="bar">
            <div class="title"><span class="gray">: C</span>O<span class="yellow">ИN</span>E<span class="grey">T :</span></div>
                <div class="fix">
                    <ul>
                        <?php echo $_SESSION["username"]; ?>
                        <li><a href="posts.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="profile.php"><i class="fa fa-user-circle"></i> Profile</a></li>
                        <li><a href="profile.php"><i class="fa fa-backward" aria-hidden="true"></i> Back</a></li>
                        <li style="padding-top: 361px;"><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="new">
                <div class="align">Profile Picture</div>
                <div id="posting" class="post">
                    <?php
                        $got = mysqli_query($d,"SELECT * FROM users WHERE username = '$name'");
                        $rowA = mysqli_fetch_array($got);
                        $gotcha = $rowA['image'];
                        $def = 'https://i.imgur.com/qiwcrKS.png';
                    ?>
                    <form class="query" action="pfp.php" method="POST" enctype="multipart/form-data">
                        <div class="details">
                            <?php
                                if($gotcha == $def){
                                    echo '<img id="hatdog" src="'.$gotcha.'" width="100px" height="100px"/>';
                                }
                                else{
                                echo '<img id="hatdog" src="data:image/jpeg;base64,'.base64_encode($rowA['image']).'" width="100px" height="100px"/>';
                                } ?>
                            <div class="beeg"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i></div>
                            <div class="gap">
                                <img id="pic" src="imgfolder/bg.jpg" width="100px" height="100px"/>
                            </div>
                        </div>
                            <div class="divider"><br><input type="file" name="image" onchange="view()"/></div>
                            <div class="divider">
                                <div class="warning">Images should not be more than 1 MB. PNG only.</div>
                                <input type="type" name="name" value="<?php echo $name ?>" hidden>
                                <input type="submit" value="EDIT PICTURE">
                            </div>
                    </form>
                </div>
                <div class="align">Password</div>
                <div id="posting" class="">
                    <?php 
                        $getPass = $all["password"];
                        $ewow = '';

                        if(isset($_POST['passw'])){
                            $op = $_POST['pw'];
                            $p = md5($op);
                            $np = $_POST['newpw'];
                            $cp = $_POST['conpw'];
                            $danew = md5($np);

                            if($p == $getPass){
                                if (!empty($np) && !empty($cp)){
                                    if($np == $cp){
                                        $sqol = "UPDATE users SET password = '$danew' WHERE uid = '$pind'";
                                        mysqli_query($d, $sqol);
                                    }
                                    else{
                                        $ewow = 'Passwords does not match!';
                                    }
                                }
                                else{
                                    $ewow = 'New Password Required!';
                                }
                            }
                            else{
                                $ewow = 'Wrong password.';
                            }
                        }
                    ?>
                    <form class="boxx" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="password" name="pw" placeholder="Old Password">
                        <input type="password" name="newpw" placeholder="New Password">
                        <input type="password" name="conpw" placeholder="Confirm New Password">
                        <input type="submit" name="passw" value="CHANGE PASSWORD">
                    </form>
                    <?php if(!empty($ewow)){ ?>
                        <div class="error"><?php echo $ewow ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="side">
                <div>
                    <div class="align">Bio</div>
                    <div id="under">
                        <div id="under">
                            <div id="posting">
                                <form class="bionic" action="bio.php" method="POST">
                                    <textarea class="wa" name="bi" rows="4" placeholder="What's so interesting about you?..."></textarea>
                                    <input type="type" name="uid" value="<?php echo $pind ?>" hidden>
                                    <input type="submit" name="bioweapon" value="EDIT BIO">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>