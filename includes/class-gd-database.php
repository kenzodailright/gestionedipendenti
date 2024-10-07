<?php

class GD_Database {
    // Funzione per creare le tabelle del database necessarie
    public static function create_tables() {
        global $wpdb;
        
        $charset_collate = $wpdb->get_charset_collate();
        
        // Tabella per le ferie e permessi
        $table_name_ferie = $wpdb->prefix . 'gd_ferie_permessi';
        
        $sql_ferie = "CREATE TABLE $table_name_ferie (
            id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            dipendente_id bigint(20) NOT NULL,
            tipo varchar(50) NOT NULL,
            data_inizio date NOT NULL,
            data_fine date NOT NULL,
            ora_inizio time DEFAULT NULL,
            ora_fine time DEFAULT NULL,
            stato varchar(20) DEFAULT 'in_attesa' NOT NULL,
            note text DEFAULT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        // Tabella per i dipendenti
        $table_name_dipendenti = $wpdb->prefix . 'gd_dipendenti';
        
        $sql_dipendenti = "CREATE TABLE $table_name_dipendenti (
            id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            nome varchar(100) NOT NULL,
            cognome varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            ruolo varchar(50) NOT NULL,
            sede varchar(100) DEFAULT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql_ferie);
        dbDelta($sql_dipendenti);
    }

    // Funzione per aggiornare le tabelle del database se necessario
    public static function update_tables() {
        // Codice per aggiornare le tabelle del database se ci sono modifiche nelle versioni future del plugin
    }
}

?>
