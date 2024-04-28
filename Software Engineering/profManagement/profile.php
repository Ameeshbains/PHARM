
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link rel="stylesheet" type="text/css" href="/CSS/login.css">
    <link rel="stylesheet" type="text/css" href="/signup/style.css">
</head>
<body>
<div class="container">
        <div class="box form-box">


            <header>PROFILE</header>
            <form action="/user/user.login.php" method="post">
                <div class="field input">

                    <label for="username">USERNAME:</label>
                    <input type="text" name="userName" id="firstName" autocomplete="off" required>

                </div>

                <div class="field input">

                    <label for="username">NAME:</label>
                    <input type="text" name="firstName" id="firstName" autocomplete="off" required>

                </div>
                <div class="field input">

                    <label for="username">NEW-PASSWORD</label>
                    <input type="password" name="pwd" id="pwd" autocomplete="off" required>

                </div>

                <div class="field input">

                    <label for="username">DATE-OF-BIRTH:</label>
                    <input type="date" name="date" id="date" autocomplete="off" required>

                </div>
                <div class="field input">
                    <label for="age">PROFILE-IMAGE</label>
                    <input type="file" name="img" id="img" autocomplete="off" required>
                </div>
    

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="UPDATE" required>
                </div>

                <div class="links">

                    <button href="../INDEX.php">GO-BACK</button>

                   

      
                </div>
            </form>
        </div>
       
      </div>
</body>
</html>



