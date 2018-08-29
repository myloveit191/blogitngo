<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Base;
use \Inc\Base\BaseControler;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    function enqueue(){
        // enqueue all our scripts
        wp_enqueue_style('mystyle.css', $this->plugin_url.'assets/mystyle.css');
        wp_register_script('myscript.js', $this->plugin_url.'assets/myscript.js', array('jquery'));
        wp_enqueue_script('myscript.js');
    }

}