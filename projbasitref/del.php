<?php 
    include_once "connect.php";

    $previous_page = $_SESSION['current_page'];
    $id = $_POST['pidd'];

    if(isset($_POST['del'])){
        $sql = "DELETE FROM posts WHERE pid = '$id'";
        $sqlcom = "DELETE FROM comments WHERE pid = '$id'";
        $sqllike = "DELETE FROM likes WHERE pid = '$id'";
        $sqldislike = "DELETE FROM dislikes WHERE pid = '$id'";

        if (mysqli_query($d, $sql)) {
            if (mysqli_query($d, $sqlcom)) {
                if (mysqli_query($d, $sqllike)) {
                    if (mysqli_query($d, $sqldislike)) {
                        echo "Record deleted successfully";
                        header("location:$previous_page");
                    }
                    else {
                        echo "Error.";
                        header("location:posts.php");
                    }
                }
                else {
                    echo "Error.";
                    header("location:posts.php");
                }
            }
            else {
                echo "Error.";
                header("location:posts.php");
            }
        } 
        else {
            echo "Error.";
            header("location:posts.php");
        }
    }

    if(isset($_POST['delP'])){
        $sqlcom = "DELETE FROM comments WHERE pid = '$id'";

        if (mysqli_query($d, $sqlcom)) {
            echo "Record deleted successfully";
            header("location:$previous_page");
        }
        else {
            echo "Error.";
            header("location:posts.php");
        }
    }
    
    mysqli_close($d);
?>