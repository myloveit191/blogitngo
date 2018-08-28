<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Api;
/**
 * Lop SettingApi
 * Dung de: 
 */
class SettingsApi
{
    public $admin_pages = array();
    public $admin_subpages = array();
    public $settings = array();
    public $sections = array();
    public $fields = array();
    //Them acction addAdminMenu vao hook
    public function register()
    {
        if(!empty($this->admin_pages)){
            add_action('admin_menu', array($this, 'addAdminMenu'));
        }
        if(!empty($this->settings)){
            add_action('admin_init', array($this,'registerCustomFields'));
        }
    }

    //Set pages
    public function addPages(array $pages)
    {
        $this->admin_pages = $pages;

        return $this;
    }

    //add subPage (Tron page vao admin_subpages)
    public function addSubPages(array $pages)
    {
        $this->admin_subpages = array_merge($this->admin_subpages, $pages);

        return $this;
    }
    //Set subpage
    public function withSubPage(string $title = null){
        if (empty($this->admin_pages)) {
            return $this;
        }
        $admin_page = $this->admin_pages[0];
        $subpage = array(
            [
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => ($title) ? $title : $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback']
            ]
        );
        $this->admin_subpages = $subpage;
        return $this;
    }

    // Dang ky menu_page
    public function addAdminMenu()
    {
        foreach ($this->admin_pages as $page) {
            add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'],
                        $page['callback'], $page['icon_url'],$page['position']);
        }
        
        foreach ($this->admin_subpages as $page) {
            add_submenu_page($page['parent_slug'],$page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'],
                        $page['callback']);
        }
    }

    public function setSettings(array $settings)
    {
        $this->settings = $settings;

        return $this;
    }

    public function setSections(array $sections)
    {
        $this->sections = $sections;

        return $this;
    }
    
    public function setFields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }
    public function registerCustomFields()
    {
        //register setting

        foreach ($this->settings as $setting) {
            register_setting(
                $setting['option_group'], //Option group
                $setting['option_name'], //Option name
                (isset($setting['callback'])? $setting['callback'] : '')
            );
        }
        //add settings section
        foreach ($this->sections as $section) {
            add_settings_section(
                $section['id'], // id
                $section['title'], //title
                (isset($section['callback'])? $section['callback'] : ''), //callback
                $section['page']); // page
        }
        //add settings field
        foreach ($this->fields as $field) {
            add_settings_field(
                $field['id'], //id
                $field['title'], //title
                (isset($field['callback'])? $field['callback'] : ''), //callback
                $field['page'], //page
                $field['section'], //section
                (isset($field['args'])? $field['args'] : '') //arg
            );
        }
    }
}
