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
    public function blogitaddAdminSection()
    {
        echo "Check this beautifull section";
    }
    public function blogitTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class ="regular-text" name="text-example" value ="' . $value . '"placeholder ="Write Something Here!">';
    }
}
