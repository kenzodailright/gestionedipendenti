<?php

class GD_Frontend {
    // Inizializza il frontend del plugin
    public static function init() {
        add_shortcode('gd_richiesta_ferie', [self::class, 'render_request_form']);
        add_action('wp_enqueue_scripts', [self::class, 'enqueue_scripts']);
    }

    // Carica gli script e gli stili necessari
    public static function enqueue_scripts() {
        wp_enqueue_style('gd-frontend-css', GD_PLUGIN_URL . 'public/css/gd-frontend.css');
        wp_enqueue_script('gd-frontend-js', GD_PLUGIN_URL . 'public/js/gd-frontend.js', ['jquery'], null, true);
    }

    // Renderizza il modulo per la richiesta di ferie e permessi
    public static function render_request_form() {
        if (!is_user_logged_in()) {
            return '<p>Devi essere loggato per fare una richiesta di ferie o permesso.</p>';
        }

        ob_start();
        ?>
        <form id="gd-ferie-permessi-form" method="post">
            <label for="tipo">Tipo di richiesta:</label>
            <select name="tipo" id="tipo" required>
                <option value="ferie">Ferie</option>
                <option value="permesso">Permesso</option>
            </select>

            <label for="data_inizio">Data Inizio:</label>
            <input type="date" name="data_inizio" id="data_inizio" required>

            <label for="data_fine">Data Fine:</label>
            <input type="date" name="data_fine" id="data_fine" required>

            <input type="submit" value="Invia Richiesta">
        </form>
        <?php
        return ob_get_clean();
    }
}

// Inizializza il frontend del plugin
GD_Frontend::init();

?>
