<?php 
    $d=mysqli_connect("localhost","root", "", "assessment");
    if(!$d)
        die("Connection failed." . mysqli_connect_error());
    else
        echo "ConNet.";
?>