<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71578166-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-71578166-1');
        gtag('config', 'AW-693648841');
    </script>
    <title><?php wp_title(); ?></title>
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo get_template_directory_uri() ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo get_template_directory_uri() ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo get_template_directory_uri() ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/favicon/safari-pinned-tab.svg"
          color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class('theme' . get_field('theme')); ?>>
<div id="wrap">
    <header id="header" data-turbo-permanent>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-3">
                    <a class="logo" href="<?php echo home_url('/'); ?>">
                        <?php require get_template_directory() . '/snippets/logo.php'; ?>
                    </a>
                </div>
                <div class="col-6 col-md-9 align-self-center">
                    <div class="d-flex justify-content-end">
                        <a class="d-none d-md-flex telephone me-lg-1" href="mailto:askus@smarttar.co.uk">
                            askus@smarttar.co.uk
                        </a>
                        <a class="d-none d-md-flex telephone me-lg-1" href="tel:01983 475006">
                            <?php require get_template_directory() . '/snippets/telephone.php'; ?>
                            01983 475006
                        </a>
                        <button class="menu-button ms-1">MENU</button>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div id="menu">
        <div class="row my-1">
            <div class="col-6 col-md-3">
                <?php require get_template_directory() . '/snippets/logo-white.php'; ?>
            </div>
            <div class="col-6 col-md-9 d-flex justify-content-end">
                <button class="menu-close">CLOSE</button>
            </div>
        </div>

        <?php
        wp_nav_menu([
            'menu' => 'main-menu',
            'theme_location' => 'main-menu',
            'depth' => 1,
            'container' => false,
            'menu_class' => 'menu my-1',
            'fallback_cb' => 'wp_page_menu'
        ]);
        ?>

        <div class="contact my-1">
            <p class="m-0"><a class="h3" href="tel:01983 475006">01983 475006</a></p>
            <p class="m-0"><a class="h3" href="mailto:askus@smarttar.co.uk">askus@smarttar.co.uk</a></p>
        </div>

        <?php require get_template_directory() . '/snippets/social-icons.php'; ?>

    </div>
    <div class="content-wrapper">