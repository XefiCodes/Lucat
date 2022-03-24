<?php
    include_once 'connect.php';

    $previous_page = $_SESSION['current_page'];

    if (isset($_POST['com'])) {
        $poid = $_POST["pid"];
        $Cname = $_SESSION["username"];
        $comment = $_POST['ct'];
    
        if ($comment != ""){
            $sql = "INSERT INTO comments (pid, username, cmt) VALUES ('$poid','$Cname',' $comment')";
            $res = mysqli_query($d, $sql);
            
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