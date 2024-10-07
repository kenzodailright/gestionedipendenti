<?php
include_once 'functions/gd-functions-get-dipendenti.php';
include_once 'functions/gd-functions-get-dipendente.php';
include_once 'functions/gd-functions-update-dipendente.php';
include_once 'functions/gd-functions-create-richiesta-ferie-permessi.php';
include_once 'functions/gd-functions-get-richieste-ferie-permessi.php';
include_once 'functions/gd-functions-update-richiesta-ferie-permessi.php';

class GD_Functions {
    public static function get_dipendenti() {
        return gd_functions_get_dipendenti();
    }

    public static function get_dipendente($id) {
        return gd_functions_get_dipendente($id);
    }

    public static function update_dipendente($id, $data) {
        return gd_functions_update_dipendente($id, $data);
    }

    public static function create_richiesta_ferie_permessi($data) {
        return gd_functions_create_richiesta_ferie_permessi($data);
    }

    public static function get_richieste_ferie_permessi() {
        return gd_functions_get_richieste_ferie_permessi();
    }

    public static function update_richiesta_ferie_permessi($id, $data) {
        return gd_functions_update_richiesta_ferie_permessi($id, $data);
    }
}
?>
