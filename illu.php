<?php
    include_once 'bts/connect_db.php';

    if (!empty($_FILES['image']['name'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $_FILES['image']['tmp_name'];
            $fimg = file_get_contents($img);
            $name = $_SESSION["username"];
            $id = $_SESSION["id"];
            $tit = $_POST['title'];
            $cap = $_POST['caption'];
            // $tag = $_POST['tag'];

            $sql = "insert into posts (image, id, username, title, txt) values(?,'$id','$name','$tit','$cap')";
            $getimg = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($getimg, "s" ,$fimg);
            mysqli_stmt_execute($getimg);
            $check = mysqli_stmt_affected_rows($getimg);

            if ($check == 1) {
                header('location:index.php');
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

    // if(isset($_POST['illu'])){
    //     if (!empty($_FILES['image']['name'])){
    //         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //             $img = $_FILES['image']['tmp_name'];
    //             $fimg = file_get_contents($img);
    //             $name = $_SESSION["username"];
    //             $cap = $_POST['caption'];
    //             // $tag = $_POST['tag']; 

    //             $sql = "insert into posts (image,username,txt) values(?,'$name','$cap')";
    //             $getimg = mysqli_prepare($con, $sql);
    //             mysqli_stmt_bind_param($getimg, "s" ,$fimg);
    //             mysqli_stmt_execute($getimg);
    //             $check = mysqli_stmt_affected_rows($getimg);

    //             if ($check == 1) {
    //                 header('location:index.php');
    //             }
    //             else {
    //                 header('location:submit.php');
    //                 $msg = 'Error uploading image';
    //             }
    //         }
    //         else {
    //             header('location:submit.php');
    //             $msg = 'Error uploading image';
    //         }
    //     }
    //     else {
    //         header('location:submit.php');
    //         $msg = 'Error uploading image';
    //     }
    // }
?>