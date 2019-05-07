<!DOCTYPE html>

<html <?php language_attributes(); ?>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <!-- Display webpage in edge mode/IE in highest supported mode -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <!-- optimization for mobile device -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />-->


    <?php  wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left"><a
                    href="<?php echo site_url() ?>"><strong>Fictional</strong>
                    University</a></h1>
            <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search"
                    aria-hidden="true"></i></span>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
            <div class="site-header__menu group">
                <nav class="main-navigation">
                    <?php /*
                         wp_nav_menu(array(
                         "theme_location" => "headerMenu"

                     )) */ ?>




                    <ul>
                        <li <?php if (is_page("about-us") || wp_get_post_parent_id(0) == 2) {
    echo 'class="current-menu-item"';
} ?>
                            ><a href="
                               <?php  echo site_url('/about-us')?>
                    ">About
                                Us</a></li>
                        <li><a href="#">Programs</a></li>
                        <li <?php if (get_post_type()=='event') {
    echo 'class="current-menu-item"';
} ?>><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a>
                        </li>
                        <li <?php if (get_post_type() == 'post') {
    echo 'class="current-menu-item"';
} ?>><a href="<?php echo site_url('/blog');?>">Blog</a>
                        </li>
                    </ul>
                </nav>
                <div class="site-header__util">
                    <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                    <a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
                    <span class="search-trigger js-search-trigger"><i class="fa fa-search"
                            aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </header>