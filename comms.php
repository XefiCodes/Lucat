<?php
    include_once 'bts/connect_db.php';

    if (!empty($_FILES['imageC']['name'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $_FILES['imageC']['tmp_name'];
            $fimg = file_get_contents($img);
            $name = $_SESSION["username"];
            $id = $_SESSION["id"];
            $tit = $_POST['titleC'];
            $cap = $_POST['captionC'];
            // $tag = $_POST['tag']; 

            $sql = "insert into posts (image, id, username, txt, title) values(?,'$id','$name','$cap','$tit')";
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
?>