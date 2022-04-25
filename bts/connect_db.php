<?php 
    // session_start();
    // if (isset($_SESSION["username"])){
    // }
    // else{ // checks if there is a username
    //     header('location:index.php');
    // }
    $d=mysqli_connect("localhost","root", "", "lucat");
    if(!$d)
        die("Connection failed." . mysqli_connect_error());
    else
        //echo "ConNet.";
?>