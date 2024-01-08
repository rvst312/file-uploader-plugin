<?php
// Función para procesar la carga de archivos
add_action('admin_post_process_files', 'process_files');
add_action('admin_post_nopriv_process_files', 'process_files');

function process_files() {
    
    $uploadedfile = $_FILES['archivo'];
    $upload_dir = wp_upload_dir();
    $custom_upload_dir = $upload_dir['basedir'] . '/examenes';

    $upload_overrides = array(
        'test_form' => false,
        'upload_dir' => $custom_upload_dir,
        'unique_filename_callback' => null
    );

    // Obtener la extensión del archivo
    $extension_archivo = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);

    // Definir extensiones permitidas
    $extensiones_permitidas = array('pdf', 'png', 'jpg', 'gif', 'jpeg');

    // Verificar si la extensión del archivo está permitida
    if (in_array(strtolower($extension_archivo), $extensiones_permitidas)) {
        // Manejar la subida del archivo
        $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

        // Verificar si la subida fue exitosa
        if ($movefile && !isset($movefile['error'])) {
            echo "El archivo se subió correctamente.";
        } else {
            echo "Error al subir el archivo: " . $movefile['error'];
        }

        // Redirigir después del proceso
        wp_redirect($_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Por favor selecciona un archivo válido. Formatos permitidos: PDF, PNG, JPG, GIF, JPEG";
    }
}


