<?php 
    ini_set("display_errors", "off");
    include_once ('bts/connect_db.php');

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
    <link href="Styles/commissions.css" rel="stylesheet">
    <link href="Styles/viewpost.css" rel="stylesheet">
</head>
<body>
    <?php include("bts/navbar.php") ?>
    <?php 
        if(mysqli_num_rows($sql) > 0){
    ?>
    <!-- ad -->
    <!-- Display Image and Info -->
    <div class="beeg_content">
        <div class="view">
        <div class="daborder">
        <div class="content">
            <div class="view_img">
            <?php echo '<img class="jezuki" src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />';?>
            </div>
        </div>
            <div>
                <div class="view_title"><b>
                <?php echo '<div style="font-size:25px">'.$row['title'].'</div>';?></b>
                <span class="">
                    <?php echo '<div> by ';
                        if($roww['prof_pic'] == $def){
                            echo '<img id="hatdog" src="'.$roww['prof_pic'].'" width="25px" height="25px"/>';
                        }else{
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($roww['prof_pic']).'" />';
                        } 
                        echo ' <a href="profile.php?id='.$row['id'].'">'.$row['username'].'</a></div>';?></span>
                <span class="view_date"><u><?php echo '<div>'.$row['username'].'</div>';?></u></span>
            </div>
                <div class="view_txt">
                <?php echo '<div>'.$row['txt'].'</div>';?>
                </div>
        </div>
        <!-- Comments -->
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
                        <!-- <div>_______________________</div> -->
                    </div>
                </div>
            </div>
            <?php  }  $j++;  } ?>
            <form class="commentt" action="comment.php" method="POST">
                <input text="text" name="pid" value="<?php echo $cid ?>" hidden>
                <input type="text" name="ct" class="com_size" placeholder="Write a comment..."  autocomplete="off"/>
                <input type="submit" name="com" class="com_sub" value="COMMENT">
            </form>
        </div>
    </div>
        <?php
            } if(mysqli_num_rows($sql) == 0){
        ?>
            <div class="">Item does not exist.</div>
        <?php
            }
        ?>
    </div>
    <div class="epal">
          <div class="ad-long">
            <div id="advert" class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/old/chad.png" style="width:100%">
              <img class="mySlides" src="img/old/dale.png" style="width:100%">
              <img class="mySlides" src="img/old/Chung.png" style="width:100%">
              <img class="mySlides" src="img/old/black.png" style="width:100%">
            </div>
          </div>
        </div>
    </div>
    <script src="Javascript/ads-normal.js"></script>
    <?php include("bts/footer.php") ?>
</body>
</html>