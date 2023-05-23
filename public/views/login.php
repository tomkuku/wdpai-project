<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css"></link>
    <title>Login Page</title>
</head>
<body>
    <form action="login" method="post">
        <div class="logo-container">
            <p class="logo-title">BikeService.com</p>
            <image src="public/img/bike-logo.svg">
            <p class="logo-subtitle">Platform to service your bike online</p>
        </div>

        <div class="container">
            <div class="message">
                <?php if (isset($messages))
                    foreach ($messages as $message) {
                        print ($message);
                    } 
                ?>
                <br>
                <spacer type="vertical" width="0" height="20"></spacer>
                <br>
            </div>

            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname">

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw">
            
            <br>
                <spacer type="vertical" width="0" height="50"></spacer>
            <br>

            <button class="login-button" type="submit">Login</button>
            <input class="sign-up-button" type="submit" name="sign-up-button" value="Sign Up">
        </div>
    </form>
</body>