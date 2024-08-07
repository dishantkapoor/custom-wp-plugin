<?php
// function cms_register_shortcodes() {
//     add_shortcode('my_section', 'cms_display_section');
// }

// function cms_display_section($atts) {
//     global $wpdb;
//     $table_name = $wpdb->prefix . 'custom_sections';
//     $id = intval(str_replace('my_section-', '', $atts[0]));
//     $section = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
    
//     if (!$section) {
//         return '';
//     }

//     return str_replace(
//         array('{name}', '{title}', '{description}', '{year1_data}', '{year2_data}'),
//         array(esc_html($section->name), esc_html($section->title), esc_html($section->description), esc_html($section->year1_data), esc_html($section->year2_data)),
//         wp_kses_post($section->html_template)
//     );
// }

// add_action('init', 'cms_register_shortcodes');
?>

<?php
function cms_register_shortcodes() {
    add_shortcode('my_section', 'cms_display_section');
}

function cms_display_section($atts) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_sections';

    // Extract the ID from the shortcode attributes
    $atts = shortcode_atts(array(
        'id' => '0'
    ), $atts);
    
    $id = intval($atts['id']);
    $section = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
    
    if (!$section) {
        return 'Section not found';
    }

    return str_replace(
        array('{name}', '{title}', '{description}', '{year1_data}', '{year2_data}'),
        array(esc_html($section->name), esc_html($section->title), esc_html($section->description), esc_html($section->year1_data), esc_html($section->year2_data)),
        wp_kses_post($section->html_template)
    );
}

add_action('init', 'cms_register_shortcodes');
?>

