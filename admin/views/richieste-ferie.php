<!-- Template HTML per il backend - Richieste di Ferie -->
<div class="wrap">
    <h1>Richieste di Ferie e Permessi</h1>
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
            <?php GD_Admin::list_requests(); ?>
        </tbody>
    </table>
</div>
