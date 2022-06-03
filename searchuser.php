<?php 
    include ('bts/connect_db.php');

    $term = $_POST['searching'];

    $checkuser = mysqli_query($con,"SELECT * FROM users WHERE username = '$term'");
        $row = mysqli_fetch_assoc($checkuser);
        $cid = $row["id"];
    // while()){
        if (mysqli_num_rows($checkuser) > 0){
        header("location:profile.php?id=$cid");
        }
        else{
            header("location:profile.php");
        }
    // }
?>