<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Base;
/**
 * Set cac duong dan 
 */
class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin;
    public $managers = array();
    function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname( __FILE__ , 2)); // C:/path_name/../blogit
        $this->plugin_url = plugin_dir_url(dirname( __FILE__ ,2 )); // domain_name/path_name/../blogit (ex: locahost/axc/axc/plugins)
        $this->plugin = plugin_basename(dirname( __FILE__ ,3 )) . '/blogit-plugin.php'; // C:/path_name/../blogit/blogit-plugin.php
        $this->managers = array(
            'cpt_manager' => 'Activate CPT Manager',
            'taxonomy_manager' => 'Activate Taxonomy Manager',
            'media_widget' => 'Activate Media Widget',
            'gallery_manager' => 'Activate Gallery Manager',
            'testmonial_manager' => 'Activate Testimonial Manager',
            'templates_manager' => 'Activate Templates Manager',
            'login_manager' => 'Activate Login Manager',
            'membership_manager' => 'Activate Membership Manager',
            'chat_manager' => 'Activate Chat Manager'
        );
    }

}
