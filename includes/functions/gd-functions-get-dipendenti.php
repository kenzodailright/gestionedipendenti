<?php
function gd_functions_get_dipendenti() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'gd_dipendenti';
    return $wpdb->get_results("SELECT * FROM $table_name");
}
?>
