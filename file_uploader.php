<?php
/*
Plugin Name: File Uploader
Description: File Uploader es un explorador de archivos interno. que permite subir, ver, descargar y borrar archivos.
Version: 1.2
Author: RVST
*/

// Seguridad para evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Include files
include_once(plugin_dir_path(__FILE__) . 'includes/admin/admin-functions.php');
include_once(plugin_dir_path(__FILE__) . 'includes/admin/views.php');


// Include styles and scripts 
function load_plugin_assets() {
    wp_enqueue_style('styles', plugins_url('/assets/css/style.css', __FILE__), array(), '1.0', 'all');
    wp_enqueue_script('scripts', plugins_url('/assets/js/scripts.js', __FILE__), array(), '1.0', true);
}
add_action('admin_enqueue_scripts', 'load_plugin_assets');



