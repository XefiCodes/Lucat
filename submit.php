
<?php
    include_once 'connect_db.php';

    if (!empty($_FILES['image']['name'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $_FILES['image']['tmp_name'];
            $fimg = file_get_contents($img);
            $name = $_SESSION["username"];
            $cap = $_POST['caption'];
            $tag = $_POST['tag']; 

            $sql = "insert into posts (image,username,txt, tags) values(?,'$name','$cap', '$tag')";
            $getimg = mysqli_prepare($d,$sql);
            mysqli_stmt_bind_param($getimg, "s" ,$fimg);
            mysqli_stmt_execute($getimg);
            $check = mysqli_stmt_affected_rows($getimg);

            if ($check == 1) {
                header('location:submit.php');
            }
            else {
                header('location:submit.php');
                $msg = 'Error uploading image';
            }
        }
        else {
            header('location:submit.php');
            $msg = 'Error uploading image';
        }
    }
    else {
        header('location:submit.php');
        $msg = 'Error uploading image';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Landing Lucat</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="Styles/global.css" rel="stylesheet">
    <link href="Styles/scss/hover.css" rel="stylesheet">
    <link href="Styles/submitstyle.css" rel="stylesheet">
    
    
</head>



<body>
    
<header>
        <nav>
            <ul>
              <li><div id="siteName">Lucat</div></li>
              <li><a href="index.html" class="left">Home</a></li>
              <li><a href="profile.html" class="left">Profile</a></li>
              <li><a href="gallery.html" class="left">Gallery</a></li>
              </ul>
              <ul class="right">
                <li><a href="submit.html" class="sub">Submit</a></li>
                <li><a href="commissions.html" class="com">Commissions</a></li>
                <!-- <li><a href="#" class="sub">me</a></li> -->
              </ul>
            </ul>
        </nav>
</header>


<form class="query" action="submit.html" method="POST" enctype="multipart/form-data">
  <input type="text" name="caption" placeholder="What are you thinking?" style=" margin-left : 12vw; " required/>
  <img id="pic" src="img/upload.png" width="50vw" height="50px" style=" margin-left : 23vw; border-style:none; " />
  <input type="file" name="image" onchange="view()" style=" margin-top: auto;" />
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
					<a href="#">Term of Service</a>
					<a href="#">Support Us</a>
				</p>
				<p>Lucat &copy; 2022  Literally 1984</p>
			</div>
		</footer>

</body>


</html>