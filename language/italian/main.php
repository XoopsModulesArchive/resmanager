<?php

// variabile per brillo admin del modulo  
//--menù  
define ('_MD_TITLE', 'Amministrazione modula prenotazione');  
define ('_MD_MENU1', 'Gestione dei diritti');  
define ('_MD_MENU2', 'Aggiungere una categoria');  
define ('_MD_MENU3', 'Mettere aggiornati una categoria');  
define ('_MD_MENU4', 'Configurare una prenotazione');  
define ('_MD_MENU5', 'Mettere aggiornati il configurazione d \'una prenotazione');  
define ('_MD_MENU6', 'Mettere aggiornate parecchie prenotazioni');


// variabile per brillo admin del modulo  
//--menù  
define ('_MD_RESMANAGER_SUBMENU1', 'Riservare');
define ('_MD_RESMANAGER_SUBMENU2', 'Elenco delle domande');
define ('_MD_RESMANAGER_SUBMENU3', 'Aggiungere una categoria');
define ('_MD_RESMANAGER_SUBMENU4', 'Mettere aggiornati una categoria');
define ('_MD_RESMANAGER_SUBMENU5', 'Configurare una prenotazione');
define ('_MD_RESMANAGER_SUBMENU6', 'Mettere aggiornati la configurazione di una prenotazione');

// Comune  
define ('_MD_ENR', 'Registrare');  
define ('_MD_SUPP', 'Sopprimere');  
define ('_MD_VAL', 'Convalidare');  
define ('_MD_REFUS', 'Rifiutare');  
define ('_MD_EDIT', 'Aprire');  
define ('_MD_DETAIL', 'Dettaglio');  
define ('_MD_ANNULER', 'Annullare');  
define ('_MD_BOUTONOK', 'Ok');  
define ('_MD_RETOUR', 'Ritorno');  
define ('_MD_ACTION', 'Azione');

//--elenco di valore  
define ('_MD_OK', 'Sì');  
define ('_MD_KO', 'No');  
  
define ('_MD_TYPERES_UNIQUE', 'Unico');  
define ('_MD_TYPERES_EVENEMENT', 'Avvenimento');  
define ('_MD_TYPERES_CALENDRIER', 'Calendario');  
  
define ('_MD_ETATDEM_A_VALIDER', 'Ha convalidare');  
define ('_MD_ETATDEM_VALIDE', 'Validata');  
define ('_MD_ETATDEM_REFUSEE', 'Respinta');

//--calendario  
define ('_MD_DIMANCHE_C', 'Dom');  
define ('_MD_LUNDI_C', 'Lun');  
define ('_MD_MARDI_C', 'Mar');  
define ('_MD_MERCREDI_C', 'Mer');  
define ('_MD_JEUDI_C', 'Gio');  
define ('_MD_VENDREDI_C', 'Ven');  
define ('_MD_SAMEDI_C', 'Sab');  
  
define ('_MD_DIMANCHE', 'Domenica');  
define ('_MD_LUNDI', 'Lunedì');  
define ('_MD_MARDI', 'Martedì');  
define ('_MD_MERCREDI', 'Mercoledì');  
define ('_MD_JEUDI', 'Giovedì');  
define ('_MD_VENDREDI', 'Venerdì');  
define ('_MD_SAMEDI', 'Sabato');  
  
define ('_MD_JANVIER', 'Gennaio');  
define ('_MD_FEVRIER', 'Febbraio');  
define ('_MD_MARS', 'Marzo');  
define ('_MD_AVRIL', 'Aprile');  
define ('_MD_MAI', 'Maggio');  
define ('_MD_JUIN', 'Giugno');  
define ('_MD_JUILLET', 'Luglio');  
define ('_MD_AOUT', 'Agosto');  
define ('_MD_SEPTEMBRE', 'Settembre');  
define ('_MD_OCTOBRE', 'Ottobre');  
define ('_MD_NOVEMBRE', 'Novembre');  
define ('_MD_DECEMBRE', 'Dicembre');  

define ('_MD_HEURE', 'Ora');  
define ('_MD_MINUTE', 'Minuto');  
  
define ('_MD_DATE_JOUR', 'Oggi');  
  
define ('_MD_JOUR_SUIV', 'Giorno> ');  
define ('_MD_JOUR_PREC', '<Giorno');  
  
define ('_MD_MOIS_SUIV', 'Mese >>');  
define ('_MD_MOIS_PREC', '<< Mese');  
  
define ('_MD_ANNEE_SUIV', 'Anno >>>');  
define ('_MD_ANNEE_PREC', '<<< Anno');

//--minima prenotazione  
define ('_MD_MIN_HEURE', 'Ora');


//--messaggio errore comune  
define ('_MD_ACCES_DENIED', 'non siete autorizzati ad accedere a questa pagina');   
define ('_MD_VALID_DENIED', 'non siete autorizzati a convalidare delle domande');   
define ('_MD_REFUS_DENIED', 'non siete autorizzati a rifiutare delle domande');  
define ('_MD_DEMDENIED', 'Questa domanda non vi appartiene, non avete accesso');  
define ('_MD_ACCESBD_KO', 'Un errore è sopraggiunto all\'epoca dell\'accesso alla base di dato. Contattate il webmaster.');  
define ('_MD_ERREUR_SAISIE', 'Errori di pignoramento');  
define ('_MD_MESS_DB', 'Messaggio basa di dato');  
  
define ('_MD_FORMAT_DATE_KO', 'Data scorretta');  
define ('_MD_FORMAT_NUMBER_KO', 'Numero scorretto');  
define ('_MD_NB_NOTZERO', 'Il numero deve essere superiore a zero');

// Amministrazione  
// Formulario aggiunta categoria  
define ('_MD_TADDCAT', 'Categoria prenotazione');  
define ('_MD_NOMCAT', 'Nome Categoria');  
define ('_MD_DESCRCAT', 'Descrizione Categoria');  
define ('_MD_ADDCAT', 'Aggiungere una categoria');  
define ('_MD_ADDOK', 'Categoria aggiunta');

//--Formulario edizione, supp, maj categoria,  
define ('_MD_TMAJCAT', 'Categoria prenotazione');  
define ('_MD_ENRCAT', 'Registrare');  
define ('_MD_SUPPCAT', 'Sopprimere');  
define ('_MD_EDITCAT', 'Aprire');  
define ('_MD_ENROK', 'Categoria Messa aggiornata');  
define ('_MD_SUPPOK', 'Categoria soppressa');  
define ('_MD_SUPPCATKO', 'non potete sopprimere questa categoria, delle prenotazioni sono associate a questa categoria.');

//--Formulario aggiunta prenotazione  
define ('_MD_TADDRES', 'Prenotazione');  
define ('_MD_NOMRES', 'Nome prenotazione');  
define ('_MD_DESCRRES', 'Descrizione');  
define ('_MD_OPENRES', 'Data di inizio del calendario');  
define ('_MD_CLOSERES', 'Data di fine del calendario');  
define ('_MD_TYPERES', 'Tipo');  
define ('_MD_CATRES', 'Categoria ');  
define ('_MD_VALIDRES', 'Convalida necessaria');  
define ('_MD_NBOCCRES', 'Numero di domanda totale ');  
define ('_MD_OCCPERSRES', 'Numero di domanda per membro ');  
define ('_MD_ADDRES', 'Aggiungere una prenotazione');  
define ('_MD_ADDRESOK', 'Prenotazione aggiunta');  
define ('_MD_TYPERES_QUESTION', 'Quale tipo di prenotazione vi vuole creare? ');  
define ('_MD_OPEN_SEM', 'Giorno apertura');  
define ('_MD_MIN_RES', 'Prenotazione minima');  
define ('_MD_HEURE_DEB', 'Ora Inizio');  
define ('_MD_HEURE_FIN', 'Ora fine');  
define ('_MD_HEURE_FIN_ERROR', 'L\'ora di fine deve essere superiore all\'ora di inizio');  
define ('_MD_ACTIVERES', 'Attivare prenotazione');  

// Formulario maj prenotazione  
define ('_MD_TMAJRES', 'Edizione prenotazione');  
define ('_MD_MAJRESOK', 'Prenotazione Messa aggiornata');  
define ('_MD_SUPPRESOK', 'Prenotazione soppressa');  
define ('_MD_SUPPRESKO', 'Delle domande sono associate a questa prenotazione, impossibile di sopprimerla');  
define ('_MD_LST_ALLDEM', 'Le domande dei membri');  
define ('_MD_OPEN_SUP_CLOSE', 'La data di fine del calendario deve essere superiore alla data di inizio');  
define ('_MD_OCC_SUP_NB', 'Il numero totale deve essere superiore al numero di domanda per membro');  
  
define ('_MD_NBDEMVAL', 'Numero di domande validate ');  
define ('_MD_DEMTOVAL', 'Numero di domande a convalidare ');  



// Modulo  
//--Schermo chiede di prenotazione  
define ('_MD_TITLE_MAKERESERV1', 'Scelta della categoria');  
define ('_MD_TITLE_MAKERESERV2', 'Elenco della prenotazione nella categoria');  
define ('_MD_TITLE_MAKERESERV3', 'Riservare');  
define ('_MD_TITLE_TABRESERV1', 'Nome prenotazione');  
define ('_MD_TITLE_TABRESERV2', 'Tipo');  
define ('_MD_TITLE_TABRESERV3', 'Azione');  
define ('_MD_BACK_LSTCAT', '"Elenco delle categorie');  
define ('_MD_OPERESERV', 'Riservare');  
define ('_MD_RESERV_RESULTAT', 'Risultato prenotazione');  
define ('_MD_RESERVOK', 'la Vostra prenotazione è effettuata.');  
define ('_MD_RESERNUMANDINFO', 'Se una convalida è necessaria voi riceverete una conferma. Il vostro numero di domanda è il successivo: ');  
define ('_MD_RESERVKO', 'Un errore è sopraggiunto all\'epoca della prenotazione');  
define ('_MD_RESERVFULL', 'non ci sono più di disponibilità per questa prenotazione');  
define ('_MD_RESERVFULLUSER', 'avete effettuato già il numero di prenotazione massima possibile per un membro');  
define ('_MD_FREERES', 'Disponibilità');  
define ('_MD_RESERV_NOTACTIVE', 'Questa prenotazione non è aperta');

//--Schermo mette in lista delle domande di prenotazione  
define ('_MD_TITLE_LSTDEM', 'Elenco delle vostre domande');  
define ('_MD_TITLE_TABDEM1', 'N°');  
define ('_MD_TITLE_TABDEM2', 'Data domanda');  
define ('_MD_TITLE_TABDEM3', 'Categoria');  
define ('_MD_TITLE_TABDEM4', 'Prenotazione');  
define ('_MD_TITLE_TABDEM5', 'Nome membro');  
define ('_MD_TITLE_TABDEM6', 'Stato chiede');  
define ('_MD_TITLE_TABDEM7', 'Azione');  
  
//--Pubblicare una domanda  
define ('_MD_TITLE_TITLE_NODEM', 'Domanda N°,: ');  
define ('_MD_DATE_DEM', 'Data domanda ');  
define ('_MD_DATE_VAL', 'Data Convalida ');  
define ('_MD_NOM_MEMBRE', 'Nome membro ');  
define ('_MD_STATUS_DEM', 'Stato chiede ');  
define ('_MD_MESS_REFUS', 'Messaggio');  
define ('_MD_MESSAGE_EDITDEM', 'Risultato azione');  
define ('_MD_VALDEM_OK', 'La domanda è convalidata');  
define ('_MD_REFUS_OK', 'La domanda è rifiutata molto');  
define ('_MD_REFUS_MESS_KO', 'dovete afferrare un messaggio per rifiutare la domanda');  
define ('_MD_ANNULATION_OK', 'la Vostra domanda è stata annullata');  
define ('_MD_DEM_ALREADY_VALID', 'Questa domanda è convalidata già');  
define ('_MD_DEM_ALREADY_REFUSEE', 'Questa domanda è stata rifiutata già');

//--Pubblicare una giornata  
define ('_MD_DAY_CLOSE', 'Questa giornata non è disponibile');  
define ('_MD_HEURE_JOURNEE', 'Ora');  
define ('_MD_HEURE_RES', 'Prenotazioni');  
define ('_MD_TITLE_EDIT_DAY', 'Calendario della prenotazione: ');  
define ('_MD_FERMER_CAL', 'Chiudere il calendario');  
define ('_MD_JOUR_INDISPO', 'Questa giornata non è aperta alla prenotazione');  
define ('_MD_MOIS_INDISPO', 'Questo mese non è aperto alla prenotazione');  
define ('_MD_HEURE_INDISPO', 'Questa ora non è aperta alla prenotazione');  
  
//--domanda legata ad un calendario (make_demcal.php)  
define ('_MD_TITLE_MAKEDEMCAL', 'Riservare');  
define ('_MD_NBOCCRES_TRANCHE', 'Numero di prenotazione totale possibile per una fetta oraria ');
define ('_MD_DATEHEURE_RESERV', 'Data ed ora di prenotazione');  
  
//--Specificità del calendario  
define ('_MD_RES_INCONNU', 'Prenotazione sconosciuta');  
define ('_MD_SPEC_EXISTE', 'avete bloccato già questo periodo');  
define ('_MD_SPEC_OK', 'Questo periodo è bloccato adesso');  
define ('_MD_OPERATION_INCONNUE', 'Operazione sconosciuta');  
define ('_MD_SPEC_NOT_EXISTE', 'Questo periodo non è bloccato');  
define ('_MD_SPEC_DEL_OK', 'Questo periodo è aperto adesso');

//--  
define ('_MD_SELOK', 'avete selezionato un orario ma non dimenticate di convalidare le vostre domande per quale siano presi in conto');  
define ('_MD_SELSUPP', la 'Vostra selezione è stata soppressa bene del vostro elenco');  
define ('_MD_ALLSEL', le 'Vostre selezioni');  
define ('_MD_COMMENTAIRE', 'Commento');  
define ('_MD_SEE', 'Vedere');  
define ('_MD_NORESERV', 'Nessuna prenotazione effettuata');  
define ('_MD_IMGCAT', 'Immagine categoria');  
define ('_MD_UPLOAD_ERROR', 'Invio immagine impossibile, verificare altezza, larghezza e taglia della vostra immagine.');  
// Schermo amministrazione  
define ('_MD_PERM_TITLE', 'Gestione dei diritti del modulo di prenotazione.');  
define ('_MD_PERM_DESC', 'Selezionate per ogni gruppo le categorie che è autorizzato a vedere. <br /> ');  
define ('_MD_DENIED_CAT', 'non siete autorizzati ad accedere a questa categoria.');   
define ('_MD_ETATDEM_ANNULEE', 'Domanda annullata');  
// Schermo accoglienza  
define ('_MD_ACCEUIL1', 'Menù modulo');  
define ('_MD_ACCEUIL2', 'L\'ultimo prenotazioni calendario');  
define ('_MD_ACCEUIL3', 'Le ultime prenotazioni semplici');  
define ('_MD_ACCEUIL4', 'le Vostre domande');  
define ('_MD_SUITE', 'Seguito... ');  
define ('_MD_TOTAL_RES', 'Totale');  
define ('_MD_DEM_VAL', 'Dem Valle.');  
define ('_MD_RES_DISPO', 'Dispo');  
define ('_MD_CARACTERE_A', 'a');  
define ('_MD_MASS_UPD_RES', 'Collocamento aggiornata prenotazione in massa');  
define ('_MD_CHECK_BOX_MAJ', 'Mettere aggiornati? ');  
define ('_MD_MASS_UPD_DESC', 'Selezionare le prenotazioni che devono essere messe aggiornati. Indicare poi ogni notizia a mettere aggiornati.');  
define ('_MD_MASS_UPD_SPECAL', 'Bloccare, Sbloccare dei periodi in massa');  
define ('_MD_MASS_UPD_SPECAL_DESC', 'Selezionare le prenotazioni che devono essere messe aggiornati.   
Indicare poi ogni notizia a mettere aggiornati. <br />  
<br /> <br /> Pensare ad indicare se bloccate o voi sbloccate dei periodi. <br /> <br /> Scegliere poi il collocamento aggiornato per giornata o per fetta orario di una giornata.');  
define ('_MD_MASS_UPD_LOCK', 'Bloccare');  
define ('_MD_MASS_UPD_UNLOCK', 'Sbloccare');

?>
