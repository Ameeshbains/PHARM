
<div class="container">
        <div class="box form-box">


            <header>LOGIN</header>
            <form action="/user/user.login.php" method="post">
                <div class="field input">
                    <label for="username">Firstname</label>
                    <input type="text" name="firstName" id="firstName" autocomplete="off" required maxlength="10" minlength="5" >
                </div>
                
                <div class="field input">
                    <label for="age">Password</label>
                    <input type="password" name="pwd" id="pwd" autocomplete="off" required maxlength="10" minlength="5" >
                    <span class="error">Password must be at least 8 characters long.</span>
                </div>


                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="LOGIN" required >
                </div>
                <div class="links">
                    Not a member? <a href="signup.PHP">SIGN UP</a> || <a href="adminLogin.PHP">ADMIN</a>
                </div>
            </form>

            <?php
            // Display error message if login failed
            if(isset($errorMessage)) {
                
                echo "<p style='color: red;'>$errorMessage</p>";
            }
            ?>
        </div>
       
      </div>