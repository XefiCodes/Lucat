<?php 
    // ini_set("display_errors", "off");
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

    // This is where pfp gets itself
    $getpost = mysqli_query($con, "SELECT * FROM comments WHERE pid = '$id'");
    $rowcomms = mysqli_fetch_assoc($getpost);
    $user = $rowcomms["username"];

    $getpfp = mysqli_query($con, "SELECT * FROM users WHERE username = '$user'");
    $rowuser = mysqli_fetch_assoc($getpfp);
    $pfp = $rowuser["prof_pic"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $row['title']; ?> | Lucat</title>
    <?php include("bts/links.php") ?>
    <link href="Styles/global.css" rel="stylesheet">
    <link href="Styles/commissions.css" rel="stylesheet">
</head>
<body>
    <?php include("bts/navbar.php") ?>
    <?php 
        if(mysqli_num_rows($sql) > 0){
    ?>
    <!-- Display Image and Info -->
    <div class="daborder">
        <div class="content">
            <?php echo '<img class="jezuki" src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />';?>
            <div>
                <?php echo '<div>'.$row['title'].'</div>';?>
                <?php echo '<div>'.$row['username'].'</div>';?>
                <?php echo '<div>'.$row['txt'].'</div>';?>
            </div>
        </div>
        <!-- Comments -->
        <div>
            <?php
                $checkDel = $row["username"];
                $checkDel2 = $_SESSION["username"];
                $j = 0;
                
                $checkComms = mysqli_query($con, "SELECT * FROM comments WHERE pid = $cid");
                $resultt = mysqli_query($con, "SELECT * FROM comments WHERE pid = $cid");
                
            ?>
            <?php
                if (mysqli_num_rows($checkComms) > 0){
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
                        <!-- This is trash function, if thy want it -->
                        <!-- <form style="width: 25px" action="del.php" method="POST">
                            <input hidden text="text" name="pidd" value="<?php //echo $row["pid"] ?>">
                            <button type="submit" name="delP" value=""><i class="fa fa-trash-o"></i></button>
                        </form> -->
                        <?php
                        } ?>
                    </div>
                    <div class="Ccom">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($pfp).'" />';?>
                        <?php echo $roww['cmt'];?>
                    </div>
                </div>
            </div>
            <?php  }  $j++;  } ?>
            <form class="commentt" action="comment.php" method="POST">
                <input text="text" name="pid" value="<?php echo $cid ?>" hidden>
                <input type="text" name="ct" placeholder="Write a comment..."  autocomplete="off"/>
                <input type="submit" name="com" value="COMMENT">
            </form>
        </div>
        <?php
            } if(mysqli_num_rows($sql) == 0){
        ?>
            <div class="">Item does not exist.</div>
        <?php
            }
        ?>
        
    </div>
    <?php include("bts/footer.php") ?>
</body>
</html>