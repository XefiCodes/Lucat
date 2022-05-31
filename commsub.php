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
        <script>
            function view() {
                pic.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    </head>
    <body>
        <?php include("bts/navbar.php") ?>
        <script>
            $(document).ready(function(){
                $('#togol').click(function(){
                    $('#ill').toggle();
                    // $('#com').toggle();
                });
            });
        </script>
        <!-- <button id="togol"></button> -->
        <!-- Commissions Form -->
        <form id="com" class="query" action="comms.php" method="POST" enctype="multipart/form-data">
            <img id="pic" src="img/upload.png" width="50vw" height="50px" style=" margin-left : 23vw; border-style:none; " />
            <input type="file" name="image" onchange="view()" style=" margin-top: auto;" />
            <input type="text" name="title" placeholder="Title" style=" margin-left : 12vw; " required/>
            <input type="text" name="caption" placeholder="Description" style=" margin-left : 12vw; "/>
            <input type="text" name="min" placeholder="Lowest" style=" margin-left : 12vw; " required/>
            <input type="text" name="max" placeholder="Highest" style=" margin-left : 12vw; "/>
            <input type="checkbox" name="status" style=" margin-left : 12vw; " value="Artist"/> Looking for clients?
            <div class="divider">
                <div class="warning">Images should not be more than 1 MB. PNG only.</div>
                <input type="submit" name="comms">
            </div>
        </form>
        <!-- Footer -->
        <?php include("bts/footer.php") ?>
    </body>
</html>