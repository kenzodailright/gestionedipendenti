<?php

class GD_Roles {
    // Definisce i ruoli necessari per il plugin
    public static function add_roles() {
        add_role('gd_dipendente', 'Dipendente', [
            'read' => true,
        ]);

        add_role('gd_responsabile', 'Responsabile', [
            'read' => true,
            'manage_ferie_permessi' => true,
        ]);
    }

    // Rimuove i ruoli definiti dal plugin
    public static function remove_roles() {
        remove_role('gd_dipendente');
        remove_role('gd_responsabile');
    }

    // Aggiunge le capacità ai ruoli esistenti
    public static function add_capabilities() {
        $admin = get_role('administrator');
        if ($admin) {
            $admin->add_cap('manage_ferie_permessi');
            $admin->add_cap('manage_gd_settings');
        }

        $responsabile = get_role('gd_responsabile');
        if ($responsabile) {
            $responsabile->add_cap('manage_ferie_permessi');
        }
    }

    // Rimuove le capacità dai ruoli esistenti
    public static function remove_capabilities() {
        $admin = get_role('administrator');
        if ($admin) {
            $admin->remove_cap('manage_ferie_permessi');
            $admin->remove_cap('manage_gd_settings');
        }

        $responsabile = get_role('gd_responsabile');
        if ($responsabile) {
            $responsabile->remove_cap('manage_ferie_permessi');
        }
    }
}

?>
