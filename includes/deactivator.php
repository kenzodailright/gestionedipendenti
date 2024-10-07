<?php

class GD_Deactivator {
    // Funzione chiamata durante la disattivazione del plugin
    public static function deactivate() {
        // In questo caso, non eliminiamo le tabelle del database per non perdere i dati esistenti
        // Si potrebbe scegliere di rimuovere i dati in fase di disinstallazione se necessario
    }
}

?>
