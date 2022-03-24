<?php
    include_once 'connect.php';

    if (!empty($_FILES['image']['name'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $_FILES['image']['tmp_name'];
            $fimg = file_get_contents($img);
            $name = $_SESSION["username"];
            $cap = $_POST['caption'];
            $tag = $_POST['tag']; 

            $sql = "insert into posts (image,username,txt, tags) values(?,'$name','$cap', '$tag')";
            $getimg = mysqli_prepare($d,$sql);
            mysqli_stmt_bind_param($getimg, "s" ,$fimg);
            mysqli_stmt_execute($getimg);
            $check = mysqli_stmt_affected_rows($getimg);

            if ($check == 1) {
                header('location:posts.php');
            }
            else {
                header('location:posts.php');
                $msg = 'Error uploading image';
            }
        }
        else {
            header('location:posts.php');
            $msg = 'Error uploading image';
        }
    }
    else {
        header('location:posts.php');
        $msg = 'Error uploading image';
    }
?>