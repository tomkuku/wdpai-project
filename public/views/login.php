<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css"></link>
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <p class="logo-title">BikeService.com</p>
            <image src="public/img/bike-logo.svg">
            <p class="logo-subtitle">Platform to service your bike online</p>
        </div>
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class="message">
                    <?php if (isset($messages))
                    foreach ($messages as $message) {
                        print ($message);
                    } 
                    ?>
                </div>
                <input class="input-field" name="email" type="text" placeholder="email@email.com">
                <input class="input-field" name="password" type="password" placeholder="password">
                <button class="button" type="submit">Login</button>
                <input class="button" type="submit" name="create-account" value="Create Account"/>
            </form>
        </div>
    </div>
</body>