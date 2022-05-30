<!DOCTYPE html>
<html>
    <head>
        <title>Profile | Lucat</title>
        <?php include("bts/links.php") ?>
        <link href="Styles/global.css" rel="stylesheet">
        <link href="Styles/profile.css" rel="stylesheet">
    </head>
    <body>
      <?php include("bts/navbar.php") ?>

      <!-- Gets the data from the database. -->
      <?php
        require 'bts/connect_db.php';
        require 'bts/account_created.php';
        require 'bts/account_login.php';
        include("bts/classes/User.php");

          // Checks if there is a username in the session variable (indicates theres a user).
          if (isset($_SESSION['username'])) {
              $userLoggedIn = $_SESSION['username'];
              $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
              $user = mysqli_fetch_array($user_details_query);
          }
          else {
              // header("Location: index.php"); //If not, redirects the user back to the index page.
          }
        
        $user_data_query = mysqli_query($con, "SELECT username, email, prof_pic, cover_pic, signup_date, tweets, follower_array, following_array, bio, loc, website_link, dob FROM users WHERE username='$userLoggedIn'");
        $row = mysqli_fetch_array($user_data_query);

        $username = $row['username'];
        $email = $row['email'];
        $prof_pic = $row['prof_pic'];
        $cover_pic = $row['cover_pic'];
        $signup_date = $row['signup_date'];
        $tweets = $row['tweets'];
        $follower_array = $row['follower_array'];
        $following_array = $row['following_array'];
        $bio = $row['bio'];
        $loc = $row['loc'];
        $website_link = $row['website_link'];
        $dob = $row['dob'];
      ?>

      <div class="banner" style="background-image: url('<?php echo $cover_pic; ?>');">@<?php echo $username; ?></div>

      <div class="containing">
        <div class="bar">
          <div class="content">
            <ul>
              <li class="active">
                <span>Tweets</span>
                <strong><?php echo $tweets; ?></strong>
              </li>
              <li>
                <span>Followings</span>
                <strong><?php echo $follower_array; ?></strong>
              </li>
              <li>
                <span>Followers</span>
                <strong><?php echo $following_array; ?></strong>
              </li>
              <li>
                <span>Favorites</span>
                <strong>265</strong>
              </li>
              <li>
                <span>Lists</span>
                <strong>8</strong>
              </li>
              <li>
                <span>Moments</span>
                <strong>0</strong>
              </li>
            </ul>
      
          </div>
        </div>
      
        <div class="wrapper-content content">
          <aside class="profile">
            <img src="<?php echo $prof_pic; ?>" alt="João Paulo" class="avatar bg-light" />
            <h1><?php echo $username; ?></h1>
            <span class="username">@<?php echo $username; ?></span>
            <p><?php echo $bio; ?></p>
      
            <ul class="data">
              <li><img src="img/images/place.svg" alt="Place" /><?php echo $loc; ?></li>
              <li><img src="img/images/link.svg" alt="Link" /><?php echo $website_link; ?></li>
              <li><img src="img/images/clock.svg" alt="Joined" /><?php echo $signup_date; ?></li>
              <li><img src="img/images/child.svg" alt="Born" /><?php echo $dob; ?></li>
            </ul>
            <div class="edit-prof">
              <button><a href="edit-profile.php" class="text-decoration-none text-dark">Edit Profile</a></button>
            </div>
          </aside>
      
          <section class="timeline">
            <nav>
              <a href="" class="active">Your Posts</a>
            </nav>
            <ul class="tweets">
              <li>
                <img src="img/old/chad.png" alt="Avatar" class="avatar" />
                <div class="tweet">
                  <div class="info">
                    <a href=""><strong>Benoît Vrins</strong> @Exibit</a>
                    <span>26 janv.</span>
                  </div>
                  <p>
                    I just published “The Belgian Red Cross website : backstage of a revamp like no other”
                  </p>
                  <div class="stats">
                    <a href=""><img src="img/images/comment.svg"> 1</a>
                    <a href=""><img src="img/images/like.svg"> 3</a>
                  </div>
                </div>
              </li>
              </li>
            </ul>

            <ul class="tweets">
              <li>
                <img src="img/old/chad.png" alt="Avatar" class="avatar" />
                <div class="tweet">
                  <div class="info">
                    <a href=""><strong>Benoît Vrins</strong> @Exibit</a>
                    <span>26 janv.</span>
                  </div>
                  <p>
                    I just published “The Belgian Red Cross website : backstage of a revamp like no other”
                  </p>
                  <div class="stats">
                    <a href=""><img src="img/images/comment.svg"> 1</a>
                    <a href=""><img src="img/images/like.svg"> 3</a>
                  </div>
                </div>
              </li>
              </li>
            </ul>

            <ul class="tweets">
              <li>
                <img src="img/old/chad.png" alt="Avatar" class="avatar" />
                <div class="tweet">
                  <div class="info">
                    <a href=""><strong>Benoît Vrins</strong> @Exibit</a>
                    <span>26 janv.</span>
                  </div>
                  <p>
                    I just published “The Belgian Red Cross website : backstage of a revamp like no other”
                  </p>
                  <div class="stats">
                    <a href=""><img src="img/images/comment.svg"> 1</a>
                    <a href=""><img src="img/images/like.svg"> 3</a>
                  </div>
                </div>
              </li>
              </li>
            </ul>

          </section>

          <div class="widget media">
              <strong class="media-title"><img src="img/images/media.svg" alt="Photos and videos" /> Your Photos and videos</strong>
      
              <ul>
                <li></li> 
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>
          </div>
      </div>
    <?php include("bts/footer.php") ?>
    </body>
</html>