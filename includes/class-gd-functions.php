<?php
class GD_Functions {
    public static function get_dipendenti() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_dipendenti';
        return $wpdb->get_results("SELECT * FROM $table_name");
    }

    public static function get_dipendente($id) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_dipendenti';
        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
    }

    public static function update_dipendente($id, $data) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_dipendenti';
        return $wpdb->update($table_name, $data, array('id' => $id));
    }

    public static function create_richiesta_ferie_permessi($data) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_ferie_permessi';
        return $wpdb->insert($table_name, $data);
    }

    public static function get_richieste_ferie_permessi() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_ferie_permessi';
        return $wpdb->get_results("SELECT * FROM $table_name");
    }

    public static function update_richiesta_ferie_permessi($id, $data) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_ferie_permessi';
        return $wpdb->update($table_name, $data, array('id' => $id));
    }
}
?>
