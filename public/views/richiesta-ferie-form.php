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
    });
</script>
