<?php
    include_once 'bts/connect_db.php';

    if (!empty($_FILES['image']['name'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $_FILES['image']['tmp_name'];
            $fimg = file_get_contents($img);
            $name = $_SESSION["username"];
            $id = $_SESSION["id"];
            $tit = mysqli_real_escape_string($con, $_POST['title']);
            $cap = mysqli_real_escape_string($con, $_POST['caption']);
            $time = strtotime(date('Y-m-d H:i:s'));
            $date = date('Y-m-d H:i:s', $time);
            $tag = mysqli_real_escape_string($con, $_POST['tag']);


            $sql = "insert into posts (image, id, username, title, txt, dateCreated, tag) values(?,'$id','$name','$tit','$cap', NOW(), '$tag')";
            $getimg = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($getimg, "s" ,$fimg);
            mysqli_stmt_execute($getimg);
            $check = mysqli_stmt_affected_rows($getimg);

            $getRecent = mysqli_query($con, "SELECT * FROM posts ORDER BY dateCreated DESC LIMIT 1");
            $getPID = mysqli_fetch_array($getRecent);
            $getcha = $getPID["pid"];
            $getTag = $getPID["tag"];

            $arr = implode("", $getTag);
            $array = explode(",", $arr);
            foreach ($array as $input){
                $resultag = mysqli_query($con,"SELECT * FROM tags WHERE tag = '$input'");
                if (!empty($resultag)){
                    mysqli_query($con, "INSERT INTO tags (tag) value ('$input')");
                }
            }
            foreach($array as $input){
                $resultag = mysqli_query($con, "SELECT * FROM tagged WHERE pid = '$getcha' AND tag = '$input'");
                if (mysqli_num_rows($resultag) > 0){
                }
                else{
                    mysqli_query($con, "INSERT INTO tagged (pid, tag) values ('$getcha', '$input')");
                }
            }

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