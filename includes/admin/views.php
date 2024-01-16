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

    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Obtén el botón y el campo de entrada
    var pathInput = document.getElementById('pathInput');

    // Función para cambiar la ruta
    function changePath(newPath) {
        // Construye la nueva URL con la nueva ruta
        var currentUrl = window.location.href.split('?')[0];
        var newUrl = currentUrl + '?path=' + encodeURIComponent(newPath);

        // Redirige a la nueva URL
        window.location.href = newUrl;
    }

    // Agrega eventos clic a los botones de cambio de ruta
    document.getElementById('changePathButton1').addEventListener('click', function () {
        changePath('oro');
    });

    document.getElementById('changePathButton2').addEventListener('click', function () {
        changePath('reloj');
    });

    document.getElementById('changePathButton3').addEventListener('click', function () {
        changePath('diamantes')
    });
});
    </script>
    <?php
}
