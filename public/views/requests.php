<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/dashboard-style.css"></link>
    <link rel="stylesheet" type="text/css" href="public/css/service-requests.css"></link>
    <script src="https://kit.fontawesome.com/2207b84d03.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>Dashboard Page</title>
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
        <header class="header">
            <div class="search-bar">
                <input placeholder="Search requests">
            </div>
            <div class="add-request-button">
                <i class="fa-solid fa-plus"></i>
                New Service
            </div>
        </header>
        <section class="requests">
            <?php foreach($serviceRequests as $request): ?>
                <div id="service-1">
                    <img src="public/uploads/<?= $request->getImage() ?>">
                    <div>
                        <h2><?= $request->getBikeName() ?></h2>
                        <p><?= $request->getDescription() ?></p>
<!--                        <p>Price: 200 zł</p>-->
<!--                        <p>Date: 10-06-2023</p>-->
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    </div>
</body>

<template id="request-template">
    <div id="">
        <img src="">
        <div>
            <h2>bikeName</h2>
            <p>description</p>
            <p>price</p>
            <p>date</p>
        </div>
    </div>
</template>