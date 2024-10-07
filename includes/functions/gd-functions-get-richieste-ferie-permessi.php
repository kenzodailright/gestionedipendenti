<?php
function gd_functions_get_richieste_ferie_permessi() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'gd_ferie_permessi';
    return $wpdb->get_results("SELECT * FROM $table_name");
}
?>
