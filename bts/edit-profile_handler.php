<?php 
// Code for handling the settings functionality.

if(isset($_POST['update_account'])) {

	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$bio = $_POST['bio'];

	$email_check = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
	$row = mysqli_fetch_array($email_check);
	$matched_user = $row['username'];

	if($matched_user == "" || $matched_user == $userLoggedIn) {
		$message = "Details updated!<br><br>";

		$query = mysqli_query($con, "UPDATE users SET username='$uname', email='$email', bio='$bio' WHERE username='$userLoggedIn'");
		$userLoggedIn = $uname;
		$_SESSION['username'] = $uname;
	}
	else 
		$message = "That email is already in use!<br><br>";

}
else 
	$message = "Didn't work...";


if(isset($_POST['update_password'])) {

	$old_password = strip_tags($_POST['old_password']);
	$new_password_1 = strip_tags($_POST['new_password_1']);
	$new_password_2 = strip_tags($_POST['new_password_2']);

	$password_query = mysqli_query($con, "SELECT password FROM users WHERE username='$userLoggedIn'");
	$row = mysqli_fetch_array($password_query);
	$db_password = $row['password'];

	if(md5($old_password) == $db_password) {

		if($new_password_1 == $new_password_2) {


			if(strlen($new_password_1) <= 4) {
				$password_message = "Sorry, your password must be greater than 4 characters<br><br>";
			}	
			else {
				$new_password_md5 = md5($new_password_1);
				$password_query = mysqli_query($con, "UPDATE users SET password='$new_password_md5' WHERE username='$userLoggedIn'");
				$password_message = "Password has been changed!<br><br>";
			}
		}
		else {
			$password_message = "Your two new passwords need to match!<br><br>";
		}
	}
	else {
			$password_message = "The old password is incorrect! <br><br>";
	}
}
else {
	$password_message = "";
}

if(isset($_POST['update_about'])) {

	$loc = $_POST['loc'];
	$website = $_POST['website'];
	$dob = $_POST['dob'];

	$message = "Details updated!<br><br>";

	$query = mysqli_query($con, "UPDATE users SET loc='$loc', website_link='$website', dob='$dob' WHERE username='$userLoggedIn'");
}
else 
	$message = "Didn't work...";

if(isset($_POST['close_account'])) {
	$close_query = mysqli_query($con, "UPDATE users SET user_closed='yes' WHERE username='$userLoggedIn'");
}
?>