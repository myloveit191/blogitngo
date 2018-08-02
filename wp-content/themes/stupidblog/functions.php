<?php 
/**
 * Setting bootstrap for wordpress
 * 
 */
function themes_bootstrap()
{
    //Add css
    wp_register_style('bootstrap-style',get_template_directory_uri().'/libs/bootstrap/css/bootstrap.min.css');
    $dependencies = array('bootstrap');
    wp_enqueue_style('bootstrap-style',$dependencies);

    //Add js
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/libs/bootstrap/css/bootstrap.min.js', $dependencies, false, true );
}
add_action("wp_enqueue_scripts", "themes_bootstrap");

/**
 * Create menu
 */
add_theme_support('menu');
register_nav_menus(
    array(
        'primary' => 'Menu primary',
        'footer-nav' => 'Menu footer',
        'header-nav' => 'Menu header',
        'side-bar' => 'Menu sidbar'
    )   
);
