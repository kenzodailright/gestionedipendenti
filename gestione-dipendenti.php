<?php
/**
 * Plugin Name: Gestione Dipendenti
 * Description: Plugin per la gestione completa dei dipendenti, ferie, permessi, malattie, congedi parentali, infortuni sul lavoro e formazione.
 * Version: 1.0.0
 * Author: kenzodailright
 * Text Domain: gestione-dipendenti
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Include files
require_once plugin_dir_path(__FILE__) . 'includes/class-gd-activator.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-gd-deactivator.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-gd-functions.php';

// Activation and deactivation hooks
register_activation_hook(__FILE__, ['GD_Activator', 'activate']);
register_deactivation_hook(__FILE__, ['GD_Deactivator', 'deactivate']);

// Initialize the plugin
function run_gestione_dipendenti() {
    $plugin = new GD_Functions();
    $plugin->run();
}
run_gestione_dipendenti();

?>
