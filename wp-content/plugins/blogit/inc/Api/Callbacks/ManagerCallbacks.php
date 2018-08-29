<?php

/**
 * 
 * @package BlogItPlugin
 */
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        return (isset($input) ? true : false);
    }
    public function adminSectionManager()
    {
        echo "Manager the Sections and Features of this Plugin by activating the checkboxes from the following list.";
    }
    public function checkboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['classes'];
        $checkbox = get_option($name);
        echo '<input type="checkbox" name = "' .$name. '" value="1" class="' .$classes. '"'. ($checkbox ? 'checked' : '' ).'>';
    }
}
