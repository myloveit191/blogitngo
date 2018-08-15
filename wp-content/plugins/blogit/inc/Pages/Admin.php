<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Pages;

class Admin extends \Inc\Base\BaseController
{
    public function register()
    {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }
    public function add_admin_pages()
    {
        add_menu_page("BlogIt Plugin","BlogIt","manage_options","blogit-plugin",array($this, 'admin_index'),'dashicons-grid-view',110);
    }
    public function admin_index()
    {
        require_once $this->plugin_path."templates/admin.php";
    }

}
