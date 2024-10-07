<?php

// Se il file viene chiamato direttamente, termina l'esecuzione
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// Funzione di disinstallazione per pulire le tabelle del database create dal plugin
function gd_uninstall_plugin() {
    global $wpdb;
    
    // Rimuovere la tabella delle ferie e permessi
    $table_name = $wpdb->prefix . 'gd_ferie_permessi';
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}

gd_uninstall_plugin();

?>
