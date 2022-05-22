<?php  
	require 'connect_db.php';
	require 'account_created.php';
	require 'account_login.php';
    include("classes/User.php");

    // Checks if there is a username in the session variable (indicates theres a user).
    if (isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }
    else {
        header("Location: index.php"); //If not, redirects the user back to the index page.
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign In Lucat</title>
        <?php include("bts/links.php") ?>
        <link href="Styles/signin-signup.css" rel="stylesheet">
        <link href="Styles/edit-profile.css" rel="stylesheet">
        <link href="Styles/global.css" rel="stylesheet">
    </head>
    <body>
    <?php include("navbar.php") ?>