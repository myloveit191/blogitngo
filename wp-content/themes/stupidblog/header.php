<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- <link rel="profile" href="http://gmgp.org/xfn/11"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
</head>
<body <?php body_class();?> >
    <header class = "site-header">
        <nav class="navbar navbar-expand-lg navbar-light hi-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                do_action('blogit_before_header'); 
                include_once "core/custom-menu.php";
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container_class'=>'collapse navbar-collapse',
                        'container_id' => 'navbarTogglerDemo02',
                        'menu_class' => 'navbar-nav mr-auto mt-2 mt-lg-0 hi-menu',
                        'walker' => new Bootstrap_Nav_Walker(),
                    )
                );
            ?>
        </nav>
        <h2><?php bloginfo('title'); ?></h2>
    </header>
