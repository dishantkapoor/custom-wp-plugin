<?php
/*
Plugin Name: Custom Middle Section
Plugin URI: https://dishantkapoor.com
Description: Add custom sections in the middle of posts or pages using shortcodes.
Version: 1.0
Author: Dishant Kapoor
Author URI: https://dishantkapoor.com
*/

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'activate.php';
require_once plugin_dir_path(__FILE__) . 'deactivate.php';
require_once plugin_dir_path(__FILE__) . 'admin-page.php';
require_once plugin_dir_path(__FILE__) . 'shortcode.php';

register_activation_hook(__FILE__, 'cms_activate_plugin');
register_deactivation_hook(__FILE__, 'cms_deactivate_plugin');

function cms_enqueue_admin_scripts($hook) {
    if ($hook != 'toplevel_page_custom_middle_section') {
        return;
    }
    wp_enqueue_style('cms_admin_css', plugin_dir_url(__FILE__) . 'assets/admin.css');
    wp_enqueue_script('cms_admin_js', plugin_dir_url(__FILE__) . 'assets/admin.js', array('jquery'), false, true);
}

add_action('admin_enqueue_scripts', 'cms_enqueue_admin_scripts');
add_action('admin_menu', 'cms_add_admin_menu');
