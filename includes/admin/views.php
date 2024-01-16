<?php

include_once(plugin_dir_path(__FILE__) . '../front/front-functions.php');

function add_menu_item()
{
    add_menu_page(
        'File Uploader',
        'Subir Archivos',
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
    display_front();
}

function change_view_callback() {
    $param1 = isset($_POST['param1']) ? $_POST['param1'] : 'oro'; // Default param value
    $param2 = isset($_POST['param2']) ? $_POST['param2'] : 'oro';

    ob_start();
    view_upload_form($param1);
    display_uploaded_files($param2);
    $output = ob_get_clean();
    echo $output;

    wp_die();
}

add_action('wp_ajax_change_view', 'change_view_callback');
add_action('wp_ajax_nopriv_change_view', 'change_view_callback');
?>
