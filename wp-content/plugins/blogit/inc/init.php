<?php
/**
 * 
 * @package BlogItPlugin
 */
namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return // array list of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }
    /**
     * Loop through the classes, initialize them
     * and call the register() method if it exists
     * Dang ky mot services: 
     * - Vong lap cac class va khoi tao class
     * - Dang ky service
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if(method_exists($service, 'register')){
                $service->register();
            }
        }
    }
    /**
     * Initialize the class
     */
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}