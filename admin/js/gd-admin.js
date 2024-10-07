/**
 * File: gd-admin.js
 * Descrizione: Script per il backend del plugin.
 */

document.addEventListener("DOMContentLoaded", function() {
    const approveButtons = document.querySelectorAll(".button:contains('Approva')");
    const rejectButtons = document.querySelectorAll(".button:contains('Rifiuta')");

    approveButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            alert("Richiesta approvata!");
        });
    });

    rejectButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            alert("Richiesta rifiutata!");
        });
    });
});
