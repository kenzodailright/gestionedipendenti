<?php

class GD_Notifications {
    // Invia una notifica email al responsabile per una nuova richiesta di ferie/permesso
    public static function notify_manager($request_id) {
        $request = self::get_request($request_id);
        if (!$request) {
            return;
        }

        $responsabile_email = self::get_responsabile_email($request->dipendente_id);
        if (!$responsabile_email) {
            return;
        }

        $subject = 'Nuova richiesta di ferie/permesso';
        $message = "Ciao,\n\nHai una nuova richiesta di " . esc_html($request->tipo) . " da parte di " . esc_html($request->dipendente_id) . ".\n";
        $message .= "Data Inizio: " . esc_html($request->data_inizio) . "\nData Fine: " . esc_html($request->data_fine) . "\n\nPer favore accedi al sistema per approvarla o rifiutarla.";

        wp_mail($responsabile_email, $subject, $message);
    }

    // Funzione di supporto per ottenere la richiesta dal database
    private static function get_request($request_id) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_ferie_permessi';
        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $request_id));
    }

    // Funzione di supporto per ottenere l'email del responsabile
    private static function get_responsabile_email($dipendente_id) {
        // Supponiamo che il responsabile sia l'amministratore per semplicità
        $admin_email = get_option('admin_email');
        return $admin_email;
    }
}

?>
