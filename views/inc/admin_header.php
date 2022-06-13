<?php
$heading = 'Unique Home Staging & Decor';
$activePage = $_GET['p'] ?? 'dashboard';
?>

<!doctype html>

<html lang="en">

<head>
    <title>
        <?php
        if ($title != 'home') {
            echo ucwords(esc($title)) . ' | ';
        }
        echo esc($heading)
        ?>
    </title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- google web fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- favicon icon -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="196x196" href="images/favicon-196.png" />
    <link rel="apple-touch-icon" sizes="192x192" href="images/favicon-192.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon-180.png" />
    <link rel="apple-touch-icon" sizes="167x167" href="images/favicon-167.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon-152.png" />
    <link rel="apple-touch-icon" sizes="128x128" href="images/favicon-128.png" />
    <script src="https://use.fontawesome.com/0872cd2bfd.js"></script>
    <style>
        header {
            background-color: rgba(1, 70, 102, 0.9);
        }

        header .main-nav {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background-color: rgba(2, 57, 82, 0.9);
            padding: 10px 0;
        }

        header a.active {
            border-bottom: 1px solid;
        }

        /* toast message  */

        .notification {
            background-color: #f5f5f5;
            border-radius: 0.375em;
            position: relative;
            padding: 1.25rem 2.5rem 1.25rem 1.5rem;
            margin: 15px;
            text-align: center;
        }

        .notification.success {
            background-color: #48c78e;
            color: #fff;
        }

        .notification.info {
            background-color: #3e8ed0;
            color: #fff;
        }

        .notification.error {
            background-color: #f14668;
            color: #fff;
        }

        .notification.warning {
            background-color: #ffe08a;
            color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body>
    <!--[if LTE IE 8]>
    <p style="font-size:30px; color:#f00">This website is not compatible with IE version 8 or lower. Please update your browser version or use other browser.</p>
  <![endif]-->


    <header>

        <div class="main-nav p-2 mb-4 border-bottom">
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-center ">

                    <a class="navbar-brand text-light" href="/">
                        <picture>
                            <!-- For desktop -->
                            <source media="(min-width: 768px)" srcset="/images/logo.png 1x, /images/logo_high.png 2x" />
                            <!-- For mobile -->
                            <source media="(max-width: 767px)" srcset="/images/logo_small.png 1x, /images/logo.png 2x, /images/logo_high.png 3x" />
                            <img src="/images/logo.png" alt="logo" width="210" height="70" />
                        </picture>
                    </a>
                    <nav class="d-inline-flex mt-2 mt-md-0 ms-auto">

                        <a href="/admin/?p=dashboard" title="Dashboard" class="me-3 py-2 text-light text-decoration-none <?= $activePage == 'dashboard' ? 'active' : '' ?>">
                            Dashboard</a>
                        <a href="/admin/?p=category" class="me-3 py-2 text-light text-decoration-none <?= $activePage == 'category' ? 'active' : '' ?>" title="Category">Category</a>
                        <a href="/admin/?p=services" class="me-3 py-2 text-light text-decoration-none <?= $activePage == 'services' ? 'active' : '' ?>" title="Services">Services</a>
                        <a href="/admin/?p=orders" class="me-3 py-2 text-light text-decoration-none <?= $activePage == 'orders' ? 'active' : '' ?>" title="Orders">Orders</a>
                        <a href="/admin/?p=users" class="me-3 py-2 text-light text-decoration-none <?= $activePage == 'users' ? 'active' : '' ?>" title="Users">Users</a>
                        <a href="/?p=logout" class="me-3 p-2  text-decoration-none border border-2 rounded-pill  text-light" title="logout">Logout</a>

                    </nav>
                </div>
            </div>
        </div>
    </header>
    <?php require __DIR__ . '/../inc/toast.php' ?>

    <div class="container p-3">