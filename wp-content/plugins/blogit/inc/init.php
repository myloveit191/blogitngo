<?php
/**
 * 
 * @package BlogItPlugin
 */
namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return // array list of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }
    /**
     * Loop through the classes, initialize them
     * and call the register() method if it exists
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if(method_exists($service, 'register')){
                $service->register();
            }
        }
    }
    /**
     * Initialize the class
     */
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}
// use Inc\Base\Activate;
// use Inc\Base\Deactivate;
// use Inc\Pages\Admin;
// require_once plugin_dir_path(__FILE__)."/inc/Pages/Admin.php";
// if (!class_exists('BlogItPlugin')) {
//     class BlogItPlugin 
//     {
//         public $plugin;
//         function __construct()
//         {
//             $this->plugin = plugin_basename(__FILE__);
//         }
//         protected function create_post_type()
//         {
//             add_action('init', array($this, 'custom_post_type'));
//         }
//         function register()
//         {
//             add_action('admin_enqueue_scripts', array($this, 'enqueue'));
//             add_action('admin_menu', array($this, 'add_admin_pages'));
//             add_filter("plugin_action_links_$this->plugin", array($this,'settings_link'));
//         }
        // public function settings_link($links)
        // {
        //     $settings_link = '<a href="admin.php?page=blogit-plugin">Settings</a>';
        //     array_push($links, $settings_link);
        //     return $links;
        // }
//         function add_admin_pages()
//         {
//             add_menu_page("BlogIt Plugin","BlogIt","manage_options","blogit-plugin",array($this, 'admin_index'),'dashicons-grid-view',110);
//         }
//         function admin_index()
//         {
//             require_once "templates/admin.php";
//         }
//         function custom_post_type()
//         {
//             register_post_type('email', ['public'=> true, 'label' => 'Email']);
//         }
//         function enqueue(){
//             // enqueue all our scripts
//             wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
//             wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
//         }
//         function activate()
//         {
//            // require_once 'inc/blogit-plugin-activate.php';
//             Activate::activate();
//         }
//     }
//     $blogit =  new BlogItPlugin();
//     $blogit->register();
//     //activation
//     register_activation_hook(__FILE__, array($blogit,'activate'));
//     //deactivation
//     //require_once 'inc/blogit-plugin-deactivate.php'; 
//     register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
// }
 