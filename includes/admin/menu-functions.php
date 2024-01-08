<?php

include_once(plugin_dir_path(__FILE__) . '../front/front-functions.php');

function add_menu_item() {
    add_menu_page(
        'Subir Exámenes',
        'Subir Exámenes', 
        'edit_pages', //'manage_options'
        'formulario_carga_archivos',
        'RenderInterface', 
        'dashicons-upload', 
        20
    );
}
add_action('admin_menu', 'add_menu_item');

function RenderInterface() {
    view_upload_form();
    display_uploaded_files();
}

