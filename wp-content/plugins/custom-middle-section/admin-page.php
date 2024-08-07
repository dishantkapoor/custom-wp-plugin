<?php
function cms_add_admin_menu() {
    add_menu_page('Custom Middle Section', 'Custom Middle Section', 'manage_options', 'custom_middle_section', 'cms_admin_page', 'dashicons-editor-insertmore');
}

function cms_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_sections';

    // Check if we are in edit mode
    $edit_id = isset($_GET['edit']) ? intval($_GET['edit']) : 0;
    $editing = false;
    $section = null;

    if ($edit_id > 0) {
        $section = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $edit_id));
        if ($section) {
            $editing = true;
        }
    }

    // Handle form submission
    if (isset($_POST['submit'])) {
        $name = sanitize_text_field($_POST['name']);
        $title = sanitize_text_field($_POST['title']);
        $description = sanitize_textarea_field($_POST['description']);
        $type = sanitize_text_field($_POST['type']);
        $year1_data = sanitize_text_field($_POST['year1_data']);
        $year2_data = sanitize_text_field($_POST['year2_data']);
        $html_template = wp_kses_post($_POST['html_template']);

        if ($editing) {
            $wpdb->update($table_name, array(
                'name' => $name,
                'title' => $title,
                'description' => $description,
                'type' => $type,
                'year1_data' => $year1_data,
                'year2_data' => $year2_data,
                'html_template' => $html_template,
            ), array('id' => $edit_id));
        } else {
            $wpdb->insert($table_name, array(
                'name' => $name,
                'title' => $title,
                'description' => $description,
                'type' => $type,
                'year1_data' => $year1_data,
                'year2_data' => $year2_data,
                'html_template' => $html_template,
            ));
        }

        // Redirect to the main admin page after submission
        wp_redirect(admin_url('admin.php?page=custom_middle_section'));
        exit;
    }

    // Handle deletion
    if (isset($_GET['delete'])) {
        $delete_id = intval($_GET['delete']);
        if ($delete_id > 0) {
            $wpdb->delete($table_name, array('id' => $delete_id));
            wp_redirect(admin_url('admin.php?page=custom_middle_section'));
            exit;
        }
    }

    $sections = $wpdb->get_results("SELECT * FROM $table_name");
    ?>

    <div class="wrap">
        <h1><?php echo $editing ? 'Edit Section' : 'Add New Section'; ?></h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="type">Section Type</label></th>
                    <td>
                        <select name="type" id="type">
                            <option value="section_a" <?php selected($editing && $section->type == 'section_a'); ?>>Section A</option>
                            <option value="section_b" <?php selected($editing && $section->type == 'section_b'); ?>>Section B</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="name">Name</label></th>
                    <td><input name="name" type="text" id="name" value="<?php echo $editing ? esc_attr($section->name) : ''; ?>" class="regular-text" required></td>
                </tr>
                <tr>
                    <th scope="row"><label for="title">Title</label></th>
                    <td><input name="title" type="text" id="title" value="<?php echo $editing ? esc_attr($section->title) : ''; ?>" class="regular-text" required></td>
                </tr>
                <tr>
                    <th scope="row"><label for="description">Description</label></th>
                    <td><textarea name="description" id="description" rows="5" class="large-text" required><?php echo $editing ? esc_textarea($section->description) : ''; ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="year1_data">Year 1 Data</label></th>
                    <td><input name="year1_data" type="text" id="year1_data" value="<?php echo $editing ? esc_attr($section->year1_data) : ''; ?>" class="regular-text" required></td>
                </tr>
                <tr>
                    <th scope="row"><label for="year2_data">Year 2 Data</label></th>
                    <td><input name="year2_data" type="text" id="year2_data" value="<?php echo $editing ? esc_attr($section->year2_data) : ''; ?>" class="regular-text" required></td>
                </tr>
                <tr>
                    <th scope="row"><label for="html_template">HTML Template</label></th>
                    <td><textarea name="html_template" id="html_template" rows="10" class="large-text" required><?php echo $editing ? esc_textarea($section->html_template) : ''; ?></textarea></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo $editing ? 'Update Section' : 'Save Section'; ?>">
            </p>
        </form>

        <h2>Created Sections</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Created Date</th>
                    <th>Shortcode</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sections as $section) { ?>
                    <tr>
                        <td><?php echo esc_html($section->name); ?></td>
                        <td><?php echo esc_html($section->type); ?></td>
                        <td><?php echo esc_html($section->created_at); ?></td>
                        <td>[my_section id="<?php echo esc_html($section->id); ?>"]</td>
                        <td>
                            <a href="<?php echo admin_url('admin.php?page=custom_middle_section&edit=' . $section->id); ?>" class="button">Edit</a>
                            <a href="<?php echo admin_url('admin.php?page=custom_middle_section&delete=' . $section->id); ?>" class="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>
