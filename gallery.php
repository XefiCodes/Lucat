<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gallery</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="Styles/justifiedGallery.min.css" rel="stylesheet"> 
    <script src="Javascript/jquery.justifiedGallery.min.js"></script>
    <link href="Styles/scss/galllery.css" rel="stylesheet">
    <link href="Styles/gallery.css" rel="stylesheet">
    <link href="Styles/global.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><div id="siteName">Lucat</div></li>
                <li><a href="index.html" class="left">Home</a></li>
                <li><a href="profile.html" class="left">Profile</a></li> 
                <li><a href="gallery.html" class="left">Gallery</a></li>
                </ul><ul class="right">
                <li><a href="#" class="sub">Submit</a></li>
                <li><a href="commissions.html" class="com">Commissions</a></li></ul>
            </ul>
        </nav>
    </header>
    <div class="daborder">
        <h2 class="featureHeader"><b>Browse</b></h2>
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
                <a href="#" class="cover">
                    <img src="img/Vanellope.png"/>
                </a>
                    <a href="#" class="cover">
                    <img src="img/cypher.png" />
                </a>
                    <a href="#" class="cover">
                    <img src="img/Black Mage FF Final.png" />
                </a>
                    <a href="#" class="cover">
                    <img src="img/cover.jpg" />
                </a>
                    <a href="#" class="cover">
                    <img src="img/Jail.png" />
                </a>
                    <a href="#" class="cover">
                    <img src="http://unsplash.it/560/500?image=677" />
                </a>
                    <a href="#" class="cover">
                    <img src="http://unsplash.it/670/410?image=401" />
                </a>
                    <a href="#" class="cover">
                    <img src="http://unsplash.it/620/340?image=623" />
                </a>
                    <a href="#" class="cover">
                    <img src="http://unsplash.it/790/390?image=339" />
                </a>
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
        <span><div class="pagination page">
            <a class="active" href="#">&laquo;</a>
            <a class="pageNo" href="#">1</a>
            <a class="pageNo" href="#">2</a>
            <a class="pageNo" href="#">3</a>
            <a class="pageNo" href="#">4</a>
            <a class="pageNo" href="#">5</a>
            <a class="pageNo" href="#">6</a>
            <a class="pageNo" href="#">7</a>
            <a class="pageNo" href="#">8</a>
            <a class="pageNo" href="#">9</a>
            <a class="active" href="#">&raquo;</a>
        </div></span>
        <script>
            var colors = ['#8cd6ab', '#F6A42E', '#BBEECC', '#FCB293', '#FCB293', '#FCB293'];
            $(".pageNo").hover(function () {
                $(this).css("background-color", colors[(Math.random() * colors.length) | 0]);
            }, function () {
                $(this).css("background-color", "");
            });
        </script>
    </div>
    <footer class="footer-distributed">

        <div class="footer-right">

            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>

        </div>

        <div class="footer-left">
                  <div class="footer-left">
                      <p class="footer-links">
                          <a class="link-1" href="aboutus.html">About Us</a>
                          <a href="gallery.html">Term of Service</a>
                          <a href="#">Support Us</a>
                      </p>
                      <p>Lucat &copy; 2022  Literally 1984</p>
                  </div>
        </div>

    </footer>

</body>  
</html>


<!-- LEAVE maybe just let it be its just jpeg ok we leave jpeg alone now but we should encourage png on submission yes -->