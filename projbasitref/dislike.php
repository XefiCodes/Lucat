<?php
    include_once "connect.php";

    $previous_page = $_SESSION['current_page'];

    $lpid = $_POST["pidd"];
    $lnam = $_SESSION["username"];

    if(isset($_POST['dislike'])){
        $checkuser = mysqli_query($d,"SELECT * FROM dislikes WHERE 'username' = '".$lpid."'");
        $checkpid = mysqli_query($d,"SELECT * FROM dislikes WHERE 'pid' = '".$lnam."'");
        $fetchuser = mysqli_fetch_array($checkuser);
        $fetchpid = mysqli_fetch_array($checkpid);

        $sqlL = "INSERT INTO dislikes (username, pid) VALUES ('$lnam', '$lpid')";

        if($fetchuser){ // Check if current post is like // Failed
            if($fetchpid){
                $sqlde = "DELETE * FROM dislikes WHERE pid = $lpid AND username = $lnam)";
                if(mysqli_query($d, $sqlde)){
                    header("location:$previous_page");
                }
                else{
                    header("location:$previous_page");
                }
            }
            else{
                if(mysqli_query($d, $sqlL)){
                    header("location:$previous_page");
                }
                else{
                    header("location:$previous_page");
                }
            }
        }
        else{
            if(mysqli_query($d, $sqlL)){
                header("location:$previous_page");
            }
            else{
                header("location:$previous_page");
            }
        }
    }
?>