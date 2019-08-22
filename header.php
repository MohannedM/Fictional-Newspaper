<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php language_attributes(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <?php wp_head(); ?>
    <!-- Title -->
    <title>The News Paper - News &amp; Lifestyle Magazine Template</title>

</head>

<body>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="<?php echo esc_url(site_url('/')); ?>"><img src="<?php echo get_theme_file_uri("/img/core-img/logo.png"); ?>" alt=""></a>
                            </div>

                            <!-- Login Search Area -->
                            <div class="login-search-area d-flex align-items-center">
                                <?php if(is_user_logged_in()){ ?>
                                    <div class="login d-flex">
                                    <a href="<?php echo esc_url(wp_logout_url()); ?>">Logout</a>
                                    </div>
                                <?php }else{ ?>
                                <!-- Login -->
                                <div class="login d-flex">
                                    <a href="<?php echo esc_url(wp_login_url()); ?>">Login</a>
                                    <a href="<?php echo esc_url(wp_registration_url()); ?>">Register</a>
                                </div>
                                <?php } ?>
                                <!-- Search Form -->
                                <div class="search-form">
                                    <form action="<?php echo esc_url(site_url('/')); ?>" method="get">
                                        <input type="search" name="s" class="form-control" placeholder="Search">
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="newspaper-main-menu" id="stickyMenu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newspaperNav">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?php echo esc_url(site_url('/')); ?>"><img src="<?php echo get_theme_file_uri("/img/core-img/logo.png");?>" alt=""></a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                    <?php wp_nav_menu([
                                        'menu_location'=>'Main-Menu',
                                        'container'=>'ul',
                                        'depth'=>0,
                                    ]);
                                     ?>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->