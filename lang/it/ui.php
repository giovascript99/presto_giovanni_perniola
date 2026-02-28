<?php
return
    [
        // Navbar
        'articles' => 'Articoli',
        'categories' => 'Categorie',
        'reviewerArea' => 'Zona revisore',
        'hi' => 'Ciao',
        'login' => 'Accedi',
        'register' => 'Registrati',
        'search' => 'Cerca',

        // Categories dropdown
        'hardware_core' => 'Hardware & Componenti',
        'workstations' => 'Workstations & Notebook',
        'drones_robotics' => 'Droni & Robotica',
        'neural_home' => 'Smart Home & IoT',
        'techwear' => 'Techwear & Accessori',
        'sonic_gear' => 'Audio & Sonic Gear',
        'simulations' => 'Gaming & VR',
        'e_mobility' => 'Mobilità Elettrica',

        // User dropdown
        'articleCreate' => 'Crea articolo',
        'logout' => 'Esci',
        'dashboard' => 'Dashboard Utente',

        // Hero Section title
        'heroSubtitle' => 'Hardware per la prossima era',

        // Hero Section button
        'createArticle' => 'Pubblica un articolo',

        // Header
        'recentArticles' => 'Articoli recenti',
        'noArticles' => 'Non sono ancora stati creati articoli',

        // Card component
        'detail' => 'Dettaglio',

        // Footer revisor request
        'revisorRequestTitle' => 'Vuoi diventare revisore?',
        'revisorRequestSubtitle' => 'Cliccando il bottone sottostante farai richiesta al nostro admin.',
        'revisorButton' => 'Diventa revisore',

        // Article index
        'exploreArticle' => 'Esplora i nostri articoli',
        'noArticlesIndex' => 'Non ci sono ancora articoli in questa sezione',
        'articles' => 'Articoli',

        // Article byCategory
        'byCategory_h1' => 'Articoli della categoria: ',
        'noArticleByCategory' => 'Non sono ancora stati creati articoli per questa categoria!',
        'firstInPublish' => 'Vuoi essere il primo?',

        // Article create
        'title' => 'Titolo',
        'description' => 'Descrizione',
        'price' => 'Prezzo',
        'selectCategory' => 'Seleziona una categoria',
        'btnCreate' => 'Crea',
        'uploadImages' => 'Carica immagini',
        'photoPreview' => 'Anteprima foto',

        // Article edit
        'editArticle' => "Modifica l'articolo",
        'saveAndSend' => 'Salva Modifiche e Invia a Revisione',

        // Article show
        'backToArticle' => 'Torna agli articoli',

        // Searched
        'searchResult' => 'Risultati per la ricerca',
        'articleMatch' => 'Nessun articolo corrisponde alla tua ricerca',
        'allArticles' => 'Sfoglia tutti gli articoli',

        // ArticleShow
        'soldBy' => 'Venduto da',
        'publishedOn' => 'Pubblicato il',

        // Revisor
        'revisorDashboard' => 'Dashboard del revisore',
        'image' => 'Immagine',
        'noImage' => "L'utente non ha caricato alcuna immagine per questo articolo.",
        'author' => 'Autore',
        'accept' => 'Accetta',
        'refuse' => 'Rifiuta',
        'greatJob' => 'Ottimo lavoro!',
        'noReview' => 'Al momento non ci sono nuovi articoli da revisionare.',
        'backToHome' => 'Torna alla homepage',

        // User dashboard
        'myDashboard' => 'La mia dashboard',
        'newArticle' => 'Nuovo articolo',
        'totalArticles' => 'Totale Articoli',
        'published' => 'Pubblicati',
        'underReview' => 'In Revisione',
        'category' => 'Categoria',
        'status' => 'Stato',
        'date' => 'Data',
        'actions' => 'Azioni',
        'publishedSingular' => 'Pubblicato',
        'rejected' => 'Rifiutato',
        'edit' => 'Modifica',
        'delete' => 'Elimina',
        'confirmDelete' => 'Sei sicuro di voler eliminare questo articolo?',
        'createArticleFirst' => 'CREA_PRIMO_ARTICOLO',

        // Login
        'signIn' => 'Accedi',
        'emailAddress' => 'Indirizzo e-mail',
        'password' => 'Password',
        'notRegistered' => 'Non sei ancora registrato?',
        'signUp' => 'Registrati',

        // Sign up
        'name' => 'Nome',
        'confirmPassword' => 'Conferma la password',

        // Mail
        'revisorRequestTitle' => 'Un utente ha chiesto di lavorare con noi',
        'userData' => 'Ecco i suoi dati',
        'name' => 'Nome',
        'revisorActionText' => 'Se vuoi renderlo revisore, clicca qui sotto:',
        'makeRevisorBtn' => 'Rendi revisore',
        // BecomeRevisor
        'revisorMailSubject' => "Rendi revisore l'utente :name",

        // Messages
        // Errors
        'titleRequired' => 'Il titolo è obbligatorio.',
        'titleMin' => 'Il titolo è troppo corto.',
        'descriptionRequired' => 'La descrizione è obbligatoria.',
        'descriptionMin' => 'La descrizione è troppo corta.',
        'priceRequired' => 'Il prezzo è obbligatorio.',
        'priceNumeric' => 'Il prezzo deve essere un numero.',
        'categoryRequired' => 'La categoria è obbligatoria.',
        'errorImage' => 'Il file deve essere un\'immagine.',
        'errorMax2mb' => 'Ogni immagine può pesare al massimo 2MB.',
        'errorMax6Images' => 'Puoi caricare al massimo 6 immagini.',
        // Article create
        'articleCreated' => 'Articolo creato correttamente!',
        // Article edit
        'articleUpdated' => 'Articolo aggiornato con successo. È di nuovo in fase di revisione.',
        // ArticleController
        'unauthorized' => 'Non sei autorizzato a compiere questa azione.',
        'articleDeleted' => 'Articolo eliminato definitivamente.',
        // Revisor dashboard
        'acceptedMessage' => "Hai accettato l'articolo :title",
        'rejectedMessage' => "Hai rifiutato l'articolo :title",
        'becomeRevisorRequest' => 'Complimenti, hai richiesto di diventare revisore',
        // Middleware isRevisor
        'revisorOnly' => 'Zona riservata ai revisori',
    ];
