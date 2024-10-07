/**
 * File: gd-frontend.js
 * Descrizione: Script per il frontend del plugin.
 */

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("gd-ferie-permessi-form");
    if (form) {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Richiesta inviata con successo!");
        });
    }
});
