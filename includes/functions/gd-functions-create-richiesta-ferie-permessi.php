<?php
function gd_functions_create_richiesta_ferie_permessi($data) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'gd_ferie_permessi';
    return $wpdb->insert($table_name, $data);
}
?>
