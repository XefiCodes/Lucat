<?php 
    session_start();
    if (isset($_SESSION["username"])){
    }
    else{ // checks if there is a username
        header('location:main.php');
    }
    session_start();
    session_unset(); // unsets variables
    session_destroy(); // destroy session
    mysqli_close($d); // close database
    header('location:main.php');
?>