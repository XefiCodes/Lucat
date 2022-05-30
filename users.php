<?php 
  include_once "bts/connect_db.php";
  if(!isset($_SESSION['id'])){
    header("location: signup.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Landing Lucat</title>
        <?php include("bts/links.php") ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link href="Styles/global.css" rel="stylesheet">
        <link href="Styles/chat.css" rel="stylesheet">
        
    </head>
<body>
  <?php //include("bts/navbar.php") ?>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($con, "SELECT * FROM users WHERE id = {$_SESSION['id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <a href="index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="<?php echo $row['prof_pic']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['username'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <!-- <a href="php/logout.php?logout_id=<?php echo $row['id']; ?>" class="logout">Logout</a> -->
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="Javascript/users.js"></script>

</body>
</html>
