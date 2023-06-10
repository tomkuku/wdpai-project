<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/dashboard-style.css"></link>
    <link rel="stylesheet" type="text/css" href="public/css/add-request.css"></link>
    <script src="https://kit.fontawesome.com/2207b84d03.js" crossorigin="anonymous"></script>
    <title>New Request</title>
</head>

<body>
    <div class="base-container">
    <nav class="nav">
        <image src="public/img/bike-logo.svg">
        <ul>
            <li>
                <i class="fa-solid fa-comments"></i>
                <a href="#" class="button">Chat</a>
            </li>
            <li>
                <i class="fa-solid fa-calendar-days"></i>
                <a href="#" class="button">Calendar</a>
            </li>
            <li>
                <i class="fa-solid fa-user-group"></i>
                <a href="#" class="button">Community</a>
            </li>
            <li>
                <i class="fa-solid fa-bell"></i>
                <a href="#" class="button">Notifications</a>
            </li>
            <li>
                <i class="fa-solid fa-gear"></i>
                <a href="#" class="button">Settings</a>
            </li>
        </ul>
    </nav>
    <main class="main">
        <section class="request-form">
                <h1>We'll service your bike!</h1>
                <form action="addRequest" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                            if (isset($messages)) {
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input name="bikename" type="text" placeholder="Bike name">
                    <textarea name="description" rows=5 placeholder="Description"></textarea>
                    <input name="price" type="text" placeholder="Price">
                    <input type="file" name="file"/><br/>
                    <button class="submit-button" type="submit">send</button>
                    <input class="cancel-button" type="submit" name="cancel-button" value="Back">
                </form>
        </section>
    </main>
    </div>
</body>