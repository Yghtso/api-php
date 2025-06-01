📚 API Gestione Libri - Progetto Scolastico

Questo progetto è una semplice API PHP creata per gestire una collezione di libri. È stata sviluppata come parte di un progetto scolastico.
🚀 Funzionalità Implementate

Attualmente, l'API supporta le seguenti operazioni:

    GET /books: Recupera un elenco di tutti i libri disponibili.
    DELETE /books/{id}: Rimuove un libro specifico in base al suo ID.
    POST /books: Aggiunge un nuovo libro alla collezione.

    Al momento, le funzionalità CRUD (Create, Read, Update, Delete) sono implementate parzialmente. Manca la funzionalità di UPDATE (modifica di un libro esistente).

🛠️ Endpoint dell'API

Di seguito trovi i dettagli per ogni endpoint disponibile.
📖 GET /books

Recupera un elenco di tutti i libri presenti nel database.

    Metodo: GET

    URL Richiesta: https://soareesreact.ddns.net/books

    Risposta:
        Un array JSON contenente gli oggetti libro. Ogni libro includerà tutti i suoi campi (es. id, title, author, published_at, cover_image).
    JSON

    [
        {
            "id": 1,
            "title": "Il Signore degli Anelli",
            "author": "J.R.R. Tolkien",
            "published_at": "1954-07-29T00:00:00Z",
            "cover_image": "https://example.com/lotr_cover.jpg"
        },
        {
            "id": 2,
            "title": "1984",
            "author": "George Orwell",
            "published_at": "1949-06-08T00:00:00Z",
            "cover_image": "https://example.com/1984_cover.jpg"
        }
        // ... altri libri
    ]

🗑️ DELETE /books/{id}

Rimuove un libro specifico dal database utilizzando l'ID del libro.

    Metodo: DELETE

    URL Richiesta: https://soareesreact.ddns.net/books/{id}
        Sostituisci {id} con l'ID numerico del libro che desideri eliminare.
        Esempio: https://soareesreact.ddns.net/books/1 (elimina il libro con ID 1)

    Risposta:
        Un oggetto JSON che indica se l'operazione di eliminazione è andata a buon fine.
    JSON

{
    "deleted": true
}

oppure
JSON

    {
        "deleted": false
    }

    (ad esempio, se il libro con l'ID specificato non esiste).

✨ POST /books

Aggiunge un nuovo libro al database. Le informazioni del libro devono essere inviate come dati JSON nel corpo della richiesta.

    Metodo: POST

    URL Richiesta: https://soareesreact.ddns.net/books

    Header Richiesta:
        Content-Type: application/json

    Corpo della Richiesta (Raw JSON):
    Il JSON deve contenere i seguenti campi:
        title (stringa): Il titolo del libro.
        author (stringa): L'autore del libro.
        published_at (stringa, timestamp): La data di pubblicazione in formato ISO 8601 (es. AAAA-MM-GGTHH:mm:ssZ).
        cover_image (stringa): Un link all'immagine di copertina del libro.

    Esempio di Corpo Richiesta:
    JSON

{
    "title": "Clean Architecture",
    "author": "Robert C. Martin",
    "published_at": "2017-09-20T00:00:00Z",
    "cover_image": "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmiro.medium.com%2Fmax%2F1103%2F1*PKsDuPxNoKJyJvmlLc64qg.jpeg&f=1&nofb=1&ipt=f12b0a4703bbcc36bbf1f4125c672a956c5f10a02992b7e1e253590523bd608d"
}

Risposta:

    Un oggetto JSON che conferma la creazione del libro e restituisce l'ID del nuovo libro inserito.

JSON

{
    "message": "Book created",
    "id": "6"
}