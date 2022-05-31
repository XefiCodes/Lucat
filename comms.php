<?php
    include_once 'bts/connect_db.php';

    if (!empty($_FILES['imageC']['name'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $_FILES['imageC']['tmp_name'];
            $fimg = file_get_contents($img);
            $name = $_SESSION["username"];
            $id = $_SESSION["id"];
            $tit = strip_tags($_POST['titleC']);
            $cap = strip_tags($_POST['captionC']);
            $date = date("Y-m-d");
            $stat = $_POST['status'];
            $min = strip_tags($_POST['min']);
            $max = strip_tags($_POST['max']);
            if (empty($stat)){
                $stat = 'Client';
            }
            // $tag = $_POST['tag']; 

            $sql = "insert into commissions (Image, id, username, txt, title, dateCreated, status, priceMin, priceMax, close) values (?,'$id','$name','$cap','$tit', '$date','$stat', '$min', '$max', 'no')";
            $getimg = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($getimg, "s" ,$fimg);
            mysqli_stmt_execute($getimg);
            $check = mysqli_stmt_affected_rows($getimg);

            if ($check == 1) {
                header('location:comms.php');
            }
            else {
                header('location:submit.php');
                $msg = 'Error uploading image';
            }
        }
        else {
            header('location:submit.php');
            $msg = 'Error uploading image';
        }
    }
?>