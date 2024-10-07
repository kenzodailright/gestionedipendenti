<?php

class GD_Helper_Functions {
    // Funzione per ottenere il nome completo del dipendente dato il suo ID
    public static function get_employee_name($employee_id) {
        $user_info = get_userdata($employee_id);
        if ($user_info) {
            return $user_info->display_name;
        }
        return 'Dipendente Sconosciuto';
    }

    // Funzione per verificare se l'utente corrente è un responsabile
    public static function is_manager($user_id = null) {
        if (is_null($user_id)) {
            $user_id = get_current_user_id();
        }
        $user = get_userdata($user_id);
        if ($user && in_array('gd_responsabile', (array) $user->roles)) {
            return true;
        }
        return false;
    }

    // Funzione per verificare se l'utente corrente è un dipendente
    public static function is_employee($user_id = null) {
        if (is_null($user_id)) {
            $user_id = get_current_user_id();
        }
        $user = get_userdata($user_id);
        if ($user && in_array('gd_dipendente', (array) $user->roles)) {
            return true;
        }
        return false;
    }
}

?>
