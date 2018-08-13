<?php 
/**
 * Setting bootstrap for wordpress
 * @since 1.0.0
 */
function themes_css()
{
    //Add css
    wp_register_style('bootstrap-style',get_template_directory_uri().'/libs/bootstrap/css/bootstrap.min.css');
    $dependencies = array('bootstrap');
    wp_enqueue_style('bootstrap-style',$dependencies);

}
function themes_js()
{
    //Add js
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri().'/libs/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
    wp_enqueue_script('hi-js', get_stylesheet_directory_uri().'/libs/blog/js/hi.js', array('jquery'), '1.0.0', true );
}
add_action("wp_enqueue_scripts", "themes_css");
add_action("wp_enqueue_scripts", "themes_js");

/**
 * Create menu
 * @since 1.0.0
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
