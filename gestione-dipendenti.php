<?php
/*
Plugin Name: Gestione Dipendenti
Plugin URI: https://example.com/
Description: Plugin per la gestione dei dipendenti, ferie, permessi e sedi aziendali.
Version: 1.0.0
Author: Il Tuo Nome
Author URI: https://example.com/
License: GPL2
*/

// Prevenire l'accesso diretto al file
defined('ABSPATH') or die('Non puoi accedere direttamente a questo file!');

// Definizione delle costanti del plugin
define('GD_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('GD_PLUGIN_URL', plugin_dir_url(__FILE__));

// Inclusione dei file necessari
include_once(GD_PLUGIN_PATH . 'includes/activator.php');
include_once(GD_PLUGIN_PATH . 'includes/deactivator.php');
include_once(GD_PLUGIN_PATH . 'includes/class-gd-database.php');
include_once(GD_PLUGIN_PATH . 'includes/class-gd-roles.php');
include_once(GD_PLUGIN_PATH . 'includes/class-gd-notifications.php');
include_once(GD_PLUGIN_PATH . 'includes/helper-functions.php');
include_once(GD_PLUGIN_PATH . 'public/class-gd-frontend.php');
include_once(GD_PLUGIN_PATH . 'admin/class-gd-admin.php');
include_once(GD_PLUGIN_PATH . 'admin/gd-admin-menu.php');

// Funzione di attivazione del plugin
function gd_activate_plugin() {
    require_once(GD_PLUGIN_PATH . 'includes/activator.php');
    GD_Activator::activate();
    GD_Roles::add_roles();
    GD_Roles::add_capabilities();
}

// Funzione di disattivazione del plugin
function gd_deactivate_plugin() {
    require_once(GD_PLUGIN_PATH . 'includes/deactivator.php');
    GD_Deactivator::deactivate();
    GD_Roles::remove_capabilities();
}

// Registrazione delle funzioni di attivazione e disattivazione
register_activation_hook(__FILE__, 'gd_activate_plugin');
register_deactivation_hook(__FILE__, 'gd_deactivate_plugin');

// Inizializzazione del plugin
function gd_init_plugin() {
    // Caricamento dei file per il backend e il frontend
    if (is_admin()) {
        require_once(GD_PLUGIN_PATH . 'admin/class-gd-admin.php');
        GD_Admin::init();
    } else {
        require_once(GD_PLUGIN_PATH . 'public/class-gd-frontend.php');
        GD_Frontend::init();
    }
}
add_action('plugins_loaded', 'gd_init_plugin');

?>
