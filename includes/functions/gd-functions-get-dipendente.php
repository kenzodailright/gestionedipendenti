<?php
function gd_functions_get_dipendente($id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'gd_dipendenti';
    return $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
}
?>
