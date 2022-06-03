<?php
    include "bts/connect_db.php";

    $previous_page = $_SESSION['current_page'];

    $pid = $_POST["Love"];
    $uid = $_POST["You"];
    $status;

    $checkuser = mysqli_query($con,"SELECT * FROM heart WHERE pid = '$pid' AND id = '$uid'");
    // $checkpid = mysqli_query($con,"SELECT * FROM likes WHERE 'pid' = '".$lnam."'");
    $lied = mysqli_fetch_array($checkuser);
    $liked = $lied['liked'];
    if(mysqli_num_rows($checkuser) > 0){
        if ($liked == NULL){
            $status = 1;
            if($status == 1){
                $like = "Love";
            }
            else{
                $like = "";
            }
            $updatequery = "UPDATE heart SET liked = '$like' where id = '$uid' and pid = '$pid'";
            mysqli_query($con, $updatequery);
            header("location:$previous_page");
        }
        if($liked != NULL){
            $status = 0;
            if($status == 1){
                $like = "Love";
            }
            else{
                $like = "";
            }
            $updatequery = "UPDATE heart SET liked = '$like' where id = '$uid' and pid = '$pid'";
            mysqli_query($con, $updatequery);
            header("location:$previous_page");
        }
    }else {
        $status = 1;
        if($status == 1){
            $like = "Love";
        }
        else{
            $like = "";
        }
        $insertquery = "INSERT INTO heart (id,pid,liked) values ('$uid','$pid','$like')";
        mysqli_query($con, $insertquery);
        header("location:$previous_page");
    }
    // header("Content-type: application/json; charset=utf-8");

    // $pid = $_POST['postid'];
    // $uid = $_POST['userid'];
    // $stat = $_POST['stat'];
    // $like;

    // // Check entry within table
    // $query = "SELECT * FROM heart WHERE pid = '$pid' AND id = '$id'";
    // $result = mysqli_query($con, $query);
    // // $fetchdata = mysqli_fetch_array($result);
    // // $count = $fetchdata['cntpost'];

    // if($stat == 1){
    //     $like = "Love";
    // }
    // else{
    //     $like = "";
    // }

    // if(mysqli_num_rows($result) == 0){
    //     $insertquery = "INSERT INTO heart (id,pid,liked) values ('$uid','$pid','$like')";
    //     mysqli_query($con,$insertquery);
    // }else {
    //     $updatequery = "UPDATE heart SET liked = '$like' where id = '$id' and pid = '$pid'";
    //     mysqli_query($con,$updatequery);
    // }

    // echo json_encode($data);
    // // count numbers of like and unlike in post
    // $query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type=1 and postid=".$postid;
    // $result = mysqli_query($con,$query);
    // $fetchlikes = mysqli_fetch_array($result);
    // $totalLikes = $fetchlikes['cntLike'];

    // $query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type=0 and postid=".$postid;
    // $result = mysqli_query($con,$query);
    // $fetchunlikes = mysqli_fetch_array($result);
    // $totalUnlikes = $fetchunlikes['cntUnlike'];

    // // initalizing array
    // $return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

    // echo json_encode($return_arr);
?>