<?php

/**
 * Plugin Name: BlogIt
 * Plugin URI: https://github.com/myloveit191
 * Author: Dinh Nghia
 * Author URI: https://github.com/myloveit191
 * Version: 1.0.0
 * Text Domain: dinhnghia
 * Description: This is plugin for blogit
 */

defined('ABSPATH') or die("Hey, what are you doing here? You silly human!");
// define('DS', DIRECTORY_SEPARATOR);

if (file_exists(dirname(__FILE__)."/vendor/autoload.php")) {
    require_once dirname(__FILE__)."/vendor/autoload.php";
}
/**
 * The code that run during plugin deactivation
 */
function activate_blogit_plugin()
{
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__,'activate_blogit_plugin');
/**
 * The code that run during plugin deactivation
 */
function deactivate_blogit_plugin()
{
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__,'deactivate_blogit_plugin');


if (class_exists("Inc\\Init")) {
    Inc\Init::register_services();
}