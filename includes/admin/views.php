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
//
//    view_upload_form('pdf');
//    display_uploaded_files('pdf'); 
//
//}


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
    ?>
    <div class="wrap">
        <h2>Vista por Defecto</h2>
        <button class="button change-view-button" data-param1="oro" data-param2="oro">Cambiar a Vista PDF</button>
        <button class="button change-view-button" data-param1="reloj" data-param2="reloj">Cambiar a Vista Oro</button>
        <button class="button change-view-button" data-param1="diamantes" data-param2="diamantes">Cambiar a Vista Mixta</button>
        <div id="dynamic-content">
            <?php
            // Parámetros iniciales para la vista por defecto
            $param1 = 'pdf';
            $param2 = 'pdf';

            view_upload_form($param1);
            display_uploaded_files($param2);
            ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var buttons = document.querySelectorAll('.change-view-button');
            var dynamicContent = document.getElementById('dynamic-content');

            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var param1 = this.getAttribute('data-param1');
                    var param2 = this.getAttribute('data-param2');

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            dynamicContent.innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send('action=change_view&param1=' + param1 + '&param2=' + param2);
                });
            });
        });
    </script>
    <?php
}

function change_view_callback() {
    $param1 = isset($_POST['param1']) ? $_POST['param1'] : 'pdf';
    $param2 = isset($_POST['param2']) ? $_POST['param2'] : 'pdf';

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
