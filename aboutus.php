<?php include_once ('bts/connect_db.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
    <?php include ('bts/links.php'); ?>
    <link rel="stylesheet" href="Styles/aboutstyle.css">	
	<link rel="stylesheet" href="Styles/global.css">
</head>
<body>
    <?php include ('bts/navbar.php'); ?>
	<div class="row">
	    <div class="slideshow">
            <div class="col-sm-6">
                <img src="img/marc.jpg" title="Example">
                <div class="sl-item-txt">
                <h5>Marc Derequito</h5>
                <p> Business Analyst </p>
                </div>
            </div>
            <div class="col-sm-6">
                <img src="img/nash.jpg" title="Example">
                <div class="sl-item-txt">
                <h5>Nash Insorio</h5>
                    <p>Developer</p>
                </div>    
            </div>
            <div class="col-sm-6">
                <img src="img/kin.jpg" title="Example">
                    <div class="sl-item-txt">
                        <h5>Kin Diaz</h5>
                        <p>Developer</p>
                    </div>
            </div>

            <div class="col-sm-6">
                <img src="img/jan.jpg" title="Example">
                    <div class="sl-item-txt">
                        <h5>Jan Guiterrez</h5>
                        <p>Developer</p>
                    </div>
            </div>
            <div class="col-sm-6">
                <img src="img/thomas.jpg" title="Example">
                    <div class="sl-item-txt">
                        <h5>Thomas Firma</h5>
                        <p>Developer</p>
                    </div>
            </div>
	    </div>
		<div class="col-sm-5">
		    <div class="bottom">		 
			   <h1><strong>Welcome</strong></h1>
			</div>
		</div>
        <?php include ('bts/footer.php'); ?>
	</div>
</body>
</html>