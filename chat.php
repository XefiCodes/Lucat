<?php 
  include_once "bts/connect_db.php";
  if(!isset($_SESSION['id'])){
    header("location: signin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chat</title>
        <?php include("bts/links.php") ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link href="Styles/global.css" rel="stylesheet">
        <link href="Styles/chat.css" rel="stylesheet">
        
    </head>
<body>
  <?php //include("bts/navbar.php") ?>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $id = mysqli_real_escape_string($con, $_GET['id']);
          $sql = mysqli_query($con, "SELECT * FROM users WHERE id = {$id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="<?php echo $row['prof_pic']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['username'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>


</body>
</html>
