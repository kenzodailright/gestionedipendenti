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

        $dipendente_info = get_userdata($request->dipendente_id);
        $dipendente_nome = $dipendente_info ? $dipendente_info->display_name : 'Dipendente Sconosciuto';

        $link_approvazione = admin_url("admin.php?page=gd-richieste-ferie&request_id=" . $request_id . "&action=approve");
        $link_rifiuto = admin_url("admin.php?page=gd-richieste-ferie&request_id=" . $request_id . "&action=reject");

        $data = [
            'tipo_richiesta' => esc_html($request->tipo),
            'nome_dipendente' => esc_html($dipendente_nome),
            'data_inizio' => esc_html($request->data_inizio),
            'data_fine' => esc_html($request->data_fine),
            'link_approvazione' => esc_url($link_approvazione),
            'link_rifiuto' => esc_url($link_rifiuto)
        ];

        $message = self::load_template('notify-manager', $data);

        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($responsabile_email, 'Nuova richiesta di ferie/permesso', $message, $headers);
    }

    // Funzione di supporto per ottenere la richiesta dal database
    private static function get_request($request_id) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_ferie_permessi';
        return $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $request_id));
    }

    // Funzione di supporto per ottenere l'email del responsabile
    private static function get_responsabile_email($dipendente_id) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_dipendenti';
        $responsabile_id = $wpdb->get_var($wpdb->prepare("SELECT responsabile_id FROM $table_name WHERE id = %d", $dipendente_id));
        
        if ($responsabile_id) {
            $responsabile_info = get_userdata($responsabile_id);
            if ($responsabile_info) {
                return $responsabile_info->user_email;
            }
        }
        
        // Se il responsabile non è trovato, utilizza l'admin
        return get_option('admin_email');
    }

    // Carica un template HTML per l'email e sostituisce i segnaposto con i dati forniti
    private static function load_template($template_name, $data) {
        $template_path = GD_PLUGIN_PATH . 'templates/email/' . $template_name . '.html';
        
        if (file_exists($template_path)) {
            $template = file_get_contents($template_path);
            
            foreach ($data as $key => $value) {
                $template = str_replace("{{" . $key . "}}", $value, $template);
            }
            
            return $template;
        }
        
        return '';
    }
}

?>
