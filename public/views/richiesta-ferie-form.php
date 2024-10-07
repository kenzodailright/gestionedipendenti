<!-- Template HTML per il frontend - Richiesta di Ferie -->
<div id="gd-ferie-permessi-container">
    <h2>Richiesta di Ferie e Permessi</h2>
    <form id="gd-ferie-permessi-form" method="post" enctype="multipart/form-data">
        <label for="tipo">Tipo di richiesta:</label>
        <select name="tipo" id="tipo" required>
            <option value="ferie">Ferie</option>
            <option value="permesso">Permesso</option>
            <option value="malattia">Malattia</option>
            <option value="congedo_parentale">Congedo Parentale</option>
            <option value="infortunio">Infortunio sul Lavoro</option>
            <option value="formazione">Formazione</option>
        </select>

        <div id="data-container">
            <label for="data_inizio">Data Inizio:</label>
            <input type="date" name="data_inizio" id="data_inizio" required>

            <label for="data_fine">Data Fine:</label>
            <input type="date" name="data_fine" id="data_fine" required>
        </div>

        <div id="ore-container" style="display: none;">
            <label for="ora_inizio">Ora Inizio:</label>
            <input type="time" name="ora_inizio" id="ora_inizio">

            <label for="ora_fine">Ora Fine:</label>
            <input type="time" name="ora_fine" id="ora_fine">
        </div>

        <label for="note">Note:</label>
        <textarea name="note" id="note" rows="4" placeholder="Inserisci eventuali note"></textarea>

        <div id="allegato-container">
            <label for="allegato">Carica Documentazione:</label>
            <input type="file" name="allegato" id="allegato">
        </div>

        <input type="submit" value="Invia Richiesta">
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tipoSelect = document.getElementById("tipo");
        const dataContainer = document.getElementById("data-container");
        const oreContainer = document.getElementById("ore-container");
        const allegatoContainer = document.getElementById("allegato-container");
        const dataInizioInput = document.getElementById("data_inizio");
        const dataFineInput = document.getElementById("data_fine");

        // Imposta la data minima su oggi per evitare selezione di date passate
        const today = new Date().toISOString().split("T")[0];
        dataInizioInput.setAttribute("min", today);
        dataFineInput.setAttribute("min", today);

        tipoSelect.addEventListener("change", function() {
            if (tipoSelect.value === "permesso" || tipoSelect.value === "formazione") {
                dataContainer.style.display = "none";
                oreContainer.style.display = "block";
            } else {
                dataContainer.style.display = "block";
                oreContainer.style.display = "none";
            }

            if (tipoSelect.value === "malattia") {
                allegatoContainer.querySelector("input[type='file']").required = true;
            } else {
                allegatoContainer.querySelector("input[type='file']").required = false;
            }
        });

        // Verifica il preavviso minimo per ferie e permessi
        dataInizioInput.addEventListener("change", function() {
            if (tipoSelect.value === "ferie") {
                const preavvisoMinimo = 7; // giorni di preavviso per ferie
                const dataInizio = new Date(dataInizioInput.value);
                const dataOggi = new Date();
                const diffGiorni = Math.ceil((dataInizio - dataOggi) / (1000 * 60 * 60 * 24));
                if (diffGiorni < preavvisoMinimo) {
                    alert("Devi dare almeno " + preavvisoMinimo + " giorni di preavviso per le ferie.");
                    dataInizioInput.value = "";
                }
            } else if (tipoSelect.value === "permesso") {
                const urgenza = prompt("Inserisci il livello di urgenza del permesso (alto, medio, basso):");
                let preavvisoMinimo = 0;
                if (urgenza === "medio") {
                    preavvisoMinimo = 1.5; // 36 ore lavorative
                } else if (urgenza === "basso") {
                    preavvisoMinimo = 3; // 72 ore lavorative
                }
                if (preavvisoMinimo > 0) {
                    const dataInizio = new Date(dataInizioInput.value);
                    const dataOggi = new Date();
                    const diffGiorni = Math.ceil((dataInizio - dataOggi) / (1000 * 60 * 60 * 24));
                    if (diffGiorni < preavvisoMinimo) {
                        alert("Devi dare almeno " + preavvisoMinimo + " giorni di preavviso per il permesso di livello " + urgenza + ".");
                        dataInizioInput.value = "";
                    }
                }
            }
        });

        // Verifica la disponibilità delle date/orari
        dataInizioInput.addEventListener("change", function() {
            // Simulazione verifica disponibilità - da implementare con una chiamata AJAX al server
            const isDisponibile = Math.random() > 0.5; // Simulazione casuale
            if (!isDisponibile) {
                alert("Le date selezionate non sono disponibili. Per favore scegli un'altra data.");
                dataInizioInput.value = "";
            }
        });

        dataFineInput.addEventListener("change", function() {
            const dataInizio = new Date(dataInizioInput.value);
            const dataFine = new Date(dataFineInput.value);
            const diffGiorni = Math.ceil((dataFine - dataInizio) / (1000 * 60 * 60 * 24));
            if (diffGiorni > 14) {
                alert("Non puoi richiedere più di 14 giorni lavorativi di fila.");
                dataFineInput.value = "";
            }
        });
    });
</script>
