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

class Dashboard extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    // public $subpages = array();

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

        // $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
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
    public function setSettings()
    {
        $args = array(
            array(
               'option_group' => 'blogit_plugin_settings',
               'option_name' => 'blogit-plugin',
               'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            )
        );
        // foreach ($this->managers as $manager => $title) {
        //     $args[] = array(
        //         'option_group' => 'blogit_plugin_settings',
        //         'option_name' => $manager,
        //         'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
        //     );
        // }
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
        $args = array();
        foreach ($this->managers as $manager => $title) {
            $args[] = array(
                'id' => $manager,
                'title' => $title,
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'blogit-plugin',
                'section' => 'blogit_admin_index',
                'args' => array(
                    'option_name' => 'blogit-plugin',
                    'label_for' => $manager,
                    'classes' => 'ui-toggle'
                )
            );
        }
        $this->settings->setFields($args);
    }
}
