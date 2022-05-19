<!DOCTYPE html>
<html lang="en">
<head>
    <title>Commissions</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="Styles/global.css" rel="stylesheet">
    <link href="Styles/commissions.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><div id="siteName">Lucat</div></li>
                <li><a href="index.php" class="left">Home</a></li>
                <li><a href="profile.php" class="left">Profile</a></li> 
                <li><a href="gallery.php" class="left">Gallery</a></li>
                </ul><ul class="right">
                <li><a href="#" class="sub">Submit</a></li>
                <li><a href="#" class="com">Commissions</a></li></ul>
            </ul>
        </nav>
    </header>
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
        <div class="header-fluid headering">
            <h2 class="featureHeader">Featured</h2>
            <a class="featureHeader footer-right link-col" href="commissionB.php"><b>See all</b></a>
        </div>
        <div class="card-container">
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
        </div>
        <div class="header-fluid headering">
            <h2 class="featureHeader">Looking for Artists</h2>
            <a class="featureHeader footer-right link-col" href="commissionB.html"><b>See all</b></a>
        </div>
        <div class="card-container">
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
        </div>
        <div class="header-fluid headering">
            <h2 class="featureHeader">Looking for Clients</h2>
            <a class="featureHeader footer-right link-col" href="commissionB.html"><b>See all</b></a>
        </div>
        <div class="card-container">
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
        </div>
    </div>
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
					<a href="gallery.html">Term of Service</a>
					<a href="#">Support Us</a>
				</p>
				<p>Lucat &copy; 2022  Literally 1984</p>
			</div>
		</footer>
</body>
</html>

<!-- THere will be option to be notified if commission open -->
<!-- Only static images will be advertised atm -->
<!-- Have advertisers follow a fixed image dimensions if submitting ads -->