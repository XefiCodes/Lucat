<?php
  ini_set("display_errors", "off");
  include_once ('bts/connect_db.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile | Lucat</title>
        <?php include("bts/links.php") ?>
        <link href="Styles/global.css" rel="stylesheet">
        <link href="Styles/profile.css" rel="stylesheet">
        <link href="Styles/commissions.css" rel="stylesheet">
    </head>
    <body>
      <?php include("bts/navbar.php") ?>
      <?php
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $sql = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
        $row = mysqli_fetch_assoc($sql);
        $uid = $row["id"];

        $resultt = mysqli_query($con,"SELECT * FROM commissions");
        $checkPosts = mysqli_query($con, "SELECT * FROM commissions");
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

        $checkPosts = mysqli_query($con, "SELECT * FROM posts WHERE id = '$uid'");
        $user_data_post = mysqli_query($con, "SELECT * FROM posts WHERE id = '$uid'");
        $Countpost = mysqli_num_rows($user_data_post);

        $checkLiked = mysqli_query($con, "SELECT * FROM heart WHERE id = '$uid'");
        $Countlike = mysqli_num_rows($checkLiked);
      ?>
      <div >
        <div class="banner" style="background-image: url('<?php echo $cover_pic; ?>');"></div>
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
                <li>
                  <span>Favorites</span>
                  <strong><?php echo $Countlike; ?></strong>
                </li>
              </ul>
        
            </div>
          </div>
          <div class="wrapper-content content">
            <aside class="profile">
              <img src="<?php echo $prof_pic; ?>" alt="Pic" class="avatar bg-light" />
              <h1><div class="jttcote"><?php echo $username; ?></div></h1>
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
              <?php if (!empty($id)){ ?>
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
                        if(mysqli_num_rows($checkPosts) > 0){
                          while($row = mysqli_fetch_array($user_data_post)) { ?>
                            <div>
                            <a href="viewpost.php?id=<?php echo $row['pid']?>" class="cover">
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />'
                            ?>
                            </a>
                            <?php if (isset($_SESSION['id'])){ 
                                $pid = $row['pid']; $uid = $_SESSION['id'];
                                $checkuser = mysqli_query($con,"SELECT * FROM heart WHERE pid = '$pid' AND id = '$uid'");
                                $lied = mysqli_fetch_array($checkuser);
                                $liked = $lied['liked'];
                                ?>
                                <div id="inner">
                                <form action="heart.php" class="peace" method="POST">
                                    <input hidden class="ping" type="text" name="Love" value="<?php echo $row["pid"] ?>">
                                    <input hidden class="ing" type="text" name="You" value="<?php echo $_SESSION["id"] ?>">
                                    <button type="submit" id="hat" class="hato">
                                    <?php if ($liked == NULL){ ?>
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    <?php } else{ ?>
                                        <i class="fa fa-heart activate" aria-hidden="true"></i>
                                    <?php 
                                    } ?>
                                    </button>
                                </form>
                                </div>
                            </div><?php
                            } 
                        }$i++;
                        }else{ ?> 
                      <div>No posts made.</div>
                        <?php }
                    ?>
                  </div>
                </div>
              </div>
              <!-- Liked Posts -->
              <!-- <div class="widget media">
                <div class="headher">
                  <div class="borderline">
                    <div class="inplace">
                      <strong class="media-title"><img src="img/images/media.svg" alt="Gallery" /> Liked </strong>
                    </div>
                  </div>
                </div>
                <div class="container-fluid">
                  <div id="mygallery" class="justified-gallery">
                    <?php
                        if (mysqli_num_rows($checkLiked) > 0){
                          $getLiked = mysqli_query($con, "SELECT * FROM heart WHERE id = '$uid'");
                          while($getLikes = mysqli_fetch_array($getLiked)){
                            $isitlike = $getLikes['liked'];
                            $getdapid = $getLikes['pid'];
                            if ($isitlike == NULL){
                              $getpid = mysqli_query($con, "SELECT * FROM posts WHERE pid = '$getdapid'");
                              while($rows = mysqli_fetch_array($getpid)) { ?>
                              <div>
                                <a href="viewpost.php?id=<?php echo $rows['pid']?>" class="cover">
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($rows['Image']).'" />'?>
                                </a>
                                <?php if (isset($_SESSION['id'])){ 
                                    $pid = $rows['pid']; $uid = $_SESSION['id'];
                                    $checkuser = mysqli_query($con,"SELECT * FROM heart WHERE pid = '$pid' AND id = '$uid'");
                                    $lied = mysqli_fetch_array($checkuser);
                                    $liked = $lied['liked'];
                                    ?>
                                <div id="inner">
                                  <form action="heart.php" class="peace" method="POST">
                                      <input hidden class="ping" type="text" name="Love" value="<?php echo $rows["pid"] ?>">
                                      <input hidden class="ing" type="text" name="You" value="<?php echo $_SESSION["id"] ?>">
                                      <button type="submit" id="hat" class="hato">
                                      <?php if ($liked == NULL){ ?>
                                          <i class="fa fa-heart" aria-hidden="true"></i>
                                      <?php } else{ ?>
                                          <i class="fa fa-heart activate" aria-hidden="true"></i>
                                      <?php 
                                      } ?>
                                      </button>
                                  </form>
                                </div>
                              </div><?php 
                                      }
                                    }
                                  } 
                                }$i++;
                              }else{ ?> 
                      <div>No posts liked.</div>
                        <?php }
                    ?>
                  </div>
                </div>
              </div> -->
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
              <!-- Commissions -->
              <?php if (mysqli_num_rows($checkPosts) > 0){ ?>
              <div class="widget media containerd">
                <div class="headher">
                  <div class="borderline">
                    <div class="inplace">
                      <strong class="media-title"><img src="img/images/media.svg" alt="Commissions" /> Commissions</strong>
                    </div>
                  </div>
                </div>
                <div class="row gap">
                <div class="card-container containerd" style="margin-top: 20px; padding-left: 30px; padding-right: 30px;">
                    <?php
                    $i=0;
                        while($row = mysqli_fetch_array($resultt)) {
                            $pfp = $row['id'];
                            $getinfo = mysqli_query($con,"SELECT * FROM users WHERE id = $pfp");
                            $pic = mysqli_fetch_array($getinfo);
                            $def = 'https://i.imgur.com/qiwcrKS.png';
                    ?>
                    <div class="card">
                        <a href="chat.php?id=<?php echo $row['id'] ?>">
                        <div class="card-cover"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image']).'" />' ?></div>
                            <div class="card-content">
                                <div class="card-seller">
                                <?php 
                                    if($pic['prof_pic'] == $def){
                                        echo '<img id="hatdog" src="'.$pic['prof_pic'].'" width="25px" height="25px"/>';
                                    }else{
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($pic['prof_pic']).'" />';
                                    } ?>
                                    <div>
                                        <h3><?php echo $row['username']; ?></h3>
                                        <p class="level"><?php $row['title'] ?></p>
                                    </div>
                                </div>
                                <p class="card-desc"><?php echo $row['txt'] ?></p> 
                                <div class="card-price">$<?php echo $row['priceMin']; if (!empty($row['priceMax'])){ echo '~' . $row['priceMax'];} ?> </div>
                            </div>
                        </a>
                    </div>
                    <?php
                        $i++;
                            }
                        }
                    ?>
                  </div>
                </div>
              </div>
              <?php } else {?>
                <div class="widget media woso">There's no one here...</div>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
  <?php include("bts/footer.php") ?>
  </body>
</html>