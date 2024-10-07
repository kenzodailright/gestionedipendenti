<?php

class GD_Admin_Menu {
    // Inizializza il menu di amministrazione per il plugin
    public static function init() {
        add_action('admin_menu', [self::class, 'add_menus']);
    }

    // Aggiunge le voci di menu per il plugin
    public static function add_menus() {
        add_menu_page(
            'Gestione Dipendenti',
            'Gestione Dipendenti',
            'manage_options',
            'gd-gestione-dipendenti',
            [self::class, 'render_main_page'],
            'dashicons-groups',
            6
        );

        add_submenu_page(
            'gd-gestione-dipendenti',
            'Richieste di Ferie',
            'Richieste di Ferie',
            'manage_options',
            'gd-richieste-ferie',
            [self::class, 'render_leave_requests_page']
        );
    }

    // Renderizza la pagina principale del plugin
    public static function render_main_page() {
        echo '<div class="wrap"><h1>Gestione Dipendenti</h1><p>Benvenuto nella Gestione Dipendenti.</p></div>';
    }

    // Renderizza la pagina delle richieste di ferie
    public static function render_leave_requests_page() {
        echo '<div class="wrap"><h1>Richieste di Ferie</h1>';
        GD_Admin::list_requests();
        echo '</div>';
    }
}

// Inizializza il menu di amministrazione
GD_Admin_Menu::init();

?>
