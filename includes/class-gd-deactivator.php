<?php
class GD_Deactivator {
    public static function deactivate() {
        global $wpdb;

        // Pulizia delle tabelle del database
        $table_name = $wpdb->prefix . 'gd_dipendenti';
        $wpdb->query("DROP TABLE IF EXISTS $table_name");

        // Altre tabelle possono essere rimosse qui
    }
}
?>
