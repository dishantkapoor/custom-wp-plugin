<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$table_name = $wpdb->prefix . 'custom_sections';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
?>
