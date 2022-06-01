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
            $date = date("Y-m-d");
            $tag = $_POST['tag'];
            // $sep = ' ';
            // $array = explode(" ", $tag);

            $resultag = mysqli_query($con,"SELECT * FROM tags");

            $sql = "insert into posts (image, id, username, title, txt, dateCreated, tag) values(?,'$id','$name','$tit','$cap', '$date', '$tag')";
            $getimg = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($getimg, "s" ,$fimg);
            mysqli_stmt_execute($getimg);
            $check = mysqli_stmt_affected_rows($getimg);

            // foreach ($array as $input){
            $tag = "INSERT INTO tags (tag) value '$input'";
            // }

            if ($check == 1) {
                $select =  mysqli_insert_id($con);
                // foreach($array as $input){
                $tagged = "insert into tagged (pid, tag) values ($select, $input)";
                // }
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