<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/sign-up.css"></link>
    <title>Create Account Page</title>
</head>
<body>
    <form action="signUp" method="POST">
        <div class="container">
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
            <hr>

            <label for="psw-repeat"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name">

            <label for="psw-repeat"><b>Surname</b></label>
            <input type="text" placeholder="Enter Surname" name="surname">

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email">
        
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw">
        
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat">
                        
            <div class="clearfix">
                <input class="cancel-button" type="submit" name="cancel-button" value="Cancel">
                <button type="submit" class="sign-up-button">Sign Up</button>
            </div>
        </div>
    </form>
</body>