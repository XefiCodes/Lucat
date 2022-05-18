<!DOCTYPE html>
<html lang="en">
<head>

    <title>Gallery</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="Styles/gallery.css" rel="stylesheet">
    <link href="Styles/global.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
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
                <li><a href="commissions.php" class="com">Commissions</a></li></ul>
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
        <div class="container-fluid">
            <div class="row gap">
                <div class="col-md-4 first" style="background-image: url('img/Pika.png');"><a href="#"></a><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/Chung.png');"><div class="cover"></div></div>
                <div class="col-md-2 first" style="background-image: url('img/chad.png');"><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/a.png');"><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/dale.png');"><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/earth.png');"><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/black.png');"><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/nightmarefule.png');"><div class="cover"></div></div>
                <div class="col-md-2 first" style="background-image: url('img/Chung.png');"><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/earth.png');"><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/black.png');"><div class="cover"></div></div>
                <div class="col-md-2 first" style="background-image: url('img/a.png');"><div class="cover"></div></div>
                <div class="col-md-2 second" style="background-image: url('img/dale.png');"><div class="cover"></div></div>
                <!-- style need  output-->
                <!-- LOOK UP FIGURE tag html -->
            </div>
        </div>
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
            <!-- <script>
                var colors = ['#8cd6ab', '#F6A42E', '#BBEECC', '#FCB293', '#FCB293', '#FCB293'];
                $(".tags").hover(function() {
                    $(this).css("background-color", colors[(Math.random() * colors.length) | 0])
                }, function() {
                    $(this).css("background-color", "")
                });
            </script> -->
          </div></span>
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
                      <p>Lucat &copy; 2022</p>
                  </div>
        </div>

    </footer>

</body>  
</html>


<!-- LEAVE maybe just let it be its just jpeg ok we leave jpeg alone now but we should encourage png on submission yes -->