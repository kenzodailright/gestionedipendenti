# Plugin Gestione Dipendenti per WordPress

**Versione:** 1.0.0  
**Autore:** [Il Tuo Nome]  
**Licenza:** GPLv2 o successiva

## Indice

- [Introduzione](#introduzione)
- [Caratteristiche](#caratteristiche)
  - [Gestione dei Dipendenti](#gestione-dei-dipendenti)
  - [Gestione Ferie e Permessi](#gestione-ferie-e-permessi)
  - [Dashboard e Reportistica](#dashboard-e-reportistica)
  - [Gestione Documenti](#gestione-documenti)
  - [Notifiche e Promemoria](#notifiche-e-promemoria)
  - [Sicurezza e Conformità](#sicurezza-e-conformità)
  - [Interfaccia Utente ed Esperienza](#interfaccia-utente-ed-esperienza)
  - [Funzionalità Aggiuntive](#funzionalità-aggiuntive)
- [Installazione](#installazione)
- [Configurazione](#configurazione)
- [Utilizzo](#utilizzo)
  - [Per i Dipendenti](#per-i-dipendenti)
  - [Per i Responsabili](#per-i-responsabili)
  - [Per gli Admin](#per-gli-admin)
- [Struttura del Plugin](#struttura-del-plugin)
- [Sicurezza](#sicurezza)
- [Contribuire](#contribuire)
- [Supporto](#supporto)
- [Licenza](#licenza)

## Introduzione

**Gestione Dipendenti** è un plugin completo per WordPress progettato per semplificare la gestione dei dipendenti, inclusa la gestione di ferie, permessi e varie altre categorie di assenza. Supporta dipendenti interni ed esterni, offre capacità multi-sede e garantisce misure di sicurezza robuste per proteggere informazioni sensibili.

## Caratteristiche

### Gestione dei Dipendenti

- **Amministrazione Completa:** Gestisci dipendenti interni ed esterni, inclusi orari di lavoro, ferie, permessi, malattie, congedi parentali, infortuni sul lavoro e formazione.
- **Profili Dipendenti:** Ogni dipendente ha un profilo dedicato dove gli amministratori possono modificare gli orari di lavoro e i dipendenti possono visualizzarli nel frontend.
- **Supporto Multi-Sede:** Gestisci più sedi aziendali, trattando ciascuna come un'unità separata con responsabili distinti e una visualizzazione centralizzata per il super-admin.
- **Copertura Oraria:** In ogni sede deve esserci almeno un dipendente che copra tutti gli orari di apertura, garantendo la continuità del servizio durante le assenze.
- **Creazione Automatica di Ruoli e Database:** Crea automaticamente i ruoli necessari e le tabelle del database all'attivazione del plugin, pulendo completamente alla disattivazione per non lasciare tracce.

### Gestione Ferie e Permessi

- **Categorie di Ferie:** Gestisci varie categorie di assenze, tra cui ferie annuali, permessi, malattie, congedi parentali, infortuni sul lavoro e formazione.
- **Richieste di Ferie:** I dipendenti possono inviare richieste di ferie e permessi specificando date e ore, inclusi eventuali commenti.
- **Flusso di Approvazione:** I responsabili ricevono notifiche via email con pulsanti "Approva" e "Rifiuta". Le richieste approvate aggiornano automaticamente il sistema e inviano una conferma al dipendente.
- **Integrazione del Calendario:** Visualizza tutte le ferie e i permessi approvati su un calendario, garantendo che almeno un dipendente sia sempre disponibile durante gli orari di apertura.
- **Limitazioni e Controlli:**
  - Impedisce richieste retroattive.
  - Limita la durata delle richieste a un massimo di 14 giorni lavorativi consecutivi.
  - Evita sovrapposizioni tra le richieste dei dipendenti, assicurando che i giorni già prenotati non siano disponibili per altri.
  - Permessi gestiti in ore, con possibilità di richiedere anche molte ore consecutive per coprire intere giornate.

### Dashboard e Reportistica

- **Dashboard Personale:** I dipendenti possono visualizzare i giorni di ferie e permessi residui e utilizzati tramite una dashboard personalizzata sulla homepage.
- **Report Mensili:** Invia automaticamente report mensili dettagliati in formato PDF ed Excel ai responsabili e ai consulenti del lavoro, includendo tutte le categorie di ferie e permessi.
- **Statistiche e Obiettivi:** I dipendenti possono vedere statistiche personali come ore lavorate e obiettivi completati. I responsabili possono impostare e monitorare gli obiettivi per ogni dipendente.
- **Reportistica Dettagliata:** I report mensili includono sia totali che dettagli delle assenze, con possibilità di esportare in PDF o Excel.

### Gestione Documenti

- **Pagine Riservate:** I dipendenti hanno accesso a una pagina riservata dove possono visualizzare e scaricare documenti come contratti, buste paga, certificati medici, ecc.
- **Accesso Sicuro ai Documenti:** I documenti sono protetti con OTP (One-Time Password) tramite email o app autenticatore come Google Authenticator, con registrazione della data di prima visualizzazione, OTP utilizzato e indirizzo IP.
- **Caricamento e Gestione dei Documenti:** I responsabili e gli admin possono caricare, eliminare e assegnare documenti specifici ai dipendenti. I documenti sono archiviati in modo sicuro e non sono accessibili tramite link diretti.
- **Protezione dei Documenti Caricati:** I documenti caricati non devono essere accessibili dall’esterno tramite link. Se si tenta di accedere direttamente al link del documento senza essere loggati, il sito reindirizza alla pagina di login. Implementare l’archiviazione dei file in una cartella nella root del sito non accessibile dall’esterno.
- **Gestione delle Visualizzazioni:** Traccia anche la posizione geografica o l’indirizzo IP del dipendente che accede al documento.
- **Eliminazione Documenti:** Possibilità di eliminare singoli documenti o più documenti contemporaneamente.

### Notifiche e Promemoria

- **Notifiche Email:** Notifiche immediate via email per richieste di ferie, approvazioni, rifiuti e caricamenti di documenti con template HTML personalizzabili.
- **Promemoria Automatici:** Programma promemoria automatici per richieste pendenti e documenti non visualizzati.
- **Popup di Conferma:** Gestisci conferme e messaggi di errore tramite popup intuitivi nell'interfaccia del plugin.
- **Promemoria Personalizzabili:** L’intervallo dei promemoria deve essere personalizzabile per adattarsi alle esigenze aziendali.
- **Pulsanti di Azione nelle Email:** Aggiungi pulsanti nelle email, come "Vai al documento", "Accetta" o "Rifiuta", per azioni rapide.

### Sicurezza e Conformità

- **Crittografia dei Dati:** Tutti i dati sensibili, inclusi documenti come contratti e buste paga, sono criptati lato server. Utilizza crittografia SSL per tutte le comunicazioni client-server.
- **Controllo Accessi:** Controlli di accesso rigorosi basati sui ruoli garantiscono che solo gli utenti autorizzati possano accedere a dati e funzionalità specifiche.
- **Log delle Attività:** Tutte le modifiche e le visualizzazioni dei documenti sono registrate con timestamp e indirizzi IP, accessibili solo agli admin.
- **Autenticazione OTP:** Autenticazione sicura basata su OTP necessaria per accedere a documenti sensibili e eseguire azioni critiche.
- **Tracciamento Accessi Documenti:** Oltre alla data e all’ora di visualizzazione dei documenti riservati, traccia anche dati come la posizione geografica o l’indirizzo IP del dipendente che accede al documento.

### Interfaccia Utente ed Esperienza

- **Design Responsivo:** Dashboard e interfaccia del plugin completamente responsivi, accessibili da smartphone e tablet.
- **Estetica Moderna:** Design fresco, innovativo e moderno integrato con il tema principale di WordPress.
- **Selezione Date Migliorata:** Utilizzo di librerie come Flatpickr o jQuery UI Datepicker per migliorare l'esperienza utente nella selezione delle date.
- **Integrazione con il Tema Principale:** Se possibile, utilizzare lo stile del tema principale per garantire una coerenza estetica. In alternativa, creare l’estetica desiderata basandosi su immagini fornite.
- **Calendario delle Disponibilità:** Nella pagina di richiesta ferie, i dipendenti possono vedere un calendario separato con i giorni già occupati da altri utenti, per pianificare meglio le proprie richieste.

### Funzionalità Aggiuntive

- **Wizard per la Configurazione Iniziale:** Procedura guidata per configurare giorni lavorativi, orari, limiti di ferie/permessi e assegnare responsabili.
- **Modifiche Manuali:** I responsabili possono modificare manualmente i saldi di ferie e permessi dei dipendenti.
- **Integrazione con Excel:** I dipendenti possono scaricare riepiloghi dettagliati delle ferie e permessi in formato Excel basati su intervalli di date selezionati.
- **Gestione delle Chiusure Aziendali:** Gli admin possono impostare date di chiusura aziendale, notificando automaticamente tutti i dipendenti e i responsabili via email.
- **Reset Ferie e Permessi:** Gli admin possono resettare tutti i saldi di ferie e permessi dei dipendenti con un semplice pulsante.
- **Invio Report ai Consulenti del Lavoro:** Invia report mensili via email ai consulenti del lavoro con template HTML dedicati, includendo dettagli sulle ferie, permessi e malattie di tutti i dipendenti.
- **Richiesta di Malattia:** I dipendenti devono caricare un certificato medico in formato PDF quando richiedono malattia.
- **Reportistica e Statistiche:** Implementa funzionalità di reportistica e statistiche avanzate.
- **Notifica Caricamento Documenti:** I dipendenti ricevono una email quando viene caricato un documento a loro assegnato nella loro area documentale privata.
- **Obiettivi Dipendenti:** I responsabili possono impostare manualmente gli obiettivi per ogni utente e monitorare il loro completamento.
- **Gestione degli Errori:** Fornisci messaggi di errore chiari in caso di problemi con l'invio dei form.
- **Urgenza dei Permessi:** I permessi possono avere una categoria di urgenza (bassa, media, alta), con diverse tempistiche di preavviso per ciascun livello.
- **Timing per Accettazione/Rifiuto:** Imposta un tempo massimo per accettare o rifiutare le richieste di ferie o permessi, durante il quale vengono inviati promemoria.
- **Conferma di Rifiuto:** Responsabili e admin possono rifiutare richieste già approvate inserendo una motivazione, che verrà inviata tramite email al dipendente.
- **Accesso Condizionato ai Documenti:** I documenti riservati possono essere visualizzati solo dopo aver inserito un OTP, e il sistema registra la data e l'ora della prima visualizzazione.

## Installazione

1. **Scarica il Plugin:**
   - Scarica il file `gestione-dipendenti.zip` dal repository.

2. **Carica su WordPress:**
   - Vai alla tua dashboard di WordPress.
   - Naviga su `Plugin > Aggiungi Nuovo`.
   - Clicca su `Carica Plugin` e seleziona il file ZIP scaricato.
   - Clicca su `Installa Ora` e poi su `Attiva`.

3. **Attiva il Plugin:**
   - Al momento dell’attivazione, il plugin creerà automaticamente i ruoli necessari e le tabelle del database.

## Configurazione

1. **Wizard di Configurazione Iniziale:**
   - Dopo l’attivazione, segui il wizard di configurazione per impostare giorni lavorativi, orari, limiti di ferie/permessi e assegnare i responsabili.

2. **Assegna Ruoli:**
   - Assicurati che i ruoli "Dipendente" e "Responsabile" siano assegnati correttamente agli utenti appropriati.

3. **Configura OTP:**
   - Naviga nelle impostazioni del plugin e configura l’OTP tramite Google Authenticator scansionando il QR code fornito.

4. **Imposta le Chiusure Aziendali:**
   - Nel pannello admin, specifica le date di chiusura aziendale. I dipendenti e i responsabili riceveranno automaticamente notifiche via email.

5. **Template Email:**
   - Personalizza i template delle email di notifica nelle impostazioni del plugin per allinearle al branding e al messaggio aziendale.

## Utilizzo

### Per i Dipendenti

- **Visualizza Dashboard:** Accedi alla dashboard personale per vedere i giorni di ferie e permessi residui e utilizzati.
- **Invia Richieste:** Naviga alla pagina dedicata per inviare richieste di ferie o permessi.
- **Visualizza Documenti:** Accedi alla pagina riservata per visualizzare e scaricare documenti protetti tramite OTP.

### Per i Responsabili

- **Approvare/Rifiutare Richieste:** Ricevi notifiche via email per le richieste di ferie e permessi e utilizza i pulsanti forniti per approvarle o rifiutarle.
- **Gestire Dipendenti:** Modifica orari di lavoro, saldi di ferie e permessi per i dipendenti assegnati.
- **Visualizzare Report:** Accedi ai report mensili dettagliati e allo stato globale delle ferie di tutti i dipendenti assegnati.
- **Modificare Manualmente Saldi:** Modifica manualmente i saldi di ferie e permessi dei dipendenti.

### Per gli Admin

- **Gestire Tutti i Dati:** Accedi e modifica tutti i dati dei dipendenti attraverso tutte le sedi aziendali.
- **Generare Report:** Ricevi automaticamente report mensili per tutti i dipendenti e inviali ai consulenti del lavoro.
- **Resettare Saldi:** Resetta i saldi di ferie e permessi di tutti i dipendenti quando necessario.
- **Gestione Chiusure Aziendali:** Imposta e gestisci le date di chiusura aziendale e invia notifiche automatiche.
- **Eliminare Documenti:** Elimina singoli documenti o più documenti contemporaneamente dei vari utenti dipendenti.

## Struttura del Plugin

```
gestione-dipendenti/
├── gestione-dipendenti.php
├── includes/
│   ├── class-gd-activator.php
│   ├── class-gd-deactivator.php
│   ├── class-gd-functions.php
│   └── libs/
│       └── GoogleAuthenticator.php
├── public/
│   ├── class-gd-public.php
│   ├── css/
│   │   └── gd-public.css
│   ├── js/
│   │   └── gd-public.js
│   └── partials/
│       ├── gd-request-form.php
│       └── gd-otp-setup.php
├── admin/
│   ├── class-gd-admin.php
│   ├── css/
│   │   └── gd-admin.css
│   ├── js/
│   │   └── gd-admin.js
│   └── partials/
│       ├── gd-admin-upload.php
│       └── gd-setup-wizard.php
```

Ogni funzionalità è incapsulata in file dedicati per garantire modularità e facilità di future modifiche.

## Sicurezza

- **Crittografia dei Dati Sensibili:** Tutti i dati sensibili, inclusi documenti come contratti e buste paga, sono criptati lato server. Utilizza crittografia SSL per tutte le comunicazioni tra client e server.
- **Controllo Accessi:** Controlli di accesso rigorosi basati sui ruoli garantiscono che solo gli utenti autorizzati possano accedere a dati e funzionalità specifiche.
- **Log delle Attività:** Tutte le modifiche e le visualizzazioni dei documenti sono registrate con timestamp e indirizzi IP, accessibili solo agli admin.
- **Autenticazione OTP:** Implementa l'accesso con OTP per garantire che solo gli utenti autorizzati possano accedere ai documenti sensibili.
- **Protezione dei Documenti:** I documenti caricati non sono accessibili dall’esterno tramite link. Sono archiviati in una cartella nella root del sito non accessibile direttamente, reindirizzando gli utenti non autenticati alla pagina di login.

## Contribuire

I contributi sono benvenuti! Segui questi passaggi:

1. **Fork del Repository**
2. **Crea un Branch per la Funzionalità**
   ```bash
   git checkout -b feature/TuaFunzionalità
   ```
3. **Commit delle Modifiche**
   ```bash
   git commit -m "Aggiungi la tua funzionalità"
   ```
4. **Push al Branch**
   ```bash
   git push origin feature/TuaFunzionalità
   ```
5. **Apri una Pull Request**

Assicurati che il tuo codice segua gli standard di codifica esistenti e includa la documentazione appropriata.

## Supporto

Per supporto, apri un problema sul [repository GitHub](https://github.com/tuonomeutente/gestione-dipendenti/issues) o contatta l'autore del plugin all'indirizzo [tuo.email@example.com](mailto:tuo.email@example.com).

## Licenza

Questo plugin è concesso in licenza sotto la GPLv2 o successiva. Puoi ridistribuirlo e/o modificarlo secondo i termini della GNU General Public License come pubblicato dalla Free Software Foundation, versione 2 della Licenza o qualsiasi versione successiva.

---

**Nota:** Assicurati di sostituire i link segnaposto, gli indirizzi email e altre informazioni personali con i tuoi dettagli effettivi prima di pubblicare il file README.md.
