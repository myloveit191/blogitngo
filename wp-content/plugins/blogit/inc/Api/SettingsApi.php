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
    protected $admin_pages = array();
    protected $admin_subpages = array();
    protected $settings = array();
    protected $sections = array();
    protected $fields = array();

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
    public function withSubPage(string $title =''){
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
                'callback' => function (){}
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
        $this->Sections = $sections;

        return $this;
    }
    
    public function setFields(array $fields)
    {
        $this->Fields = $fields;

        return $this;
    }

    public function registerCustomFields()
    {
        //register setting
        foreach ($this->settings as $setting) {
            register_setting($setting['option_group'], $setting['option_name'], 
            (isset($setting['callback'])? $setting['callback'] : '')
            );
        }
        //add settings section
        foreach ($this->sections as $section) {
            add_settings_section($section['id'], $section['title'], 
            (isset($section['callback'])? $section['callback'] : ''), $section['page']);
        }
        //add settings field
        foreach ($this->fields as $field) {
            add_settings_field(
                $field['id'], $field['title'],
                (isset($field['callback'])? $field['callback'] : ''),
                $field['page'], $field['section'],
                (isset($field['args'])? $field['args'] : '')
            );
        }
    }
}
