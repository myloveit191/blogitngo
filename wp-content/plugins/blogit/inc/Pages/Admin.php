<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;
use Inc\Base\BaseController;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public $callbacks_mngr = array();

    public function __construct()
    {
        parent::__construct(); // Ke thua constructor cua lop cha
    }
    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
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
            'callback' => array($this->callbacks, 'adminTaxonomy')             
        ],
        [
            'parent_slug' => 'blogit-plugin',
            'page_title' => "Custom Widgets",
            'menu_title' => 'Widgets',
            'capability' => 'manage_options',
            'menu_slug' => 'blogit-widgets',
            'callback' => array($this->callbacks, 'adminWidget')             
        ]);
    }
    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'cpt_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'taxonomy_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'media_widget',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'gallery_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'testimonial_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'templates_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'login_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'membership_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'blogit_plugin_settings',
                'option_name' => 'chat_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            )
        );
        $this->settings->setSettings($args);
    }
    public function setSections()
    {
        $args = array(
            [
                'id' => 'blogit_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'blogit-plugin'
            ],
        );
        $this->settings->setSections($args);
    }
    public function setFields()
    {
        $args = array(
            [
                'id' => 'cpt_manager',
                'title' => 'Activate CPT Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "cpt_manager",
                    'classes' => 'ui-toggle'
                )
            ],
            [
                'id' => 'taxonomy_manager',
                'title' => 'Activate Taxonomy Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "taxonomy_manager",
                    'classes' => 'ui-toggle'
                )
            ],
            [
                'id' => 'media_widget',
                'title' => 'Activate Media Widget',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "media_widget",
                    'classes' => 'ui-toggle'
                )
            ],
            [
                'id' => 'gallery_manager',
                'title' => 'Activate Gallery Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "gallery_manager",
                    'classes' => 'ui-toggle'
                )
            ],
            [
                'id' => 'testimonial_manager',
                'title' => 'Activate Testimonial Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "testimonial_manager",
                    'classes' => 'ui-toggle'
                )
            ],
            [
                'id' => 'templates_manager',
                'title' => 'Activate Templates Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "templates_manager",
                    'classes' => 'ui-toggle'
                )
            ],
            [
                'id' => 'login_manager',
                'title' => 'Activate Login Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "login_manager",
                    'classes' => 'ui-toggle'
                )
            ],
            [
                'id' => 'membership_manager',
                'title' => 'Activate Membership Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "membership_manager",
                    'classes' => 'ui-toggle'
                )
            ],
            [
                'id' => 'chat_manager',
                'title' => 'Activate Chat Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'label_for' => "chat_manager",
                    'classes' => 'ui-toggle'
                )
            ],
            
        );
        $this->settings->setFields($args);
    }
}
