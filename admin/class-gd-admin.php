<?php

class GD_Admin {
    // Inizializza il backend del plugin
    public static function init() {
        add_action('admin_menu', [self::class, 'add_admin_menu']);
        add_action('admin_enqueue_scripts', [self::class, 'enqueue_scripts']);
    }

    // Aggiunge il menu di amministrazione per il plugin
    public static function add_admin_menu() {
        add_menu_page(
            'Gestione Dipendenti',
            'Gestione Dipendenti',
            'manage_options',
            'gd-gestione-dipendenti',
            [self::class, 'render_admin_page'],
            'dashicons-groups',
            6
        );
    }

    // Carica gli script e gli stili necessari per il backend
    public static function enqueue_scripts($hook) {
        if ($hook != 'toplevel_page_gd-gestione-dipendenti') {
            return;
        }
        wp_enqueue_style('gd-admin-css', GD_PLUGIN_URL . 'admin/css/gd-admin.css');
        wp_enqueue_script('gd-admin-js', GD_PLUGIN_URL . 'admin/js/gd-admin.js', ['jquery'], null, true);
    }

    // Renderizza la pagina di amministrazione del plugin
    public static function render_admin_page() {
        ?>
        <div class="wrap">
            <h1>Gestione Dipendenti - Richieste di Ferie e Permessi</h1>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dipendente</th>
                        <th>Tipo</th>
                        <th>Data Inizio</th>
                        <th>Data Fine</th>
                        <th>Stato</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php self::list_requests(); ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    // Elenca le richieste di ferie e permessi
    public static function list_requests() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'gd_ferie_permessi';
        $requests = $wpdb->get_results("SELECT * FROM $table_name");

        if ($requests) {
            foreach ($requests as $request) {
                $user_info = get_userdata($request->dipendente_id);
                echo '<tr>';
                echo '<td>' . esc_html($request->id) . '</td>';
                echo '<td>' . esc_html($user_info->display_name) . '</td>';
                echo '<td>' . esc_html($request->tipo) . '</td>';
                echo '<td>' . esc_html($request->data_inizio) . '</td>';
                echo '<td>' . esc_html($request->data_fine) . '</td>';
                echo '<td>' . esc_html($request->stato) . '</td>';
                echo '<td><a href="#" class="button">Approva</a> <a href="#" class="button">Rifiuta</a></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="7">Nessuna richiesta trovata.</td></tr>';
        }
    }
}

// Inizializza il backend del plugin
GD_Admin::init();

?>
