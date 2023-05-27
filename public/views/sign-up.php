<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/sign-up.css"></link>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Sign Up Page</title>
</head>
<body>
    <form action="signUp" method="POST">
        <div class="container">
            <div class="logo-container">
                <p class="logo-title">BikeService.com</p>
                <image src="public/img/bike-logo.svg">
                <p class="logo-subtitle">Platform to service your bike online</p>
            </div>

            <h1>Sign Up</h1>
            <?php
            if (isset($messages)) {
                foreach ($messages as $message) {
                    print ($message);
                }
            } else {
                print("Please fill in this form to create an account");
            }
            ?>

            <br>
                <spacer type="vertical" width="0" height="20"></spacer>
            <br>

            <label><b>Name</b></label>
            <input type="text" placeholder="Name" name="name">

            <label><b>Surname</b></label>
            <input type="text" placeholder="Surname" name="surname">

            <label><b>Email</b></label>
            <input type="text" placeholder="Email" name="email">
        
            <label><b>Password</b></label>
            <input type="password" placeholder="Password" name="psw">
        
            <label><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat">
                        
            <div class="clearfix">
                <input class="cancel-button" type="submit" name="cancel-button" value="Cancel">
                <button type="submit" class="sign-up-button">Sign Up</button>
            </div>
        </div>
    </form>
</body>