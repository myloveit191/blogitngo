<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Base\BaseController;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function __construct()
    {
        parent::__construct(); // Ke thua constructor cua lop cha
    }
    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubPages();
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
    public function admin_index()
    {
         require_once "$this->plugin_path/templates/admin.php";
    }
    public function setPages()
    {
        $this->pages = array([
            'page_title' => "BlogIt Plugin",
            'menu_title' => "BlogIt",
            'capability' => "manage_options",
            'menu_slug' => "blogit-plugin",
            'callback' => array($this->callbacks, 'adminDashboard'),
            'icon_url' => 'dashicons-grid-view',
            'position' => 110,
        ],);
    }
    public function setSubPages()
    {
        $this->subpages = array([
            'parent_slug' => 'blogit-plugin',
            'page_title' => "Custom Post Type",
            'menu_title' => 'CPT',
            'capability' => 'manage_options',
            'menu_slug' => 'blogit-cpt',
            'callback' => array($this->callbacks, 'adminCpt')           
        ],
        [
            'parent_slug' => 'blogit-plugin',
            'page_title' => "Custom Taxonomies",
            'menu_title' => 'Taxonomies',
            'capability' => 'manage_options',
            'menu_slug' => 'blogit-taxonomies',
            'callback' => array($this->callbacks, 'adminTaxonomies')             
        ],
        [
            'parent_slug' => 'blogit-plugin',
            'page_title' => "Custom Widgets",
            'menu_title' => 'Widgets',
            'capability' => 'manage_options',
            'menu_slug' => 'blogit-widgets',
            'callback' => array($this->callbacks, 'adminWidgets')             
        ]);
    }
    public function setSettings()
    {
        $args = array(
            [
                'option_group' => 'blogit_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'blogitOptionsGroup')
            ]
        );
        $this->settings->setSettings($args);
    }
}
