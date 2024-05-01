<div class="container">
        <div class="box form-box">


            <header>Sign Up</header>
            <form action="/signup/signupProcess.php" method="post" onsubmit="return validateForm()">
            <div class="field input">
                    <label for="username">USERNAME:</label>
                    <input type="text" name="userName" id="userName" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="username">First Name:</label>
                    <input type="text" name="firstName" id="firstName" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Last Name</label>
                    <input type="text" name="lastName" id="lastName" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>

                
                <div class="field input">
                    <label for="age">Date-Of-Birth</label>
                    <input type="DATE" name="userDOB" id="userDOB" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="age">password</label>
                    <input type="password" name="pwd" id="pwd" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">PROFILE-IMAGE</label>
                    <input type="file" name="img" id="img" autocomplete="off" required>
                </div>
    

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="Login.PHP">Sign In</a>
                </div>
            </form>
        </div>
       
      </div>