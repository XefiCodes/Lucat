<?php
    session_start(); // Start session
    $_SESSION['error'] = '';
    include_once 'connect_db.php';

    $un = $_POST['un'];
    $pw = $_POST['pw'];
    $p = md5($pw); // md5 for encryption

    $UserPw = "SELECT * FROM users WHERE username = '$un' AND pw = '$p'"; // Check if entered username and password is in database
    $checkUserPw = mysqli_query($d, "SELECT * FROM users WHERE username LIKE '%".$un."%' AND password LIKE '%".$p."%' ");
    
    $row=$checkUserPw->fetch_assoc();
    $id=$row['uid']; // get uid
    $na=$row['username']; // get username
    
    if (mysqli_num_rows($checkUserPw) > 0){
        $_SESSION["username"] = $na; // set username to be used
        $_SESSION["UID"] = $id;
        // header('location:posts.php');
    }
    else{
        $_SESSION['error'] = "Wrong username or password";
        mysqli_close($d); // close database
        // header('location:main.php');
    }
?>