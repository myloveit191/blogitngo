<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    // Dashboard Page
    public function adminDashboard()
    {
        return require_once "$this->plugin_path/templates/admin.php";
    }

    // Taxonomy Page
    public function adminTaxonomy()
    {
        return require_once "$this->plugin_path/templates/taxonomy.php";
    }

    // Custom Post Type Page
    public function adminCpt()
    {
        return require_once "$this->plugin_path/templates/cpt.php";
    }

    //Custom Galleyry Page
    public function adminGallery()
    {
        echo "Gallery";
    }

    //Custom Widget Page
    public function adminWidget()
    {
        return require_once "$this->plugin_path/templates/widget.php";
    }

    //Testimonial Page
    public function adminTestimonial()
    {
        echo "Testimonial";
    }

    //Template Page
    public function adminTemplates()
    {
        echo "Template";
    }

    //Membership Page
    public function adminMembership()
    {
        echo "Membership Page";
    }
    public function blogitOptionsGroup($input)
    {
        return $input;
    }
    public function blogitAdminSection()
    {
        echo "Check this beautifull section!";
    }
    public function blogitFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo "<input type='text' class ='regular-text' name='first_name' value ='{$value}' placeholder ='Write your First Name'>";
    }
    public function blogitLastName()
    {
        $value = esc_attr(get_option('last_name'));
        echo '<input type="text" class ="regular-text" name="last_name" value ="' . $value . '" placeholder ="Write your Last Name!">';
    }
}
