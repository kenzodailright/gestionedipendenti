<?php
class GD_Activator {
    public static function activate() {
        global $wpdb;

        // Creazione delle tabelle del database
        $table_name = $wpdb->prefix . 'gd_dipendenti';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            nome varchar(255) NOT NULL,
            cognome varchar(255) NOT NULL,
            email varchar(255) NOT NULL,
            ruolo varchar(255) NOT NULL,
            orario_lavoro varchar(255) NOT NULL,
            ferie int(11) DEFAULT 0,
            permessi int(11) DEFAULT 0,
            malattie int(11) DEFAULT 0,
            congedi_parentali int(11) DEFAULT 0,
            infortuni int(11) DEFAULT 0,
            formazione int(11) DEFAULT 0,
            sede varchar(255) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);

        // Creazione della tabella delle sedi
        $table_name_sedi = $wpdb->prefix . 'gd_sedi';
        $sql_sedi = "CREATE TABLE $table_name_sedi (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            nome varchar(255) NOT NULL,
            indirizzo varchar(255) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_sedi);

        // Creazione della tabella delle richieste di ferie e permessi
        $table_name_ferie_permessi = $wpdb->prefix . 'gd_ferie_permessi';
        $sql_ferie_permessi = "CREATE TABLE $table_name_ferie_permessi (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            dipendente_id mediumint(9) NOT NULL,
            tipo varchar(255) NOT NULL,
            data_inizio date NOT NULL,
            data_fine date NOT NULL,
            stato varchar(255) NOT NULL,
            commenti text,
            PRIMARY KEY  (id),
            FOREIGN KEY  (dipendente_id) REFERENCES $table_name(id)
        ) $charset_collate;";
        dbDelta($sql_ferie_permessi);
    }
}

// Deactivator
class GD_Deactivator {
    public static function deactivate() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_dipendenti';
        $wpdb->query("DROP TABLE IF EXISTS $table_name");

        $table_name_sedi = $wpdb->prefix . 'gd_sedi';
        $wpdb->query("DROP TABLE IF EXISTS $table_name_sedi");

        $table_name_ferie_permessi = $wpdb->prefix . 'gd_ferie_permessi';
        $wpdb->query("DROP TABLE IF EXISTS $table_name_ferie_permessi");
    }
}
?>
