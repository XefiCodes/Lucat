<?php 
    // Declaring variables to prevent errors
    $uname = ""; // Username
    $em = ""; // Email
    $em2 = ""; // Email 2
    $password = ""; // Password
    $password2 = ""; // Password 2
    $prof_pic = ""; // Profile image
    $cover_pic = ""; // Cover image
    // $bio = ""; // Bio
    $date = ""; // Sign up date 
    $error_array = array(); // Holds error messages

    if(isset($_POST['register_button'])){

        // Registration form values

        //Username
        $uname = strip_tags($_POST['reg_uname']); // Remove html tags
        $uname = str_replace(' ', '', $uname); // Remove spaces
        $uname = ucfirst(strtolower($uname)); // Uppercase first letter
        $_SESSION['reg_uname'] = $uname; // Stores last name into session variable
    
        // Email
        $em = strip_tags($_POST['reg_email']); // Remove html tags
        $em = str_replace(' ', '', $em); // Remove spaces
        $em = ucfirst(strtolower($em)); // Uppercase first letter
        $_SESSION['reg_email'] = $em; // Stores email into session variable
    
        // Email 2
        $em2 = strip_tags($_POST['reg_email2']); // Remove html tags
        $em2 = str_replace(' ', '', $em2); // Remove spaces
        $em2 = ucfirst(strtolower($em2)); // Uppercase first letter
        $_SESSION['reg_email2'] = $em2; // Stores email2 into session variable

        if(strlen($uname) > 25 || strlen($uname) < 2) {
            array_push($error_array, "Your username must be between 2 and 25 characters<br>");
        }
        
        // Password
        $password = strip_tags($_POST['reg_password']); // Remove html tags
        $password2 = strip_tags($_POST['reg_password2']); // Remove html tags
    
        $date = date("Y-m-d"); // Current date
    
        if($em == $em2) {
            // Check if email is in valid format 
            if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
    
                $em = filter_var($em, FILTER_VALIDATE_EMAIL);
    
                // Check if email already exists 
                $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
    
                // Count the number of rows returned
                $num_rows = mysqli_num_rows($e_check);
    
                if($num_rows > 0) {
                    array_push($error_array, "Email already in use<br>");
                }
    
            }
            else {
                array_push($error_array, "Invalid email format<br>");
            }
    
        }
        else {
            array_push($error_array, "Emails don't match<br>");
        }

        if($password != $password2) {
            array_push($error_array,  "Your passwords do not match<br>");
        }
        else {
            if(preg_match('/[^A-Za-z0-9]/', $password)) {
                array_push($error_array, "Your password can only contain english characters or numbers<br>");
            }
        }
        if(strlen($password) > 30 || strlen($password) < 8) {
            array_push($error_array, "Your password must be betwen 8 and 30 characters<br>");
        }
    
        if(empty($error_array)) {
            $password = md5($password); // Encrypt password before sending to database
    
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$uname'");
            $i = 0; 
            // If username exists add number to username
            while(mysqli_num_rows($check_username_query) != 0) {
                $i++; // Add 1 to i
                $uname = $uname . $i;
                $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$uname'");
            }

            $prof_pic = "https://i.imgur.com/qiwcrKS.png"; // Default profile image
            $cover_pic = "https://i.imgur.com/qiwcrKS.png"; // Default cover image
    
            $query = mysqli_query($con, "INSERT INTO users (`username`, `email`, `password`, `prof_pic`, `cover_pic`, `signup_date`, `user_closed`, `status`) VALUES ('$uname', '$em', '$password', '$prof_pic', '$cover_pic', '$date', 'yes', 'Offline now')");
    
            array_push($error_array, "<span class='msg'>You're all set! Go ahead and login!</span><br>");
    
            // Clear session variables 
            $_SESSION['reg_uname'] = "";
            $_SESSION['reg_email'] = "";
            $_SESSION['reg_email2'] = "";
        }
    }
?>