<?php 
    ini_set("display_errors", "off");
    include_once ('bts/connect_db.php');
    
    $url = basename($_SERVER['PHP_SELF']);
    $query = $_SERVER['QUERY_STRING'];
    if($query){
    $url .= "?".$query;
    }
    $_SESSION['current_page'] = $url;

    $id = mysqli_real_escape_string($con, $_GET['id']);
    $sql = mysqli_query($con, "SELECT * FROM posts WHERE pid = '$id'");
    $row = mysqli_fetch_assoc($sql);
    $cid = $row["pid"];

    $uid = mysqli_query($con, "SELECT * FROM users WHERE id = '$cid'");
    $roww = mysqli_fetch_assoc($uid);

    // This is where pfp gets itself
    $getpost = mysqli_query($con, "SELECT * FROM comments WHERE pid = '$id'");
    $rowcomms = mysqli_fetch_assoc($getpost);
    $user = $rowcomms["username"];
    // Default pfp
    $def = 'https://i.imgur.com/qiwcrKS.png';

    $getpfp = mysqli_query($con, "SELECT * FROM users WHERE username = '$user'");
    $rowuser = mysqli_fetch_assoc($getpfp);
    $postuserid = $rowuser["id"];
    $pfp = $rowuser["prof_pic"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php
        if(!empty($row['title'])){
            echo $row['title'];
        }else{
            echo 'Untitled';
        } 
    ?> | Lucat</title>
    <?php include("bts/links.php") ?>
    <link href="Styles/global.css" rel="stylesheet">
    <link href="Styles/viewpost.css" rel="stylesheet">
</head>
<body>
    <?php include("bts/navbar.php") ?>
    <?php 
        if(mysqli_num_rows($sql) > 0){
    ?>
    <!-- Display Image and Info -->
    <div class="beeg_content">
        <div class="view">
            <div class="daborder">
                <!-- Image -->
                <div class="content">
                    <div class="view_img">
                    <?php echo '<img class="jezuki" src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />';?>
                    </div>
                </div>
                <!-- Information -->
                <div>
                    <div class="view_title">
                        <div class="view_info py-4 px-5 bg-light">
                            <b style="position: relative;"><?php echo '<div style="font-size:25px">'.$row['title'].'</div>';?>
                            <?php if (isset($_SESSION['id'])){ 
                                    $pid = $row['pid']; $uid = $_SESSION['id'];
                                    $checkuser = mysqli_query($con,"SELECT * FROM heart WHERE pid = '$pid' AND id = '$uid'");
                                    $lied = mysqli_fetch_array($checkuser);
                                    $liked = $lied['liked'];
                                    ?>
                                    <div id="inner">
                                    <form action="heart.php" class="peace" method="POST">
                                        <input hidden class="ping" type="text" name="Love" value="<?php echo $row["pid"] ?>">
                                        <input hidden class="ing" type="text" name="You" value="<?php echo $_SESSION["id"] ?>">
                                        <button type="submit" id="hat" class="hato">
                                        <?php if ($liked == NULL){ ?>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        <?php } else{ ?>
                                            <i class="fa fa-heart activate" aria-hidden="true"></i>
                                        <?php 
                                        } ?>
                                        </button>
                                    </form>
                                    </div>
                                <?php } ?>
                            </b>
                            <div class="d-flex justify-content-between mt-1 mb-2">
                                <span class="date-time">
                                    <?php echo '<div> by ';
                                        if($roww['prof_pic'] == $def){
                                            echo '<img id="hatdog" src="'.$roww['prof_pic'].'" width="25px" height="25px"/>';
                                        } else{
                                            echo '<img src="data:image/jpeg;base64,'.base64_encode($roww['prof_pic']).'" />';
                                        } 
                                    echo ' <a href="profile.php?id='.$row['id'].'">'.$row['username'].'</a></div>';?>
                                </span>
                                <span class="view_date"><u><?php echo '<div>'.$row['dateCreated'].'</div>';?></u></span>
                            </div>
                            <!-- Tags -->
                            <div class="view_tags">
                                <?php 
                                    $getpostid = mysqli_query($con, "SELECT * FROM tagged WHERE pid = '$cid'"); 
                                    while($rowws = mysqli_fetch_array($getpostid)){
                                ?>
                                    <div class="view_tag"><a href="?tag=<?php echo $rowws['tag']; ?>"><div class="scp"><?php echo $rowws['tag'];?></div></a></div>
                                <?php 
                                    }
                                ?>
                            </div>
                            <script>
                                var colors = ['#8cd6ab', '#F6A42E', '#BBEECC', '#FCB293', '#FCB293', '#FCB293'];
                                $(".view_tag").hover(function () {
                                    $(this).css("background-color", colors[(Math.random() * colors.length) | 0]);
                                }, function () {
                                    $(this).css("background-color", "");
                                });
                            </script>
                            <p class="mt-3 fs-5">"<?php echo $row['txt'];?>"</p>
                        </div>
                        <!-- Comments -->
                        <div class="view_comments py-4 px-5 bg-light">
                            <h3 class="fs-5 fw-normal">Comments</h3>
                            <!-- Comments Form -->
                            <form class="commentt" action="comment.php" method="POST">
                                <input text="text" name="pid" value="<?php echo $cid ?>" hidden>
                                <input type="text" name="ct" class="com_size px-4 py-3" placeholder="Write a comment..."  autocomplete="off"/>
                                <input type="submit" name="com" class="com_sub px-4 py-3" value="COMMENT">
                            </form>
                            <div class="coom_section">
                                <?php
                                    $checkDel = $row["username"];
                                    $checkDel2 = $_SESSION["username"];
                                    $j = 0;
                                    
                                    $checkComms = mysqli_query($con, "SELECT * FROM comments WHERE pid = $cid");
                                    $resultt = mysqli_query($con, "SELECT * FROM comments WHERE pid = $cid");
                                    $def = 'https://i.imgur.com/qiwcrKS.png';
                                    
                                ?>
                                <?php
                                    if (mysqli_num_rows($checkComms) > 0){
                                        while($roww = mysqli_fetch_array($resultt)){
                                ?>
                                <!-- Actual Comments -->
                                <div class="commend" id="below">
                                    <div class="CUser">
                                        <div class="sep">
                                            <?php if($pfp == $def){
                                                echo '<img id="hatdog" src="'.$pfp.'" width="25px" height="25px"/>';
                                                }else{
                                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($pfp).'" />';
                                                } 
                                            ?>
                                            <b><u><a href="profile.php?id=<?php echo $postuserid ?>"><?php echo $roww['username']?></a></u></b>
                                            <?php
                                                $checkDelP = $roww["username"];
                                                if($checkDelP == $checkDel2){
                                            ?>
                                            <!-- This is trash function, if thy want it -->
                                            <!-- <form style="width: 25px" action="del.php" method="POST">
                                                <input hidden text="text" name="pidd" value="<?php //echo $row["pid"] ?>">
                                                <button type="submit" name="delP" value=""><i class="fa fa-trash-o"></i></button>
                                            </form> -->
                                            <?php
                                            } ?>
                                        </div>
                                        <div class="Ccom">
                                            <?php echo $roww['cmt'];?>
                                        </div>
                                    </div>
                                </div>
                                <?php  }  $j++;  } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                } if(mysqli_num_rows($sql) == 0){
            ?>
                <div class="content"><div class="view_img">Item does not exist.</div></div>
            <?php
                }
            ?>
        </div>
        <div class="epal">
          <div class="ad-long">
            <div id="advert" class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/poster-long-1.png" style="width:100%">
              <img class="mySlides" src="img/poster-long-2.png" style="width:100%">
            </div>
          </div>
        </div>
    </div>
    <script src="Javascript/ads-normal.js"></script>
    <?php include("bts/footer.php") ?>
</body>
</html>