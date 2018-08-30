<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Base;
use Inc\Api\SettingsApi;
use Inc\Base\BaseControler;

class CPTController extends BaseController
{
    public $subpages = array();
    public function register()
    {
       add_action('init', array($this, 'activate'));

    }
    public function activate()
    {
        register_post_type('blogit_products',
            array(
                'labels' => array(
                    'name' => "Products",
                    'singular_name' => 'Product'
                ),
                'public' => true,
                'has_archive' => true
            )
        );
    }
}