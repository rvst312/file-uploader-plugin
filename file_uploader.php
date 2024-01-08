<?php
/*
Plugin Name: File Uploader
Description: File Uploader es un explorador de archivos personalizado.
Version: 1.0
Author: RVST
*/

// Seguridad para evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Include files
include_once(plugin_dir_path(__FILE__) . 'includes/admin/admin-functions.php');
include_once(plugin_dir_path(__FILE__) . 'includes/admin/menu-functions.php');
// include_once(plugin_dir_path(__FILE__) . 'includes/front/front-functions.php');
