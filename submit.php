<?php
    include_once ('bts/connect_db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Landing Lucat</title>
        <?php include("bts/links.php") ?>
        <link href="Styles/global.css" rel="stylesheet">
        <link href="Styles/scss/hover.css" rel="stylesheet">
        <link href="Styles/submitstyle.css" rel="stylesheet">
        
    </head>
    <body>
        <?php include("bts/navbar.php") ?>
        <!-- Illustration Form -->
        <form id="ill" class="query" action="bts/submit-photos.php" method="POST" enctype="multipart/form-data">
            <img id="pic" src="img/upload.png" width="50vw" height="50px" style=" margin-left : 23vw; border-style:none; " />
            <input type="file" name="image" onchange="view()" style=" margin-top: auto;" />
            <input type="text" name="title" placeholder="Title" style=" margin-left : 12vw; " required/>
            <input type="text" name="caption" placeholder="Description" style=" margin-left : 12vw; " required/>
            <select name="tag" style=" margin-left: 12vw">
                <option value="">-- Select Tag --</option>
                <option value="Original Content">Original Content</option>
                <option value="Meme">Tag</option>
                <option value="News">Tag</option>
                <option value="Discussion">Tag</option>
                <option value="Media">Tag</option>
                <option value="Rule">Tag</option>
                <option value="Others">Tag</option>
            </select>
            <div class="divider">
                <div class="warning">Images should not be more than 1 MB. PNG only.</div>
                <input type="submit" value="POST" >
            </div>
        </form>
        <!-- Commissions Form -->
        <form id="com" class="query" action="bts/submit-commissions.php" method="POST" enctype="multipart/form-data">
            <img id="pic" src="img/upload.png" width="50vw" height="50px" style=" margin-left : 23vw; border-style:none; " />
            <input type="file" name="imageC" onchange="view()" style=" margin-top: auto;" />
            <input type="text" name="titleC" placeholder="Title" style=" margin-left : 12vw; " required/>
            <input type="text" name="captionC" placeholder="Description" style=" margin-left : 12vw; " required/>
            <select name="tag" style=" margin-left: 12vw">
                <option value="">-- Select Tag --</option>
                <option value="Original Content">Original Content</option>
                <option value="Meme">Tag</option>
                <option value="News">Tag</option>
                <option value="Discussion">Tag</option>
                <option value="Media">Tag</option>
                <option value="Rule">Tag</option>
                <option value="Others">Tag</option>
            </select>
            <div class="divider">
                <div class="warning">Images should not be more than 1 MB. PNG only.</div>
                <input type="submit" value="POST" >
            </div>
        </form>
        <!-- Footer -->
        <?php include("bts/footer.php") ?>
    </body>
</html>