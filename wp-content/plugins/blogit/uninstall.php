<?php

/**
 * Trigger this file on Plugin uninstall
 * @package BlogItPlugin
 * 
 */

 if(!defined('WP_UNINSTALL_PLUGIN')){
     die;
 }
 //Clear Database Stored
$emails = get_posts(array('post_type' => 'email', 'numberposts'=>-1));
foreach ($emails as $email) {
    wp_delete_post($email->ID, true);
}

 //Access the database via SQL
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type ='email'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
 