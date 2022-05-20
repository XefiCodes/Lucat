<?php include("bts/header.php"); ?>

        <div class="content">
            <form action="signup.php" method="POST">
                <h1>Sign up here</h1>
                <?php 
                    if(in_array("<span class='msg'>You're all set! Go ahead and login!</span><br>", $error_array)) { echo "<p class='msg' style='color: #007CBE; font-weight: bold;'>You're all set! Go ahead and login!</p>"; }
                    else { echo "<p class='msg'>Let's get you started</p>";}
                ?>

                <!-- Fields for the name -->
                <div class="name">
                        <label class="custom-field">
                            <input type="text" name="reg_uname" value="<?php 
                                if(isset($_SESSION['reg_uname'])) {
                                    echo $_SESSION['reg_uname'];
                                } 
                                ?>" required/>
                            <span class="placeholder bg-transparent">Enter username</span>
                        </label>
                        <label class="custom-field">
                            <input type="text" name="reg_nname" value="<?php 
                                if(isset($_SESSION['reg_nname'])) {
                                    echo $_SESSION['reg_nname'];
                                } 
                                ?>" required/>
                            <span class="placeholder bg-transparent">Enter nickname</span>
                        </label>
                    </div>
                    <!-- Error message -->
                    <?php if(in_array("Your username must be between 2 and 25 characters<br>", $error_array)) echo "<p style='color:#F87060; font-size: 12px; margin: 5px 0; '>Your first name must be between 2 and 25 characters</p>"; ?>
                    <?php if(in_array("Your nickname must be between 2 and 25 characters<br>", $error_array)) echo "<p style='color:#F87060; font-size: 12px; margin: 5px 0; '>Your last name must be between 2 and 25 characters</p>"; ?>

                <!-- Fields for the emails -->
                <label class="custom-field">
                    <input type="email" name="reg_email" value="<?php 
                        if(isset($_SESSION['reg_email'])) {
                            echo $_SESSION['reg_email'];
                        } 
                        ?>" required/>
                    <span class="placeholder bg-transparent">Enter email</span>
                </label>
                <label class="custom-field">
                    <input type="email" name="reg_email2" value="<?php 
                        if(isset($_SESSION['reg_email2'])) {
                            echo $_SESSION['reg_email2'];
                        } 
                        ?>" required/>
                    <span class="placeholder bg-transparent">Confirm email</span>
                </label>
                <!-- Error messages -->
                <?php if(in_array("Email already in use<br>", $error_array)) echo "<p style='color:#AF1B3F; padding-left: 12px; font-weight: bold; font-size: 12px; margin: 5px 0; '>Email already in use </p>"; 
                else if(in_array("Invalid email format<br>", $error_array)) echo "<p style='color:#AF1B3F; padding-left: 12px; font-weight: bold; font-size: 12px; margin: 5px 0; '>Invalid email format</p>";
                else if(in_array("Emails don't match<br>", $error_array)) echo "<p style='color:#AF1B3F; padding-left: 12px; font-weight: bold; font-size: 12px; margin: 5px 0; '>Emails don't match</p>"; ?>


                <!-- Field for the passwords -->
                <label class="custom-field">
                    <input type="password" name="reg_password" required/>
                    <span class="placeholder bg-transparent">Enter password</span>
                </label>
                <label class="custom-field">
                    <input type="password" name="reg_password2" required/>
                    <span class="placeholder bg-transparent">Confirm password</span>
                </label>
                <!-- Error messages -->
                <?php if(in_array("Your passwords do not match<br>", $error_array)) echo "<p style='color:#AF1B3F; padding-left: 12px; font-weight: bold; font-size: 12px; margin-top: 5px; '>Your passwords do not match</p>"; 
                else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "<p style='color:#AF1B3F; padding-left: 12px; font-weight: bold; font-size: 12px; margin-top: 5px; '>Your password can only contain english characters or numbers</p>";
                else if(in_array("Your password must be betwen 8 and 30 characters<br>", $error_array)) echo "<p style='color:#AF1B3F; padding-left: 12px; font-weight: bold; font-size: 12px; margin-top: 5px; '>Your password must be betwen 8 and 30 characters</p>"; ?>

                <input type="submit" name="register_button" class="register-btn" value="REGISTER">

                <p class="option">Already have an account? <a onClick="location.href='signin.php'">Sign In Here</a></p>
            </form>
            <div class="signup-bg"></div>
        </div>
    </body>
</html>