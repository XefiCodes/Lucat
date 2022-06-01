<?php
    include_once 'bts/connect_db.php';
    ini_set("display_errors", "off");

    $result = mysqli_query($con,"SELECT * FROM posts");
    $resultt = mysqli_query($con,"SELECT * FROM posts");
    $checkPosts = mysqli_query($con, "SELECT * FROM posts");

    // $resultag = mysqli_query($con,"SELECT * FROM tags");
    // $checkTags = mysqli_query($con, "SELECT * FROM tags");

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
                if(mysqli_num_rows($checkPosts) > 0){ 
                    while($row = mysqli_fetch_array($result)){ 
                        if (!empty($row['tag'])){
            ?>
                <a class="tags" href="gallery.php?tag=<?php echo $row['tag'] ?>"><?php echo $row['tag'] ?></a>
            <?php       }
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
                    while($row = mysqli_fetch_array($resultt)) {
                ?>
                <?php echo '<a href="viewpost.php?id='.$row['pid'].'" class="cover">';
                      echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" /></a>'; ?>
                <?php
                    $i++;
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
    <?php include("bts/footer.php") ?>
</body>  
</html>


<!-- LEAVE maybe just let it be its just jpeg ok we leave jpeg alone now but we should encourage png on submission yes -->