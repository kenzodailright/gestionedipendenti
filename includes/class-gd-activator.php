<?php
include_once 'functions/gd-activator-activate.php';
include_once 'functions/gd-deactivator-deactivate.php';

class GD_Activator {
    public static function activate() {
        gd_activator_activate();
    }
}

class GD_Deactivator {
    public static function deactivate() {
        gd_deactivator_deactivate();
    }
}
?>
