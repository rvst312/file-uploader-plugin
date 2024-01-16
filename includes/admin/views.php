<?php

//include_once(plugin_dir_path(__FILE__) . '../front/front-functions.php');
//
//function add_menu_item()
//{
//    add_menu_page(
//        'Subir Exámenes 2',
//        'Subir Exámenes',
//        'edit_pages', //'manage_options'
//        'formulario_carga_archivos',
//        'render_interface',
//        'dashicons-upload',
//        20
//    );
//}
//
//add_action('admin_menu', 'add_menu_item');
//
//function render_interface()
//{
//    $current_path = isset($_GET['path']) ? sanitize_text_field($_GET['path']) : '/pdf';
//
//    view_upload_form($current_path);
//    display_uploaded_files($current_path); 
//
//}
//

// Definir funciones para renderizar vistas


// Definir funciones para renderizar vistas
function render_interface() {
    ?>
    <div class="wrap">
        <h2>Vista por Defecto</h2>
        <button class="button change-view-button" data-view="another">Cambiar a Otra Vista</button>
        <button class="button change-view-button" data-view="yet_another">Cambiar a Otra Vista Más</button>
    </div>
    <?php
    view_upload_form('pdf');
    display_uploaded_files('pdf'); 
}

function render_another_view() {
    ?>
    <div class="wrap">
        <h2>Otra Vista</h2>
        <button class="button change-view-button" data-view="default">Volver a Vista por Defecto</button>
    </div>
    <?php
    view_upload_form('oro');
    display_uploaded_files('oro'); 
}

function render_yet_another_view() {
    ?>
    <div class="wrap">
        <h2>Otra Vista Más</h2>
        <button class="button change-view-button" data-view="default">Volver a Vista por Defecto</button>
    </div>
    <?php
    view_upload_form('pdf');
    display_uploaded_files('pdf'); 
}

// Función para cambiar la vista mediante AJAX
function change_view_callback() {
    $view = isset($_POST['view']) ? $_POST['view'] : 'default';

    switch ($view) {
        case 'another':
            render_another_view();
            break;

        case 'yet_another':
            render_yet_another_view();
            break;

        default:
            render_interface();
    }

    wp_die();
}

// Agregar acciones para las funciones
add_action('wp_ajax_change_view', 'change_view_callback');
add_action('wp_ajax_nopriv_change_view', 'change_view_callback');

// Agregar menú y scripts
add_action('admin_menu', 'add_menu_item');
add_action('admin_enqueue_scripts', 'enqueue_custom_script');

function add_menu_item() {
    add_menu_page(
        'Subir Exámenes 2',
        'Subir Exámenes',
        'edit_pages',
        'formulario_carga_archivos',
        'render_interface',
        'dashicons-upload',
        20
    );
}

function enqueue_custom_script() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var buttons = document.querySelectorAll('.change-view-button');

            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var view = this.getAttribute('data-view');

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            document.getElementById('adminmenumain').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send('action=change_view&view=' + view);
                });
            });
        });
    </script>
    <?php
}
