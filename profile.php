<?php
  include_once ('bts/connect_db.php');
?>
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
      <?php
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $sql = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
        $row = mysqli_fetch_assoc($sql);
        $uid = $row["id"];

          // Checks if there is a username in the session variable (indicates theres a user).
          if (isset($id)) {
              // $userLoggedIn = $_SESSION['id'];
          }
          else {
              header("Location: signin.php"); //If not, redirects the user back to the index page.
          }
          
        
        $user_data_query = mysqli_query($con, "SELECT * FROM users WHERE id = '$uid'");
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
        
          // $result = mysqli_query($con,"SELECT * FROM posts");

        $checkPosts = mysqli_query($con, "SELECT * FROM posts WHERE id = '$uid'");
        $user_data_post = mysqli_query($con, "SELECT * FROM posts WHERE id = '$uid'");
        $Countpost = mysqli_num_rows($user_data_post);
      ?>
      <div >
        <div class="banner" style="background-image: url('<?php echo $cover_pic; ?>');">@<?php echo $username; ?></div>
      </div>
      <div class="containing">
        <div class="covering">
          <div class="bar">
            <div class="content">
              <ul>
                <li class="active">
                  <span>Posts</span>
                  <strong><?php echo $Countpost; ?></strong>
                </li>
                <!-- <li>
                  <span>Followings</span>
                  <strong><?php //echo $follower_array; ?></strong>
                </li>
                <li>
                  <span>Followers</span>
                  <strong><?php //echo $following_array; ?></strong>
                </li> -->
                <li>
                  <span>Favorites</span>
                  <strong>0</strong>
                </li>
                <!-- <li>
                  <span>Lists</span>
                  <strong>8</strong>
                </li>
                <li>
                  <span>Moments</span>
                  <strong>0</strong>
                </li> -->
              </ul>
        
            </div>
          </div>
        
          <div class="wrapper-content content">
            <aside class="profile">
              <img src="<?php echo $prof_pic; ?>" alt="João Paulo" class="avatar bg-light" />
              <h1><div class="jttcote"><?php echo $username; ?></div></h1>
              <!-- <span class="username">@<?php echo $username; ?></span> -->
              <p><?php echo $bio; ?></p>
        
              <ul class="data">
                <li><img src="img/images/place.svg" alt="Place" /><?php if (!empty($loc)){echo $loc;} else{ echo 'Not specified';} ?></li>
                <li><img src="img/images/child.svg" alt="Born" /><?php if (!empty($$dob)){echo $dob;} else{ echo 'Not specified';}  ?></li>
                <li><img src="img/images/link.svg" alt="Link" /><?php if (!empty($website_link)){echo $website_link;} else{ echo 'Not specified';}  ?></li>
                <li><img src="img/images/clock.svg" alt="Joined" /><?php echo $signup_date; ?></li>
              </ul>
              <?php if(isset($_SESSION['id'])){ if ($_SESSION['id'] == $uid){ ?>
              <div class="edit-prof">
                <button><a href="edit-profile.php" class="text-decoration-none text-dark">Edit Profile</a></button>
              </div>
              <?php }} ?>
            </aside>
            <div style="width: 100%">
              <!-- Gallery -->
              <div class="widget media">
                <div class="headher">
                  <div class="borderline">
                    <div class="inplace">
                      <strong class="media-title"><img src="img/images/media.svg" alt="Gallery" /> Gallery</strong>
                    </div>
                  </div>
                </div>
                <div class="container-fluid">
                  <div id="mygallery" class="justified-gallery">
                    <?php 
                        $i=0;
                        while($row = mysqli_fetch_array($user_data_post)) {
                    ?>
                    <?php echo '<a href="viewpost.php?id='.$row['pid'].'" class="cover">';
                          echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />'; ?>
                    </a>
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
              <!-- Commissions -->
              <div class="widget media">
                <div class="headher">
                  <div class="borderline">
                    <div class="inplace">
                      <strong class="media-title"><img src="img/images/media.svg" alt="Commissions" /> Commissions</strong>
                    </div>
                  </div>
                </div>
                <div class="container-fluid">
                  <div id="mygallery" class="justified-gallery">
                    <?php 
                        $i=0;
                        while($row = mysqli_fetch_array($user_data_post)) {
                    ?>
                    <?php echo '<a href="viewpost.php?id='.$row['pid'].'" class="cover">';
                          echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />'; ?>
                    </a>
                    <?php
                        $i++;
                        }
                    ?>
                  </div>
                </div>
              </div>
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
      </div>
    <?php include("bts/footer.php") ?>
    </body>
</html>