<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashBoard()
    {
        return require_once "$this->plugin_path/templates/admin.php";
    }

    public function adminTaxonomies()
    {
        return require_once "$this->plugin_path/templates/taxonomy.php";
    }

    public function adminCpt()
    {
        return require_once "$this->plugin_path/templates/cpt.php";
    }

    public function adminWidgets()
    {
        return require_once "$this->plugin_path/templates/widget.php";
    }
    public function blogitOptionsGroup($input){
        return $input;
    }
}
