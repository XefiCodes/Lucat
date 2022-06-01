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
    $resultt = mysqli_query($con,"SELECT * FROM posts LIMIT 8");
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
                  <div class="carousel-item active">
                    <img src="img/whos mario.png" class="d-block banner" alt="IM1">
                  </div>
                  <div class="carousel-item">
                    <img src="img/Jail.png" class="d-block banner" alt="IM2">
                  </div>
                  <div class="carousel-item">
                    <img src="img/cypher.png" class="d-block banner" alt="IM3">
                  </div>
                  <div class="carousel-item">
                    <img src="img/Black Mage FF Final.png" class="d-block banner" alt="IM4">
                  </div>
                  <div class="carousel-item">
                    <img src="img/Vanellope.png" class="d-block banner" alt="IM5">
                  </div>
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
          </div>
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

      <!-- Tags -->
      <section id="Tag" class="margin">
        <div class="header-fluid headering">
          <h2 class="featureHeader">Tags</h2>
          <a class="featureHeader footer-right link-col" href="gallery.php"><b>Go to Gallery</b></a>
        </div>
        <div class="tag-fluidity" style="width: 80%;">
            <div class="tag-fluid">
              <button class="btn"> 
                <a class="imag" href="gallery.php">
                  <img class="tag-img" src="img/topPlaces3.jpg" alt="Snow" style="width: 125%;">
                  <div class="hoverTagline">Tags</div>
                </a>
              </button>
              <button class="btn">
                <a class="imag">
                  <img class="tag-img" src="img/topPlaces3.jpg" alt="Snow" style="width: 125%;">
                  <div class="hoverTagline">Tags</div>
                </a>
              </button>
              <button class="btn"> 
                <a class="imag"> 
                  <img class="tag-img" src="img/topPlaces3.jpg" alt="Snow" style="width: 125%;">
                  <div class="hoverTagline">Tags</div>
                </a>
              </button>
              <button class="btn"> 
                <a class="imag"> 
                  <img class="tag-img" src="img/topPlaces3.jpg" alt="Snow" style="width: 125%;">
                  <div class="hoverTagline">Tags</div>
                </a>
              </button>
              <button class="btn"> 
                <a class="imag"> 
                  <img class="tag-img" src="img/topPlaces3.jpg" alt="Snow" style="width:125%;">
                  <div class="hoverTagline">Tags</div>
                </a>
              </button>
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
          </div>
        </div>
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
      <!-- More Ads -->
      <div class="flex-box">
          <div  class="ad-normal" data-component="slideshow">
            <div id="advert" class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/old/chad.png" style="width:100%">
              <img class="mySlides" src="img/old/dale.png" style="width:100%">
              <img class="mySlides" src="img/old/Chung.png" style="width:100%">
              <img class="mySlides" src="img/old/black.png" style="width:100%">
            </div>
          </div>
          <div class="ad-normal" data-component="slideshow">
            <div id="advert" class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/old/chad.png" style="width:100%">
              <img class="mySlides" src="img/old/dale.png" style="width:100%">
              <img class="mySlides" src="img/old/Chung.png" style="width:100%">
              <img class="mySlides" src="img/old/black.png" style="width:100%">
            </div>
          </div>
          <div class="ad-normal" data-component="slideshow">
            <div class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/old/chad.png" style="width:100%">
              <img class="mySlides" src="img/old/dale.png" style="width:100%">
              <img class="mySlides" src="img/old/Chung.png" style="width:100%">
              <img class="mySlides" src="img/old/black.png" style="width:100%">
            </div>
          </div>
          <div class="ad-normal" data-component="slideshow">
            <div class="advert w3-content w3-display-container">
              <img class="mySlides" src="img/old/chad.png" style="width:100%">
              <img class="mySlides" src="img/old/dale.png" style="width:100%">
              <img class="mySlides" src="img/old/Chung.png" style="width:100%">
              <img class="mySlides" src="img/old/black.png" style="width:100%">
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
