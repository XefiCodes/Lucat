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
            function veiw(){
                pick.src = URL.createObjectURL(event.target.files[0]);
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
        <button id="togol"><a href="commsub.php">Commission Submission Form here</a></button>
        <!-- Illustration Form -->
        <form id="ill" class="query" action="illu.php" method="POST" enctype="multipart/form-data">
            <img id="pic" src="img/upload.png" width="50vw" height="50px" style=" margin-left : 23vw; border-style:none; " />
            <input type="file" name="image" onchange="view()" style=" margin-top: auto;" />
            <input type="text" name="title" placeholder="Title" style=" margin-left : 12vw; " required/>
            <input type="text" name="caption" placeholder="Description" style=" margin-left : 12vw; "/>
            <div class="divider">
                <div class="warning">Images should not be more than 1 MB. PNG only.</div>
                <input type="submit" value="" name="illu">
            </div>
        </form>
        <!-- Footer -->
        <?php include("bts/footer.php") ?>
    </body>
</html>