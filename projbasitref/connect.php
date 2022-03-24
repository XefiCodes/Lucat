<?php 
    session_start();
    if (isset($_SESSION["username"])){
    }
    else{ // checks if there is a username
        header('location:main.php');
    }
    $d=mysqli_connect("localhost","root", "", "assessment");
    if(!$d)
        die("Connection failed." . mysqli_connect_error());
    else
        //echo "ConNet.";
?>