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
use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;
require_once plugin_dir_path(__FILE__)."/inc/Admin/AdminPages.php";
if (!class_exists('BlogItPlugin')) {
    class BlogItPlugin 
    {
        public $plugin;
        function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
        }
        protected function create_post_type()
        {
            add_action('init', array($this, 'custom_post_type'));
        }
        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            add_action('admin_menu', array($this, 'add_admin_pages'));
            add_filter("plugin_action_links_$this->plugin", array($this,'settings_link'));
        }
        public function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=blogit-plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }
        function add_admin_pages()
        {
            add_menu_page("BlogIt Plugin","BlogIt","manage_options","blogit-plugin",array($this, 'admin_index'),'dashicons-grid-view',110);
        }
        function admin_index()
        {
            require_once "templates/admin.php";
        }
        function custom_post_type()
        {
            register_post_type('email', ['public'=> true, 'label' => 'Email']);
        }
        function enqueue(){
            // enqueue all our scripts
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
            wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
        }
        function activate()
        {
           // require_once 'inc/blogit-plugin-activate.php';
            Activate::activate();
        }
    }
    $blogit =  new BlogItPlugin();
    $blogit->register();
    //activation
    register_activation_hook(__FILE__, array($blogit,'activate'));
    //deactivation
    //require_once 'inc/blogit-plugin-deactivate.php'; 
    register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
}
 