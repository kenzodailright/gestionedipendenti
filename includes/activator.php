<?php

class GD_Activator {
    // Funzione chiamata durante l'attivazione del plugin
    public static function activate() {
        // Creazione delle tabelle del database necessarie per la gestione dei dipendenti, ferie e permessi
        global $wpdb;
        
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'gd_ferie_permessi';
        
        $sql = "CREATE TABLE $table_name (
            id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            dipendente_id bigint(20) NOT NULL,
            tipo varchar(50) NOT NULL,
            data_inizio datetime NOT NULL,
            data_fine datetime NOT NULL,
            stato varchar(20) DEFAULT 'in_attesa' NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

?>
