<?php

include_once(plugin_dir_path(__FILE__) . '../front/front-functions.php');

function add_menu_item() {
    add_menu_page(
        'Subir Exámenes 2',
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
    // Lógica condicional para mostrar las vistas de cada carpeta (oro, diamantes, reloj)
    view_upload_form('pdf'); 
    display_uploaded_files('pdf'); // Recibe un parametro como path para cambiar el directorio que mostrara la vista
}

