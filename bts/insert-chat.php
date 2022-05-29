<?php 
    session_start();
    if(isset($_SESSION['id'])){
        $timezone = date_default_timezone_set("Europe/London");
        $con = mysqli_connect("localhost", "root", "", "lucat");
    
        if(mysqli_connect_errno()) { //Error message if failed connection.
            echo "Connection failed. " . mysqli_connect_errno();
        }
        $outgoing_id = $_SESSION['id'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($con, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: signin.php");
    }


    
?>