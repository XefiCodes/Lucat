<!DOCTYPE html>
<html lang="en">
<head>
    <title>Commissions | Lucat</title>
    <?php include("bts/links.php") ?>
    <link href="Styles/gallery.css" rel="stylesheet">
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
    <?php include("bts/footer.php") ?>
</body>  
</html>


<!-- LEAVE maybe just let it be its just jpeg ok we leave jpeg alone now but we should encourage png on submission yes -->