<!DOCTYPE html>
<html lang="en">
<head>
    <title>Landing Lucat</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="Styles/index.css" rel="stylesheet">
    <link href="Styles/global.css" rel="stylesheet">
    <link href="Styles/scss/hover.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
              <li><div id="siteName">Lucat</div></li>
              <li><a href="#" class="left">Home</a></li>
              <li><a href="profile.php" class="left">Profile</a></li>
              <li><a href="gallery.php" class="left">Gallery</a></li>
              </ul>
              <ul class="right">
                <li><a href="#" class="sub">Submit</a></li>
                <li><a href="commissions.php" class="com">Commissions</a></li>
                <!-- <li><a href="#" class="sub">me</a></li> -->
              </ul>
            </ul>
        </nav>
    </header>

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
          <a class="featureHeader footer-right link-col" href="gallery.html"><b>See all</b></a>
        </div>
        <div class="container-fluid" style="width:80%">
          <div class="row gap">
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
          </div>
        </div>
      </div>

      <!-- Tags -->
      <section id="Tag" class="margin">
        <div class="header-fluid headering">
          <h2 class="featureHeader">Tags</h2>
          <a class="featureHeader footer-right link-col" href="gallery.html"><b>Go to Gallery</b></a>
        </div>
        <div class="tag-fluidity" style="width: 80%;">
            <div class="tag-fluid">
              <button class="btn"> 
                <a class="imag" href="gallery.html">
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
            <h2 class="featureHeader">Submissions</h2>
            <a class="featureHeader footer-right link-col" href="commissions.html"><b>See all</b></a>
          </div>
          <div class="container-fluid" style="width:80%">
            <div class="row gap">
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
            </div>
          </div>
        </div>

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
      <footer class="footer-distributed">
        <div class="footer-right">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
          <a href="#"><i class="fab fa-github"></i></a>
        </div>
			<div class="footer-left">
				<p class="footer-links">
					<a class="link-1" href="aboutus.html">About Us</a>
					<a href="#">Term of Service</a>
					<a href="#">Support Us</a>
				</p>
				<p>Lucat &copy; 2022  Literally 1984</p>
			</div>
		</footer>
</body>
</html>