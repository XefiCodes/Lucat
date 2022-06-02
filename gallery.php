<?php
    include_once 'bts/connect_db.php';
    ini_set("display_errors", "off");

    $result = mysqli_query($con,"SELECT * FROM posts");
    $resultt = mysqli_query($con,"SELECT * FROM posts");
    $checkPosts = mysqli_query($con, "SELECT * FROM posts");

    $resultag = mysqli_query($con,"SELECT * FROM tags");
    $checkTags = mysqli_query($con, "SELECT * FROM tags");

    $curTag = mysqli_real_escape_string($con, $_GET['tag']);
    $checkcurTag = mysqli_query($con, "SELECT * FROM tagged where tag = '$curTag'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gallery | Lucat</title>
    <?php include("bts/links.php") ?>
    <link href="Styles/scss/galllery.css" rel="stylesheet">
    <link href="Styles/gallery.css" rel="stylesheet">
    <link href="Styles/global.css" rel="stylesheet">
</head>
<body>
    <?php include("bts/navbar.php") ?>
    <div class="daborder">
        <h2 class="featureHeader"><b>Browse</b></h2>
            <span><div class="pagination">
            <a class="active" href="#">&laquo;</a>
            <?php $x=0; 
            
                if(mysqli_num_rows($checkTags) > 0){ 
                    while($rowt = mysqli_fetch_array($resultag)) {
                        if(isset($curTag)){
                            if($rowt['tag'] == $curTag){
            ?>
                <a class="tags active" href="gallery.php"><?php echo $rowt['tag'] ?></a>
            <?php
                        }
            ?>
            <?php
                    }
            ?>
                <a class="tags" href="?tag=<?php echo $rowt['tag'] ?>"><?php echo $rowt['tag'] ?></a>
            <?php
                    }$x++;
                } ?>
            <a class="active" href="#">&raquo;</a>
            </div></span>
            <script>
                var colors = ['#8cd6ab', '#F6A42E', '#BBEECC', '#FCB293', '#FCB293', '#FCB293'];
                $(".tags").hover(function () {
                    $(this).css("background-color", colors[(Math.random() * colors.length) | 0]);
                }, function () {
                    $(this).css("background-color", "");
                });
            </script>
        <div class="container-fluid">
            <div id="mygallery" class="justified-gallery">
                <?php 
                    $i=0;
                    $j=0;
                    $k = 0;
                    if(!empty($curTag)){
                        if (mysqli_num_rows($checkcurTag) > 0){
                            $getpostid = mysqli_query($con, "SELECT * FROM tagged WHERE tag = '$curTag'");
                            while($getTags = mysqli_fetch_array($getpostid)){
                                $getdapid = $getTags['pid'];
                                $getpid = mysqli_query($con, "SELECT * FROM posts WHERE pid = '$getdapid'");
                                while($rows = mysqli_fetch_array($getpid)) {
                                        echo '<a href="viewpost.php?id='.$rows['pid'].'" class="cover">';
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($rows['Image']).'" /></a>';
                                }$j++;
                            }$k++;
                        }
                        else{
                        ?><div>There's nothing here...</div>
                        <?php
                            }
                        }
                        else{
                            if (mysqli_num_rows($checkPosts) > 0){
                                while($row = mysqli_fetch_array($result)) {
                                    echo '<a href="viewpost.php?id='.$row['pid'].'" class="cover">';
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" /></a>';
                                }$i++;
                            }
                        }
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#mygallery").justifiedGallery({
                    rowHeight : 250,
                    maxrowHeight : 250,
                    lastRow : 'center',
                    margins : 15
                    // sizeRangeSuffixes: {
                    //     100: '_t',
                    //     240: '_m',
                    //     320: '_n',
                    //     500: '',
                    //     640: '_z',
                    //     1024: '_b'
                    // }
                });
            });
        </script>
    </div>
      <!-- More Ads -->
      <div class="flex-box">
          <div  class="space ad-normal" data-component="slideshow">
            <div id="advert" class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/promologo.jpg" style="width:100%">
              <img class="mySlides" src="img/promo3.jpg" style="width:100%">
              <img class="mySlides" src="img/promo2.jpg" style="width:100%">
            </div>
          </div>
          <div class="space ad-normal" data-component="slideshow">
            <div id="advert" class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/promologo.jpg" style="width:100%">
              <img class="mySlides" src="img/promo3.jpg" style="width:100%">
              <img class="mySlides" src="img/promo2.jpg" style="width:100%">
            </div>
          </div>
          <div class="space ad-normal" data-component="slideshow">
            <div class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/promologo.jpg" style="width:100%">
              <img class="mySlides" src="img/promo3.jpg" style="width:100%">
              <img class="mySlides" src="img/promo2.jpg" style="width:100%">
            </div>
          </div>
          <div class="space ad-normal" data-component="slideshow">
            <div class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/promologo.jpg" style="width:100%">
              <img class="mySlides" src="img/promo3.jpg" style="width:100%">
              <img class="mySlides" src="img/promo2.jpg" style="width:100%">
            </div>
          </div>
        <script src="Javascript/ads-normal.js"></script>
        </div>
    <?php include("bts/footer.php") ?>
</body>  
</html>


<!-- LEAVE maybe just let it be its just jpeg ok we leave jpeg alone now but we should encourage png on submission yes -->