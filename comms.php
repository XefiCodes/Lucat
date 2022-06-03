<?php 
    include_once('bts/connect_db.php');

    if (!empty($_FILES['image']['name'])){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $_FILES['image']['tmp_name'];
            $fimg = file_get_contents($img);
            $id = $_SESSION['id'];
            $user = $_SESSION['username'];
            $title = mysqli_real_escape_string($con, $_POST['title']);
            $desc = mysqli_real_escape_string($con, $_POST['caption']);
            $time = strtotime(date('Y-m-d H:i:s'));
            $date = date('Y-m-d H:i:s', $time);
            $min = mysqli_real_escape_string($con, $_POST['min']);
            $max = mysqli_real_escape_string($con, $_POST['max']);
            $status = $_POST['status'];
            if($status != 1){
                $realstat = 'Client';
            }
            else{
                $realstat = 'Artist';
            }

            $sql = "insert into commissions (image, id, username, title, txt, dateCreated, priceMin, priceMax, status, close) values(?,'$id','$user','$title','$desc', '$date', '$min', '$max', '$realstat', 'no')";
            $getimg = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($getimg, "s" ,$fimg);
            mysqli_stmt_execute($getimg);
            $check = mysqli_stmt_affected_rows($getimg);

            
            if ($check == 1) {
                header('location:commissions.php');
            }
            else {
                header('location:commsub.php');
                $msg = 'Error uploading image';
            }
        }
        else {
            header('location:commsub.php');
            $msg = 'Error uploading image';
        }
    }
?>