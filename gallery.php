<?php
    include_once 'bts/connect_db.php';
    $fetch = mysqli_query($con, "SELECT * FROM posts");
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
            <?php 
                // $i=0;
                // while($row = mysqli_fetch_array($fetch)) {
            ?>
                <!-- <a href="#" class="cover"> -->
                <?php 
                // echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" />'; ?>
            <?php
                // $i++;
                // }
            ?>
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
    <?php include("bts/footer.php") ?>
</body>  
</html>


<!-- LEAVE maybe just let it be its just jpeg ok we leave jpeg alone now but we should encourage png on submission yes -->