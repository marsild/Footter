# Footter
## Progetto di Tecnologie Web a.a. 2022/23
Obiettivo: Scrivere un’applicazione web accessibile e responsive che metta a disposizione le funzionalità più comuni di un social network (registrazione e login, post con testo e/o foto, home con feed di post di utenti seguiti, commenti di post, follow di utente, profilo utente con post, follow e follower, notifiche) su una qualsiasi tematica a scelta (in questo caso il calcio).

L'applicazione inoltre permette di:
* selezionare le proprie squadre preferite in fase di iscrizione
* aggiornare le squadre preferite in un secondo momento
* menzionare una o due squadre in un post
* filtrare i post in base alle tue squadre preferite, sia nella home che nel profilo di un singolo utente
* mettere like ai post
* vedere l'elenco dei like dei propri post
* cercare altri utenti
* eliminare le notifiche dall'elenco, eliminare i propri post, eliminare i propri commenti
* modificare immagine profilo e dati personali

## Istruzioni
* Clonare e posizionare la repository all'interno della cartella `htdocs` di XAMPP.
* Avviare `MySQL Database` e `Apache Web Server` su XAMPP.
* Verificare che la porta utilizzata da MySQL Database e quella utilizzata nella creazione del DatabaseHelper ([bootstrap.php](https://github.com/marsild/Footter/blob/main/bootstrap.php)) corrispondano.
* Creare il DB su [localhost/phpmyadmin](http://localhost/phpmyadmin/) con il contenuto di [FootterDB.ddl](https://github.com/marsild/Footter/blob/main/db/FootterDB.ddl).
* Popolare la tabella `squadre` del DB ([inserisci_dati.sql](https://github.com/marsild/Footter/blob/main/db/inserisci_dati.sql)).
* Per aprire il sito andare su [localhost/Footter](http://localhost/Footter/index.php).

In alternativa se si vuole già avere una versione prepolata del DB utilizzare il contenuto del file [footter.sql](https://github.com/marsild/Footter/blob/main/db/footter.sql) (solamente dopo aver creato il DB con `CREATE DATABASE footter`). Le password degli utenti in generale sono composte dall'username con prima lettera maiuscola ed `1!` alla fine (es: `Username1!`). Per gli username corti `Useruser1!`.
## Licenza
[GNU General Public License v3.0](https://github.com/marsild/Footter/blob/main/LICENSE)

## Autori
* Pasini Luca
* Spahiu Marsild

