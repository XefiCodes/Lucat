<?php 
    include_once 'bts/connect_db.php';

    $art = 'Artist';
    $cli = 'Client';

    $result = mysqli_query($con,"SELECT * FROM commissions LIMIT 4");
    $resultt = mysqli_query($con,"SELECT * FROM commissions LIMIT 4");
    $resultArt = mysqli_query($con,"SELECT * FROM commissions WHERE status = '$art' LIMIT 4");
    $resultCli = mysqli_query($con,"SELECT * FROM commissions WHERE status = '$cli' LIMIT 4");
    
    $checkPosts = mysqli_query($con, "SELECT * FROM commissions");
    $checkArt = mysqli_query($con, "SELECT * FROM commissions WHERE status = '$art'");
    $checkCli = mysqli_query($con, "SELECT * FROM commissions WHERE status = '$cli'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Commissions | Lucat</title>
    <?php include("bts/links.php") ?>
    <link href="Styles/global.css" rel="stylesheet">
    <link href="Styles/commissions.css" rel="stylesheet">
</head>
<body>
      <?php include("bts/navbar.php") ?>
    <div class="daborder">
        <h2 class="featureHeader"><b>Browse Commissions</b></h2>
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
            <script>
                var colors = ['#8cd6ab', '#F6A42E', '#BBEECC', '#FCB293', '#FCB293', '#FCB293'];
                $(".tags").hover(function() {
                    $(this).css("background-color", colors[(Math.random() * colors.length) | 0])
                }, function() {
                    $(this).css("background-color", "")
                });
            </script>
          </div></span>
        <div class="header-fluid headering">
            <h2 class="featureHeader">Featured</h2>
            <a class="featureHeader footer-right link-col" href="commissionB.php"><b>See all</b></a>
        </div>
        <div class="card-container">
            <?php
              $i=0;
              if (mysqli_num_rows($checkPosts) > 0){
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
                else{
            ?>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="header-fluid headering">
            <h2 class="featureHeader">Looking for Artists</h2>
            <a class="featureHeader footer-right link-col" href="commissionB.php"><b>See all</b></a>
        </div>
        <div class="card-container">
            <?php
              $i=0;
              if (mysqli_num_rows($checkArt) > 0){
                  while($row = mysqli_fetch_array($resultArt)) {
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
                else{
            ?>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="header-fluid headering">
            <h2 class="featureHeader">Looking for Clients</h2>
            <a class="featureHeader footer-right link-col" href="commissionB.php"><b>See all</b></a>
        </div>
        <div class="card-container">
            <?php
              $i=0;
              if (mysqli_num_rows($checkCli) > 0){
                  while($row = mysqli_fetch_array($resultCli)) {
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
                else{
            ?>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <div class="card">
                <div class="card-cover"><img src="img/cover.jpg" alt="Cover Picture" /></div>
                <div class="card-content">
                    <div class="card-seller">
                        <img src="img/prof.jpg" alt="Profile Picture">
                        <div>
                            <h3>kindiaz</h3>
                            <p class="level">Level 1 Seller</p>
                        </div>
                    </div>
                    <p class="card-desc">I can draw images for your site using this art stuff.</p> 
                    <div class="card-rating">
                        <img src="img/rating.png" alt="Rating">
                        <p>(10)</p>  
                    </div>
                    <div class="card-price">AED 25</div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php include("bts/footer.php") ?>
</body>
</html>

<!-- THere will be option to be notified if commission open -->
<!-- Only static images will be advertised atm -->
<!-- Have advertisers follow a fixed image dimensions if submitting ads -->