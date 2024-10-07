<?php
function gd_deactivator_deactivate() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'gd_dipendenti';
    $wpdb->query("DROP TABLE IF EXISTS $table_name");

    $table_name_sedi = $wpdb->prefix . 'gd_sedi';
    $wpdb->query("DROP TABLE IF EXISTS $table_name_sedi");

    $table_name_ferie_permessi = $wpdb->prefix . 'gd_ferie_permessi';
    $wpdb->query("DROP TABLE IF EXISTS $table_name_ferie_permessi");
}
?>
