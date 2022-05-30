<?php
    include_once 'bts/connect_db.php';

    $previous_page = $_SESSION['current_page'];

    if (isset($_POST['com'])) {
        $Cname = $_SESSION["username"];
        $poid = mysqli_real_escape_string($con, $_POST['pid']);
        $comment = mysqli_real_escape_string($con, $_POST['ct']);
    
        if (!empty($comment)){
            $sql = "INSERT INTO comments (pid, username, cmt) VALUES ('$poid','$Cname', '$comment')";
            $res = mysqli_query($con, $sql);
            
            if($res){
                header("location:$previous_page");
            }
            else{
                header("location:$previous_page");
            }
        }
        else{
            //alert("Comment cannot be blank!");
            header("location:$previous_page");
        }
    }
?>