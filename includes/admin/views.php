<?php

include_once(plugin_dir_path(__FILE__) . '../front/front-functions.php');

function add_menu_item()
{
    add_menu_page(
        'Subir Exámenes 2',
        'Subir Exámenes',
        'edit_pages', //'manage_options'
        'formulario_carga_archivos',
        'render_interface',
        'dashicons-upload',
        20
    );
}

add_action('admin_menu', 'add_menu_item');

function render_interface()
{
    $current_path = isset($_GET['path']) ? sanitize_text_field($_GET['path']) : '/pdf';

    view_upload_form($current_path);
    display_uploaded_files($current_path); 
}
