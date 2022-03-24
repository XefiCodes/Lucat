<?php
    include_once 'connect.php';

    $id = $_POST['name'];
    $j = $_FILES['image']['name'];

    if (!empty($j)){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $img = $_FILES['image']['tmp_name'];
            $fimg = file_get_contents($img);
            
            $stmt = $d->prepare('UPDATE users SET image = ? WHERE username = ? '); // Prepare Image
            $null = null;
            $stmt->bind_param('bs' ,$null ,$id);
            $stmt->send_long_data(0, $fimg); 
                        
            if($stmt->execute()){ // Executes Image
                header("location:edit.php");
            }
            else {
                header('location:profile.php');
            }
        }
        else{
            header("location:profile.php");
        }
    }
    else{
        header('location:edit.php');
    }
?>