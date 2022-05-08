<?php include("bts/header.php"); ?>

        <div class="content">
            <form action="signin.php" method="POST">
                <h1>Welcome back</h1>
                <p class="msg">Sign in to connect with other artists!</p>

                <label class="custom-field">
                    <input type="text" name="log_email" id="email" value="<?php 
                        if(isset($_SESSION['log_email'])) {
                            echo $_SESSION['log_email'];
                        } 
                        ?>" required/>
                    <span class="placeholder bg-transparent">Enter username</span>
                </label>
                <label class="custom-field">
                    <input type="password" name="log_password" id="password" required/>
                    <span class="placeholder bg-transparent">Enter password</span>
                </label>

                <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo "<p style='color:#AF1B3F; padding-left: 12px; font-weight: bold; font-size: 12px; margin: 5px; '>Email or password was incorrect<br>"; ?>

                <input type="submit" name="login_button" class="login-btn" value="LOGIN">

                <p class="option">Don't have an account yet? <a onClick="location.href='signup.php'">Sign Up Here</a></p>
            </form>
            <div class="signin-bg"></div>
        </div>
    </body>
</html>