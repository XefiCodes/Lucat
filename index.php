<?php
    ini_set("display_errors", "off");

    include_once 'bts/connect_db.php';

    $url = basename($_SERVER['PHP_SELF']);
    $query = $_SERVER['QUERY_STRING'];
    if($query){
    $url .= "?".$query;
    }
    $_SESSION['current_page'] = $url;

    $result = mysqli_query($con,"SELECT * FROM posts LIMIT 8");
    $resultt = mysqli_query($con,"SELECT * FROM posts ORDER BY dateCreated DESC LIMIT 8");
    $resulttag = mysqli_query($con,"SELECT * FROM tags LIMIT 4");
    $checkPosts = mysqli_query($con, "SELECT * FROM posts");

    $carosel = mysqli_query($con,"SELECT * FROM posts LIMIT 4");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lucat</title>
    <?php include("bts/links.php") ?>
    <link href="Styles/index.css" rel="stylesheet">
    <link href="Styles/global.css" rel="stylesheet">
    <link href="Styles/scss/hover.css" rel="stylesheet">
</head>
<body>
    <?php include("bts/navbar.php") ?>
    <div class="content">
    <!-- Carousel -->
      <div class="dividerTop">
        <div id="topIndex" class="margin">
          <div class="carousel-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="width:90%; height:450px; border-radius:10px; margin-top:20px; position: relative;"> 
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <?php 
                        $n = 0;
                        while($row = mysqli_fetch_array($result)) {
                          if ($n = 1){
                  ?>
                  <div class="carousel-item active">
                    <?php echo '<img class="d-block banner" src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />';?>
                  </div>
                  <?php
                          } else {
                  ?>
                  <div class="carousel-item">
                    <?php echo '<img class="d-block banner" src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />';?>
                  </div>
                  <?php }$n++;} ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
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
      <!-- Discover -->
      <div class="discover margin">
        <div class="header-fluid headering">
          <h2 class="featureHeader">Discover</h2>
          <a class="featureHeader footer-right link-col" href="gallery.php"><b>See all</b></a>
        </div>
        <div class="container-fluid" style="width:80%">
          <div class="row gap">
            <?php
              $i=0;
              if (mysqli_num_rows($checkPosts) > 0){
                  while($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-md-4 first">
              <?php echo '<a href="viewpost.php?id='.$row['pid'].'" class="cover">'?>
                <div class="coll">
                  <?php echo '<img class="jezuki" src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />';?>
                </div>
              </a>
            </div>
            
            <?php
                $i++;
                    }
                }
                else{
            ?>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/Vanellope.png" />
              </div>
            </a>
            <div class="insides"></div>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/cypher.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/whos mario.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/Jail.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/nightmarefule.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/Jail.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/Black Mage FF Final.png" />
              </div>
            </a>
          </div>
        <?php
            }
        ?>
          </div>
        </div>
      </div>
      <!-- Tags -->
      <section id="Tag" class="margin">
        <div class="header-fluid headering">
          <h2 class="featureHeader">Tags</h2>
          <a class="featureHeader footer-right link-col" href="gallery.php"><b>Go to Gallery</b></a>
        </div>
        <div class="tag-fluidity" style="width: 80%;">
          <div class="tag-fluid">
            <?php 
                $i=0;
                $j=0;
                $k=0;
                while($row = mysqli_fetch_array($resulttag)) { 
                  $tagger = $row['tag'];
                  $getpostid = mysqli_query($con, "SELECT * FROM tagged WHERE tag = '$tagger'");
                  while($getTags = mysqli_fetch_array($getpostid)){
                    $getdapid = $getTags['pid'];
                    $getpid = mysqli_query($con, "SELECT * FROM posts WHERE pid = '$getdapid'");
                    while($rows = mysqli_fetch_array($getpid)) {
            ?>
            <div class="btn">
              <a class="imag" href="gallery.php?tag=<?php echo $row['tag']; ?>">
                <?php echo '<img class="tag-img" alt="'.$rows['title'].'" src="data:image/jpeg;base64,'.base64_encode($rows['Image']).'" />';?>
                <div class="hoverTagline"><?php echo $row['tag']; ?></div>
              </a>
            </div>
            <?php }$i++;}$j++;}$k++; ?>
          </div>
        </div>
      </section>

      <!-- Recent Submissions -->
      <div class="discover margin">
        <div class="header-fluid headering">
          <h2 class="featureHeader">Discover</h2>
          <a class="featureHeader footer-right link-col" href="gallery.php"><b>See all</b></a>
        </div>
        <div class="container-fluid" style="width:80%">
          <div class="row gap">
            <?php
              $i=0;
              if (mysqli_num_rows($checkPosts) > 0){
                  while($row = mysqli_fetch_array($resultt)) {
            ?>
            <div class="col-md-4 first">
              <?php echo '<a href="viewpost.php?id='.$row['pid'].'" class="cover">'?>
                <div class="coll">
                  <?php echo '<img class="jezuki" src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />';?>
                </div>
              </a>
            </div>
            
            <?php
                $i++;
                    }
                }
                else{
            ?>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/Vanellope.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/cypher.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/whos mario.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/Jail.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/nightmarefule.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/Jail.png" />
              </div>
            </a>
          </div>
          <div class="col-md-4 first">
            <a href="#" class="cover">
              <div class="coll">
                <img class="jezuki" src="img/Black Mage FF Final.png" />
              </div>
            </a>
          </div>
        <?php
            }
        ?>
        </div>
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
    
    <!-- Cat -->
    <div class="catmover">
      <div class="cat">
        <div class="ear ear--left"></div>
        <div class="ear ear--right"></div>
        <div class="face">
          <div class="eye eye--left">
            <div class="eye-pupil"></div>
          </div>
          <div class="eye eye--right">
            <div class="eye-pupil"></div>
          </div>
          <div class="muzzle"></div>
        </div>
      </div>
    </div>
    
    <!-- Footer -->
    <?php include("bts/footer.php") ?>
</body>
</html>
