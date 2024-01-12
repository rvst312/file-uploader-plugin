<?php

include_once(plugin_dir_path(__FILE__) . '../front/front-functions.php');

function add_menu_item()
{
    add_menu_page(
        'Subir Exámenes 2',
        'Subir Exámenes',
        'edit_pages', //'manage_options'
        'formulario_carga_archivos',
        'Render_interface',
        'dashicons-upload',
        20
    );
}

add_action('admin_menu', 'add_menu_item');
add_action('wp_ajax_process_click', 'change_view');
add_action('wp_ajax_nopriv_process_click', 'change_view');

function render_interface()
{
    view_upload_form('pdf');
    display_folders();
    display_uploaded_files('pdf'); 
}


//function change_view()
//{
//
//    if (isset($_POST['value'])) {
//
//        $value_path = sanitize_text_field($_POST['value']);
//        echo $value_path;
//
//        if ($value_path == 'oro'){
//
//            view_upload_form('oro');
//            display_uploaded_files('oro'); 
//        }
//
//        else if ($value_path == 'reloj'){
//
//            view_upload_form('pdf');
//            display_uploaded_files('pdf'); 
//        }
//
//        else if ($value_path == 'diamantes') {
//
//            view_upload_form('diamantes');
//            display_uploaded_files('diamantes'); 
//        }
//
//    } else {
//        echo 'No se recibió ningún valor. Vuelve a intentarlo';
//    }
//
//    wp_die();
//}

