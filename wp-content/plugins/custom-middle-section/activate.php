<?php
function cms_activate_plugin() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_sections';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        title tinytext NOT NULL,
        description text NOT NULL,
        type varchar(20) NOT NULL,
        year1_data varchar(100) NOT NULL,
        year2_data varchar(100) NOT NULL,
        html_template text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
?>
