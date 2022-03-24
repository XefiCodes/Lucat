<?php
    ini_set("display_errors", "off");

    include_once 'connect.php';

    $url = basename($_SERVER['PHP_SELF']);
    $query = $_SERVER['QUERY_STRING'];
    if($query){
    $url .= "?".$query;
    }
    $_SESSION['current_page'] = $url;

    $result = mysqli_query($d,"SELECT * FROM posts");
    $checkPosts = mysqli_query($d, "SELECT * FROM posts");
?>
<html>
    <head>
        <title>ConNet</title>
        <link rel="stylesheet" href="CSS/signupstyle.css">
        <link rel="stylesheet" href="CSS/poststyle.css">
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
                        <li style="padding-top: 400px;"><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="new">
                <div id="posting" class="post">
                    <?php
                        $msg = '';
                    ?>
                    <form class="query" action="posting.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="caption" placeholder="What are you thinking?" required/>
                        <img id="pic" src="imgfolder/bg.jpg" width="100%" height="100px"/>
                        <input type="file" name="image" onchange="view()"/>
                        <select name="tag">
                            <option value="">-- Select Tag --</option>
                            <option value="Original Content">Original Content</option>
                            <option value="Meme">Meme</option>
                            <option value="News">News</option>
                            <option value="Discussion">Discussion</option>
                            <option value="Media">Media</option>
                            <option value="Rule">Rule</option>
                            <option value="Others">Others</option>
                        </select>
                        <div class="divider">
                            <div class="warning">Images should not be more than 1 MB. PNG only.</div>
                            <input type="submit" value="POST">
                        </div>
                    </form>
                </div>
                <div class="rev">
                    <?php
                        $i=0;
                        if ($r = mysqli_num_rows($checkPosts) > 0){
                            while($row = mysqli_fetch_array($result)) {
                        ?>
                    <div id="posting" class="content">
                        <div class="ups">
                            <form action="like.php" method="POST">
                                <input hidden text="text" name="pidd" value="<?php echo $row["pid"] ?>">
                                <button type="submit"  name="like" value=""><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>
                            </form>
                            <?php
                                $lpid = $row["pid"];
                                $name = $row["username"];
                                $lnam = $_SESSION["username"];

                                $countq = mysqli_query($d, "SELECT * FROM likes WHERE pid = '$lpid'");
                                $counting = mysqli_num_rows($countq);

                                $countd = mysqli_query($d, "SELECT * FROM dislikes WHERE pid = '$lpid'");
                                $countingd = mysqli_num_rows($countd);

                                $sum = $counting - $countingd;

                                $got = mysqli_query($d,"SELECT * FROM users WHERE username = '$name'");
                                $rowA = mysqli_fetch_array($got);
                                $gotcha = $rowA['image'];
                                $def = 'https://i.imgur.com/qiwcrKS.png';
                            ?>
                            <div class="onetwothree"><?php echo "$sum"; ?></div>
                            <form action="dislike.php" method="POST">
                                <input hidden text="text" name="pidd" value="<?php echo $row["pid"] ?>">
                                <button type="submit"  name="dislike" value=""><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="actual">
                            <div class="hehe">
                                <div class="pfp">
                                    <?php 
                                        if($gotcha == $def){
                                            echo '<img id="hatdog" src="'.$gotcha.'" width="25px" height="25px"/>';
                                        }
                                        else{
                                        echo '<img id="hatdog" src="data:image/jpeg;base64,'.base64_encode($gotcha).'" width="25px" height="25px"/>';
                                        } ?>
                                </div>
                                <div class="prof">
                                    <div class="sep">
                                        <b><?php echo $row["username"] ?></b>
                                        <?php 
                                            $checkDel = $row["username"];
                                            $checkDel2 = $_SESSION["username"];
                                            if($checkDel == $checkDel2){
                                        ?>
                                        <form style="width: 25px" action="del.php" method="POST">
                                            <input hidden text="text" name="pidd" value="<?php echo $row["pid"] ?>">
                                            <button type="submit" name="del" value=""><i class="fa fa-trash-o"></i></button>
                                        </form>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="push"><?php echo $row["txt"] ?></div>
                            <div class="what">
                                <?php if(!empty($row["tags"]) && $row["tags"] != ""){ ?>
                                <div class="flair"><?php echo $row["tags"] ?></div>
                                <?php } ?>
                                <div class="aimg">
                                    <div class="pimg">
                                        <?php echo '<img class="daimg" style="max-width:100%" src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />'; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $poidd = $row["pid"];
                                $j = 0;
                                
                                $checkComms = mysqli_query($d, "SELECT * FROM comments WHERE pid = $poidd");
                                $resultt = mysqli_query($d, "SELECT * FROM comments WHERE pid = $poidd");
                                
                            ?>
                            <div class="commit">
                                <?php
                                    if ($rr = mysqli_num_rows($checkComms) > 0){
                                        while($roww = mysqli_fetch_array($resultt)){
                                ?>
                                <div class="commend" id="below">
                                    <div class="CUser">
                                        <div class="sep">
                                            <b><?php echo $roww['username']?></b>
                                            <?php
                                                $checkDelP = $roww["username"];
                                                if($checkDelP == $checkDel2){
                                            ?>
                                            <form style="width: 25px" action="del.php" method="POST">
                                                <input hidden text="text" name="pidd" value="<?php echo $row["pid"] ?>">
                                                <button type="submit" name="delP" value=""><i class="fa fa-trash-o"></i></button>
                                            </form>
                                            <?php
                                            } ?>
                                        </div>
                                        <div class="Ccom"><?php echo $roww['cmt']?></div>
                                    </div>
                                </div>
                                <?php }
                                    $j++;
                                } ?>
                                <form class="commentt" action="comm.php" method="POST">
                                    <input type="text" name="ct" placeholder="Write a comment..."/>
                                    <input hidden text="text" name="pid" value="<?php echo $row["pid"] ?>">
                                    <input type="submit" value="COMMENT" name="com">
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        $i++;
                            }
                        }
                        else{
                    ?>
                    <div id="posting" class="empty">There's nothing here... Why not make a post?</div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="side">
                <a href="https://www.youtube.com/watch?v=XZ0SXsgMZ8c" class="he"><div id="posting" class="stick">Ads</div></a>
                <a href="https://www.youtube.com/watch?v=Nx3a9AVbk6I" class="hey"><div id="posting" class="sticka">Ads</div></a>
                <!-- Last ad's hitbox is intended to replicate the advertisments' annoying nature. -->
            </div>
        </section>
    </body>
</html>