<?php
function gd_functions_update_dipendente($id, $data) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'gd_dipendenti';
    return $wpdb->update($table_name, $data, array('id' => $id));
}
?>
