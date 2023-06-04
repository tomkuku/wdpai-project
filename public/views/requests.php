<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/dashboard-style.css"></link>
    <link rel="stylesheet" type="text/css" href="public/css/service-requests.css"></link>
    <script src="https://kit.fontawesome.com/2207b84d03.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/accept.js"></script>
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
                <a href="/addRequest"> <i class="fas fa-plus"></i>New Service</a>
            </div>
        </header>
        <section class="requests">
            <?php foreach($serviceRequests as $request): ?>
                <div id="<?= $request->getId(); ?>">
                    <img src="public/uploads/<?= $request->getImage() ?>">
                    <div>
                        <h2><?= $request->getBikeName() ?></h2>
                        <p><?= $request->getDescription() ?></p>
                        <p><?= "Price: ".$request->getPrice()." zł" ?></p>
                        <p><?= "Created at: ".$request->getDate() ?></p>
                        <p name="isAccepted"><?php if($request->isAccepted() === 'true') {
                            print("Accepted");
                        } else {
                            print("Not yet accepted");
                        } ?></p>
                        <input name="accept-button" type="button" onclick="acceptRequest(<?= $request->getId(); ?>)" value="Accept"
                            <?php if($request->isAccepted() === 'true') { echo "disabled"; } ?>
                        />
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
            <p name="description">description</p>
            <p name="price">price</p>
            <p name="date">date</p>
            <p name="isAccepted">isAccepted</p>
            <input name="accept-button" type="button" value="Accept"/>
        </div>
    </div>
</template>