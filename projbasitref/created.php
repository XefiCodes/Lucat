<?php
    session_start();

    include_once 'firstcon.php';

    $em = $_POST['em']; // Email
    $un = $_POST['un']; // Username
    $pw = $_POST['pw']; // Password
    $p = md5($pw); // Encrypt Password
    $b = ''; // Bio
    $h = 'https://i.imgur.com/qiwcrKS.png'; // Default profile image

    $checkUser = mysqli_query($d, "SELECT * FROM users WHERE username = '$un'"); // Get usernames
    $fetchUser = mysqli_fetch_array($checkUser);
    $getUser = $fetchUser["username"];

    $sql = "INSERT INTO users (image, email, username, password, bio) VALUES ('$h', '$em','$un','$p', '$b')"; // Insert account details

    if (!empty($em) && !empty($un) && !empty($p)){
        if ($un == $getUser){ // Check if entered username exists
            $_SESSION['error'] = "Username exists. Please use another.";
            header('location:signup.php');
        }
        else{
            if(mysqli_query($d, $sql)) // Account was put in database
            {
                echo "Successfully created an account!";
                header('location:main.php');
            }
            else
            {
                $_SESSION['error'] = "Account was unsuccesful.";
                echo $sql. "" .mysqli_error($d);
                mysqli_close($d);
                header('location:signup.php');
            }
        }
    }
    else {
        die("Please fill the required forms.");
        header('location:signup.php');
    }
?>