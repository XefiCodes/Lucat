<?php
    include_once "connect.php";

    $previous_page = $_SESSION['current_page'];

    $id = $_POST["uid"];
    $bio = $_POST["bi"];

    $sqlL = "UPDATE users SET bio = '$bio' WHERE uid = '$id'";

    if(isset($_POST['bioweapon'])){
        if(mysqli_query($d, $sqlL)){
            header("location:$previous_page");
        }
        else{
            header("location:$previous_page");
        }
    }
    else{
        header("location:$previous_page");
    }
?>