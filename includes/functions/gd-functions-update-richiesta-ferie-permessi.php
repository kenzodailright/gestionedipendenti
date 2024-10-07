<?php
function gd_functions_update_richiesta_ferie_permessi($id, $data) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'gd_ferie_permessi';
    return $wpdb->update($table_name, $data, array('id' => $id));
}
?>
