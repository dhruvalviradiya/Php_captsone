<?php
$heading = 'Unique Home Staging & Decor';
$cartCount = count($_SESSION['cart']);
$activePage = $_GET['p'] ?? 'home';
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
    <!-- custom css for desktop and mobile devices -->
    <link rel="stylesheet" href="styles/custom.css" />
    <!--  print css -->
    <link rel="stylesheet" href="styles/print.css" media="print" />

    <!-- favicon icon -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="196x196" href="images/favicon-196.png" />
    <link rel="apple-touch-icon" sizes="192x192" href="images/favicon-192.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon-180.png" />
    <link rel="apple-touch-icon" sizes="167x167" href="images/favicon-167.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon-152.png" />
    <link rel="apple-touch-icon" sizes="128x128" href="images/favicon-128.png" />
    <script src="https://use.fontawesome.com/0872cd2bfd.js"></script>
</head>

<body>
    <!--[if LTE IE 8]>
    <p style="font-size:30px; color:#f00">This website is not compatible with IE version 8 or lower. Please update your browser version or use other browser.</p>
  <![endif]-->


    <div id="main-wrapper" <?php if ($title == 'home') {
                                echo "class='home-page'";
                            }
                            ?>>

        <!-- header start -->
        <header>
            <div class="header-contact-info">
                <!-- top header block -->
                <div class="container">
                    <div class="info left">
                        <div class="info-item">
                            <i class="fa fa-phone fa-lg" aria-hidden="true"></i>
                            <span>(204) 123 4567</span>
                        </div>
                        <div class="info-item">
                            <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                            <a href="mailto:info@uniquehomestaging.com">
                                info@uniquehomestaging.com</a>
                        </div>
                    </div>
                    <div class="info right">
                        <div class="info-item">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <a href="/?p=view-cart">
                                Cart
                                <span class="shopping-cart-count">
                                    <?= $cartCount ?>
                                </span>
                            </a>
                        </div>
                        <?php if (isUserLoggedIn()) : ?>
                            <div class="info-item">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <a href="/?p=logout">
                                    Logout</a>
                            </div>
                        <?php else : ?>

                            <div class="info-item">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <a href="/?p=sign-up">
                                    Sign Up</a>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                <a href="/?p=login">
                                    Login</a>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="clear-fix"></div>
                </div>
            </div>

            <div class="menu-space">
                <div class="container">
                    <!-- logo -->
                    <div id="logo">
                        <picture>
                            <!-- For desktop -->
                            <source media="(min-width: 768px)" srcset="images/logo.png 1x, images/logo_high.png 2x" />
                            <!-- For mobile -->
                            <source media="(max-width: 767px)" srcset="images/logo_small.png 1x, images/logo.png 2x, images/logo_high.png 3x" />
                            <img src="images/logo.png" alt="logo" width="210" height="70" />
                        </picture>
                    </div>
                    <!-- navigation menu -->
                    <nav>
                        <!-- hamburger menu  -->
                        <a href="#" id="hamburger_button">
                            <span id="topbar"></span>
                            <span id="middlebar"></span>
                            <span id="bottombar"></span>
                        </a>

                        <!-- Navigation block for navigation links -->
                        <ul id="navlist">
                            <li>
                                <a href="/" title="Home" <?= $activePage == 'home' ? 'class="active"' : '' ?>> Home</a>
                            </li>
                            <li><a href="/?p=about-us" title="About Us" <?= $activePage == 'about-us' ? 'class="active"' : '' ?>>About Us</a></li>
                            <li><a href="/?p=services" title="Services" <?= $activePage == 'services' ? 'class="active"' : '' ?>>Services</a></li>

                            <li><a href="/?p=pricing" title="Pricing" <?= $activePage == 'pricing' ? 'class="active"' : '' ?>>Pricing</a></li>
                            <li><a href="/?p=contact-us" title="Contact Us" <?= $activePage == 'contact-us' ? 'class="active"' : '' ?>>Contact Us</a></li>
                            <?php if (isUserLoggedIn()) : ?>
                                <li>
                                    <a href="/?p=orders" title="Orders" <?= $activePage == 'orders' ? 'class="active"' : '' ?>>
                                        Orders</a>
                                </li>
                                <li>
                                    <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
                                    <a href="/?p=my-profile" title="My Profile" <?= $activePage == 'my-profile' ? 'class="active"' : '' ?>>
                                        My Profile</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- header end -->

        <?php require __DIR__ . '/../inc/toast.php' ?>

        <?php if ($title == 'home') : ?>

            <!-- Banner -->
            <div id="banner" class="banner">
                <div class="banner-area">
                    <div class="container">
                        <div class="slider-title">
                            <!-- tagline -->
                            <p class="tagline"> Your home is our Art Gallery </p>
                            <!-- call to action   -->
                            <a href="/?p=contact-us" class="cta">
                                Schedule a Meeting
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->

        <?php endif; ?>

        <!-- section start -->
        <section id="content">