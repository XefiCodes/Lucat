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
    $result = mysqli_query($d,"SELECT * FROM posts WHERE username = '$name'");
    $checkPosts = mysqli_query($d, "SELECT * FROM posts WHERE username = '$name'");
?>
<html>
    <head>
        <title>ConNet</title>
        <link rel="stylesheet" href="CSS/signupstyle.css">
        <link rel="stylesheet" href="CSS/profile.css">
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
                        $got = mysqli_query($d,"SELECT * FROM users WHERE username = '$name'");
                        $rowA = mysqli_fetch_array($got);
                        $gotcha = $rowA['image'];
                        $def = 'https://i.imgur.com/qiwcrKS.png';

                        $totPosts = mysqli_query($d,"SELECT * FROM posts WHERE username = '$name'");
                        $totalPost = mysqli_num_rows($totPosts);

                        $totComments = mysqli_query($d,"SELECT * FROM comments WHERE username = '$name'");
                        $totalComment = mysqli_num_rows($totComments);
                    ?>
                    <div class="details">
                        <?php 
                            if($gotcha == $def){
                                echo '<img id="hatdog" src="'.$gotcha.'" width="100px" height="100px"/>';
                            }
                            else{
                            echo '<img id="hatdog" src="data:image/jpeg;base64,'.base64_encode($gotcha).'" width="100px" height="100px"/>';
                            } ?>
                        <div class="gap">
                            <b><?php echo $name ?></b>
                            <div class="pag">
                                <div>Posts: <?php echo $totalPost ?></div>
                                <div>Comments: <?php echo $totalComment ?></div>
                            </div>
                        </div>
                    </div>
                    <form class="query" action="edit.php" method="POST">
                        <div class="divider">
                            <div class="warning"> </div>
                            <input type="submit" value="EDIT PROFILE">
                        </div>
                    </form>
                </div>
                <div class="align">Posts</div>
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
                            $lnam = $_SESSION["username"];

                            $countq = mysqli_query($d, "SELECT * FROM likes WHERE pid = '$lpid'");
                            $counting = mysqli_num_rows($countq);

                            $countd = mysqli_query($d, "SELECT * FROM dislikes WHERE pid = '$lpid'");
                            $countingd = mysqli_num_rows($countd);

                            $sum = $counting - $countingd;
                        ?>
                        <div class="onetwothree"><?php echo "$sum"; ?></div>
                        <form action="dislike.php" method="POST">
                            <input hidden text="text" name="pidd" value="<?php echo $row["pid"] ?>">
                            <button type="submit"  name="dislike" value=""><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="actual">
                        <div class="prof"><div class="hehe">
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
                                        <div class="sep"><b><?php echo $roww['username']?></b>
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
                <?php } ?>
                </div>
            </div>
            <div class="side">
                <div>
                    <div class="align">Bio</div>
                    <?php 
                        $checkBio = mysqli_query($d, "SELECT * FROM users WHERE username = '$name'");
                        $rowO = mysqli_fetch_array($checkBio);
                        $display = $rowO['bio'];

                        if (!empty($display) && $display != ''){
                    ?>
                        <div id="under"><div id="posting"><?php echo "<pre>" . $display . "</pre>" ?></div></div>
                    <?php
                        }
                        else{
                    ?>
                    <div id="under"><div id="posting" class="smol">There's nothing interesting here... yet.</div></div>
                    <?php } ?>
                </div>
                <div>
                    <div class="align">Comments</div>
                    <div class="rev" id="under">
                    <?php
                        $k = 0;

                        $checkCommU = mysqli_query($d, "SELECT * FROM comments WHERE username = '$name'");
                        $resultU = mysqli_query($d, "SELECT * FROM comments WHERE username = '$name'");

                        if ($ru = mysqli_num_rows($checkCommU) > 0){
                            while($rowU = mysqli_fetch_array($resultU)){
                    ?>
                    <div id="posting" class="stick">
                        <div class="commendable">
                            <div>
                                <?php 
                                    $l = 0;
                                    $find = $rowU['pid'];
                                    $getP = mysqli_query($d, "SELECT * FROM posts WHERE pid = '$find'");
                                    while($rowI = mysqli_fetch_array($getP)){
                                ?>
                                <div>
                                    <?php echo $rowI['txt']; ?>
                                    <span class="smol">by <?php echo $rowI['username']; ?></span>
                                </div>
                                <?php
                                    } $l++;
                                ?>
                                <div class="commend">
                                    <div class="pads">
                                        <div class="sep">
                                        <b><?php echo $rowU['username']?></b>
                                        <?php
                                            $checkDelP = $rowU["username"];
                                            if($checkDelP == $name){
                                        ?>
                                        <form style="width: 25px" action="del.php" method="POST">
                                            <input hidden text="text" name="pidd" value="<?php echo $rowU["pid"] ?>">
                                            <button type="submit" name="delP" value=""><i class="fa fa-trash-o"></i></button>
                                        </form>
                                        <?php } ?>
                                    </div>
                                    <div class="Ccom"><?php echo $rowU['cmt']?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                        $k++;
                    } else { ?>
                    <div id="under"><div id="posting" class="smol">No comment. At all.</div></div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>