<?php 
    include_once 'bts/connect_db.php';

    $resultt = mysqli_query($con,"SELECT * FROM commissions");
    
    $checkPosts = mysqli_query($con, "SELECT * FROM commissions");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Commissions | Lucat</title>
    <?php include("bts/links.php") ?>
    <link href="Styles/commissions.css" rel="stylesheet">
    <!-- <link href="Styles/gallery.css" rel="stylesheet"> -->
    <link href="Styles/global.css" rel="stylesheet">
</head>
<body>
      <?php include("bts/navbar.php") ?>
    <div class="daborder">
        <h2 class="featureHeader"><b>Browse Commissions</b></h2>
            <span><div class="pagination">
            <a class="active" href="#">&laquo;</a>
            <a class="tags" href="#">Tags</a>
            <a class="tags" href="#">Tags</a>
            <a class="tags" href="#">Tags</a>
            <a class="tags" href="#">Tags</a>
            <a class="tags" href="#">Tags</a>
            <a class="tags" href="#">Tags</a>
            <a class="tags" href="#">Tags</a> 
            <a class="tags" href="#">Tags</a>
            <a class="tags" href="#">Tags</a>
            <a class="active" href="#">&raquo;</a>
            <script>
                var colors = ['#8cd6ab', '#F6A42E', '#BBEECC', '#FCB293', '#FCB293', '#FCB293'];
                $(".tags").hover(function() {
                    $(this).css("background-color", colors[(Math.random() * colors.length) | 0])
                }, function() {
                    $(this).css("background-color", "")
                });
            </script>
            </div></span>
            <div class="">
                <div class="row gap">
                <div class="card-container" style="margin-top: 20px;">
                    <?php
                    $i=0;
                    if (mysqli_num_rows($checkPosts) > 0){
                        while($row = mysqli_fetch_array($resultt)) {
                            $pfp = $row['id'];
                            $getinfo = mysqli_query($con,"SELECT * FROM users WHERE id = $pfp");
                            $pic = mysqli_fetch_array($getinfo);
                            $def = 'https://i.imgur.com/qiwcrKS.png';
                    ?>
                    <div class="card">
                        <a href="chat.php?id=<?php echo $row['id'] ?>">
                        <div class="card-cover"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />' ?></div>
                            <div class="card-content">
                                <div class="card-seller">
                                <?php 
                                    if($pic['prof_pic'] == $def){
                                        echo '<img id="hatdog" src="'.$pic['prof_pic'].'" width="25px" height="25px"/>';
                                    }else{
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($pic['prof_pic']).'" />';
                                    } ?>
                                    <div>
                                        <h3><?php echo $row['username']; ?></h3>
                                        <p class="level"><?php $row['title'] ?></p>
                                    </div>
                                </div>
                                <p class="card-desc"><?php echo $row['txt'] ?></p> 
                                <div class="card-price">$<?php echo $row['priceMin']; if (!empty($row['priceMax'])){ echo '~' . $row['priceMax'];} ?> </div>
                            </div>
                        </a>
                    </div>
                    <?php
                        $i++;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        </span>
    </div>
    <?php include("bts/footer.php") ?>
</body>  
</html>


<!-- LEAVE maybe just let it be its just jpeg ok we leave jpeg alone now but we should encourage png on submission yes -->