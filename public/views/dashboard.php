<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/dashboard-style.css"></link>
    <link rel="stylesheet" type="text/css" href="public/css/service-requests.css"></link>
    <script src="https://kit.fontawesome.com/2207b84d03.js" crossorigin="anonymous"></script>
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
                <form>
                    <input placeholder="Search">
                </form>
            </div>
            <div class="add-request-button" name>
                <i class="fa-solid fa-plus"></i>
                New Service
            </div>
        </header>
        <section class="requests">
            <div id="service-1">
                <img src="public/img/uploads/pexels-cottonbro-studio-4542852.jpg">
                <div>
                    <h2>Title</h2>
                    <p>Description</p>
                    <p>Price: 200 zł</p>
                    <p>Date: 10-06-2023</p>
                </div>
            </div>
            <div id="service-2">
                <img src="public/img/uploads/pexels-javon-swaby-3370153.jpg">
                <div>
                    <h2>Title</h2>
                    <p>Description</p>
                    <p>Price: 200 zł</p>
                    <p>Date: 10-06-2023</p>
                </div>
            </div>
            <div id="service-3">
                <img src="public/img/uploads/pexels-olena-bohovyk-13684844.jpg">
                <div>
                    <h2>Title</h2>
                    <p>Description</p>
                    <p>Price: 200 zł</p>
                    <p>Date: 10-06-2023</p>
                </div>
            </div>
            <div id="service-4">
                <img src="public/img/uploads/pexels-taryn-elliott-4198566.jpg">
                <div>
                    <h2>Title</h2>
                    <p>Description</p>
                    <p>Price: 200 zł</p>
                    <p>Date: 10-06-2023</p>
                </div>
            </div>
        </section>
    </main>
    </div>
</body>