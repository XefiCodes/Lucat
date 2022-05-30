<?php 
    session_start();
    if (isset($_SESSION["username"])){
        session_start();
        session_unset(); // unsets variables
        session_destroy(); // destroy session
        mysqli_close($con); // close database
        header('location:signin.php');
    }
    else{ // checks if there is a username
        header('location:index.php');
    }
?>