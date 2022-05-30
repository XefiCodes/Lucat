<?php
    session_start();
    
    if(isset($_SESSION['id'])){
        $timezone = date_default_timezone_set("Europe/London");
        $con = mysqli_connect("localhost", "root", "", "lucat");
        
        if(mysqli_connect_errno()) { //Error message if failed connection.
            echo "Connection failed. " . mysqli_connect_errno();
        }
        
        $poid = mysqli_real_escape_string($con, $_POST["pid"]);
        $Cname = $_SESSION["username"];
        $comment = mysqli_real_escape_string($con, $_POST['ct']);

        if (!empty($comment)){
            $sql = "INSERT INTO comments (pid, username, cmt) VALUES ('$poid','$Cname','$comment')";
            $res = mysqli_query($d, $sql);
        }
    }else{
        header("location: signin.php");
    }
?>