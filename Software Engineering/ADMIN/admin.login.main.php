
<div class="container">
        <div class="box form-box">


            <header>ADMIN LOGIN</header>
            <form action="/Admin/adminForm.php" method="post">
                <div class="field input">
                    <label for="username">Firstname</label>
                    <input type="text" name="firstName" id="firstName" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="age">Password</label>
                    <input type="password" name="pwd" id="pwd" autocomplete="off" required>
                </div>
    

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="LOGIN" required>
                </div>
                <div class="links">
                    Not a member? <a href="signup.PHP">SIGN UP</a>
                </div>
            </form>
        </div>
       
      </div>