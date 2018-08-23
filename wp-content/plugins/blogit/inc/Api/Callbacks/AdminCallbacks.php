<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
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
    public function blogitFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class ="regular-text" name="first-name" value ="' . $value . '" placeholder ="Write your First Name">';
    }
    public function blogitLastName()
    {
        $value = esc_attr(get_option('last_name'));
        echo '<input type="text" class ="regular-text" name="last_name" value ="' . $value . '" placeholder ="Write your Last Name!">';
    }
}
