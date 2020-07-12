<?php

// variable pour partie admin du module
// -- menu
define ('_MD_TITLE', 'Verwaltung moduliert Reservierung',;  
define ('_MD_MENU1', 'Verwaltung der Rechte');  
define ('_MD_MENU2','eine Kategorie Hinzuzuf�gen');  
define ('_MD_MENU3' ,'eine Kategorie aktuell zu legen');  
define ('_MD_MENU4' ,'eine Reservierung zu bilden');  
define ('_MD_MENU5', 'die Gestalt einer Reservierung aktuell zu legen');  
define ('_MD_MENU6' ,'mehrere Reservierungen aktuell zu legen');

define('_MD_RESMANAGER_SUBMENU1', 'Reservieren');
define('_MD_RESMANAGER_SUBMENU2', 'Liste der Antr�ge');
define('_MD_RESMANAGER_SUBMENU3', 'Eine Kategorie hinzuf�gen');
define('_MD_RESMANAGER_SUBMENU4', 'Eine Kategorie aktualisieren');
define('_MD_RESMANAGER_SUBMENU5', 'Hinzuf�gen einer Reservierung');
define('_MD_RESMANAGER_SUBMENU6', 'Aktualisieren einer Reservierung');


// Commun
define('_MD_ENR',		 							'Registrieren');
define('_MD_SUPP', 									'L�schen');
define('_MD_VAL', 									'Best�tigen');
define('_MD_REFUS', 								'Ablehnen');
define('_MD_EDIT',		 							'�ffnen');
define('_MD_DETAIL',		 						'Einzelheiten');
define('_MD_ANNULER',								'Annullieren');
define('_MD_BOUTONOK',		 						'Ok');
define('_MD_RETOUR',		 						'Zur�ck');
define('_MD_ACTION',		 						'Aktion');

// -- liste de valeur
define('_MD_OK',			 						'Ja');
define('_MD_KO',		 							'Nein');

define('_MD_TYPERES_UNIQUE',						'Einfach');
define('_MD_TYPERES_EVENEMENT',						'Ereignis');
define('_MD_TYPERES_CALENDRIER',					'Kalender');

define('_MD_ETATDEM_A_VALIDER',						'zu best�tigen');
define('_MD_ETATDEM_VALIDE',						'best�tigt');
define('_MD_ETATDEM_REFUSEE',						'abgelehnt');

// -- calendrier
define('_MD_DIMANCHE_C',							'Son');
define('_MD_LUNDI_C',								'Mon');
define('_MD_MARDI_C',								'Die');
define('_MD_MERCREDI_C',							'Mit');
define('_MD_JEUDI_C',								'Don');
define('_MD_VENDREDI_C',							'Fre');
define('_MD_SAMEDI_C',								'Sam');

define('_MD_DIMANCHE',								'Sonntag');
define('_MD_LUNDI',									'Montag');
define('_MD_MARDI',									'Dienstag');
define('_MD_MERCREDI',								'Mittwoch');
define('_MD_JEUDI',									'Donnerstag');
define('_MD_VENDREDI',								'Freitag');
define('_MD_SAMEDI',								'Samstag');

define('_MD_JANVIER',								'Januar');
define('_MD_FEVRIER',								'Februar');
define('_MD_MARS',									'M�rz');
define('_MD_AVRIL',									'April');
define('_MD_MAI',									'Mai');
define('_MD_JUIN',									'Juni');
define('_MD_JUILLET',								'Juli');
define('_MD_AOUT',									'August');
define('_MD_SEPTEMBRE',								'September');
define('_MD_OCTOBRE',								'October');
define('_MD_NOVEMBRE',								'November');
define('_MD_DECEMBRE',								'D�cember');

define('_MD_HEURE',									'Uhr');
define('_MD_MINUTE',								'Minute');

define('_MD_DATE_JOUR',								'Heute');

define('_MD_JOUR_SUIV',								'Tag >');
define('_MD_JOUR_PREC',	  							'< Tag');

define('_MD_MOIS_SUIV',								'Monat >>');
define('_MD_MOIS_PREC',	  							'<< Monat');

define('_MD_ANNEE_SUIV',							'Jahr >>>');
define('_MD_ANNEE_PREC',	  						'<<< Jahr');

// -- minimum r�servation
define('_MD_MIN_HEURE',								'Stunde');


// -- message erreur communs
define('_MD_ACCES_DENIED',							'Sie haben nicht die notwendigen Zugriffsrechte.'); 
define('_MD_VALID_DENIED',							'Sie haben nicht das Recht um Anfragen zu best�tigen'); 
define('_MD_REFUS_DENIED',        					'Sie haben nicht das Recht um Anfragen abzulehnen');
define('_MD_DEMDENIED',								'Diese Anmeldung ist nicht ihre,Sie haben keinen Zugang.');
define('_MD_ACCESBD_KO',							'Ein Fehler ist aufgetreten.Bitte benachrichtigen sie den Webmaster.');
define('_MD_ERREUR_SAISIE',							'Sie haben was falsch eingegeben');
define('_MD_MESS_DB',								'Nachricht der Datenbank');

define('_MD_FORMAT_DATE_KO',						'Datum falsch');
define('_MD_FORMAT_NUMBER_KO',						'Anzahl falsch');
define('_MD_NB_NOTZERO',							'Die Zahl muss h�her als Null sein');

// Administration
// Formulaire ajout cat�gorie
define('_MD_TADDCAT', 								'Einzelheiten der Kategorie');
define('_MD_NOMCAT', 								'Name der Kategorie');
define('_MD_DESCRCAT', 								'Beschreibung der Kategorie');
define('_MD_ADDCAT', 								'Kategorie hinzuf�gen');
define('_MD_ADDOK', 								'Kategorie zugef�gt');

// -- Formulaire edition, supp, maj cat�gorie
define('_MD_TMAJCAT', 								'Einzelheiten der Kategorie');
define('_MD_ENRCAT', 								'Speichern');
define('_MD_SUPPCAT', 								'L�schen');
define('_MD_EDITCAT', 								'�ffnen');
define('_MD_ENROK', 								'Die Kategorie wurde aktualisiert');
define('_MD_SUPPOK', 								'Kategorie wurde gel�scht');
define('_MD_SUPPCATKO', 							'Sie k�nnen diese Kategorie nicht l�schen, Reservierungen sind mit dieser Kategorie verbunden.');


// -- Formulaire ajout reservation
define('_MD_TADDRES', 							'Reservierung');
define('_MD_NOMRES', 							'Name der Reservierung');
define('_MD_DESCRRES', 							'Beschreibung');
define('_MD_OPENRES', 							'Beginn der Reservierung');
define('_MD_CLOSERES', 							'Ende der Reservierung');
define('_MD_TYPERES', 							'Type');
define('_MD_CATRES', 							'Kategorie ');
define('_MD_VALIDRES', 							'Best�tigung notwendig');
define('_MD_NBOCCRES', 							'Maximale Anzahl ');
define('_MD_OCCPERSRES', 						'Anzahl pro Mitglied ');
define('_MD_ADDRES', 							'Reservierung hinzuf�gen');
define('_MD_ADDRESOK',							'Reservierung hinzugef�gt');
define('_MD_TYPERES_QUESTION',					'Welche Art von Reservierung wollen Sie erstellen ?');
define('_MD_OPEN_SEM',							'�ffnungszeiten');
define('_MD_MIN_RES',							'Minimum');
define('_MD_HEURE_DEB',							'Ende');
define('_MD_HEURE_FIN',							'Heure fin');
define('_MD_HEURE_FIN_ERROR',     				'Die Endstunde mu� h�her als die Beginnstunde sein');
define('_MD_ACTIVERES', 						'Aktivieren der Reservierung');

// Formulaire maj r�servation
define('_MD_TMAJRES', 							'Bearbeitung der Reservierung');
define('_MD_MAJRESOK',							'Aktualisierung der Reservierung');
define('_MD_SUPPRESOK',							'Reservierung gel�scht');
define('_MD_SUPPRESKO',							'Antr�ge sind mit dieser Reservierundverbunde,desshalb unm�glich diese zu l�schen');
define('_MD_LST_ALLDEM',						'Die Antr�ge des Mitgliedes');
define('_MD_OPEN_SUP_CLOSE',					'Das Datum des Endes des Zeitplans mu� h�her als das Beginndatum sein');
define('_MD_OCC_SUP_NB',						'Die Gesamtzahl mu� h�her sein als die Anzahl des Antrags pro Mitglied');

define('_MD_NBDEMVAL', 							'Anzahl der best�tigten Antr�ge ');
define('_MD_DEMTOVAL',							'Noch nicht best�tigte Antr�ge');



// Module
// -- Ecran demande de reservation
define('_MD_TITLE_MAKERESERV1',					'Kategorieauswahl');
define('_MD_TITLE_MAKERESERV2',					'Liste der Reservierungen in der Kategorie');
define('_MD_TITLE_MAKERESERV3',					'Reservieren');
define('_MD_TITLE_TABRESERV1',					'Name der Reservierung');
define('_MD_TITLE_TABRESERV2',					'Type');
define('_MD_TITLE_TABRESERV3',					'Action');
define('_MD_BACK_LSTCAT',						'<< Liste der Kategorien');
define('_MD_OPERESERV',							'Reservieren');
define('_MD_RESERV_RESULTAT',					'Reservierungsergebnis');
define('_MD_RESERVOK',							'Ihre Reservierung wird durchgef�hrt.');
define('_MD_RESERNUMANDINFO', 		  'Wenn eine Best�tigung notwendig ist, werden Sie eine Best�tigung erhalten. <br />Ihre Antragsnummer ist das folgende : ');
define('_MD_RESERVKO',							'Ein Fehler ist bei der Reservierung vorgekommen');
define('_MD_RESERVFULL',						'Es ist nicht mehr verf�gbar f�r diese Reservierung');
define('_MD_RESERVFULLUSER',					'Sie haben bereits die maximale Anzahl der m�glichen Reservierung f�r ein Mitglied durchgef�hrt');
define('_MD_FREERES',							'Verf�gbarkeiten');
define('_MD_RESERV_NOTACTIVE',					'Diese Reservierung ist nicht verf�gbar');

// -- Ecran liste des demandes de reservation
define('_MD_TITLE_LSTDEM',						'Liste ihrer Antr�ge');
define('_MD_TITLE_TABDEM1',						'Nr.');
define('_MD_TITLE_TABDEM2',						'Datum des Antrags');
define('_MD_TITLE_TABDEM3',						'Kategorie');
define('_MD_TITLE_TABDEM4',						'Reservierung');
define('_MD_TITLE_TABDEM5',						'Name des Mitglieds');
define('_MD_TITLE_TABDEM6',						'Antragszustand');
define('_MD_TITLE_TABDEM7',						'Action');

// -- Editer une demande
define('_MD_TITLE_TITLE_NODEM',					'Antrags Nr.: ');
define('_MD_DATE_DEM',							'Antragsdatum ');
define('_MD_DATE_VAL',							'Best�tigungsdatum ');
define('_MD_NOM_MEMBRE',						'Name des Mitglieds ');
define('_MD_STATUS_DEM',						'Antragszustand ');
define('_MD_MESS_REFUS',						'Mitteilung ');
define('_MD_MESSAGE_EDITDEM',					'Ergebnis');
define('_MD_VALDEM_OK',							'Der Antrage ist best�tigt');
define('_MD_REFUS_OK',							'Der Antrag ist abgelehnt');
define('_MD_REFUS_MESS_KO',						'Sie m�ssen eine Mitteilung erfassen, um den Antrag abzulehnen');
define('_MD_ANNULATION_OK',						'Ihr Antrag wurde abgelehnt');
define('_MD_DEM_ALREADY_VALID',					'Dieser Antrag ist schon best�tigt');
define('_MD_DEM_ALREADY_REFUSEE',				'Dieser Antrag ist schon abgelehnt');

// -- Editer une journ�e
define('_MD_DAY_CLOSE',							'Dieser Tag ist nicht verf�gbar');
define('_MD_HEURE_JOURNEE',						'Uhrzeit');
define('_MD_HEURE_RES',							'Reservierungen');
define('_MD_TITLE_EDIT_DAY',					'Kalender der Reservierungen : ');
define('_MD_FERMER_CAL', 						'Schliesen des Kalenders');
define('_MD_JOUR_INDISPO', 						'Dieser Tag ist nicht ge�ffnet');
define('_MD_MOIS_INDISPO', 						'Dieser Monat ist nicht ge�ffnet');
define('_MD_HEURE_INDISPO', 					'Diese Stunde ist nicht ge�ffnet');

// -- demande li�e � un calendrier (make_demcal.php)
define('_MD_TITLE_MAKEDEMCAL',					'Reservieren');
define('_MD_NBOCCRES_TRANCHE',					'Gesamtanzahl der m�glichen Reservierung f�r eine Stunde ');
define('_MD_DATEHEURE_RESERV', 					'Datum und Uhrzeit de Reservierung');

// -- Sp�cificit�s du calendrier
define('_MD_RES_INCONNU',						'Reservierung unbekannt');
define('_MD_SPEC_EXISTE',						'Sie haben bereits diese Periode blockiert');
define('_MD_SPEC_OK',							'Diese Periode ist jetzt blockiert ');
define('_MD_OPERATION_INCONNUE', 				'Unbekannte Operation');
define('_MD_SPEC_NOT_EXISTE', 					'Diese Periode ist nicht blockiert');
define('_MD_SPEC_DEL_OK', 						'Diese Periode ist jetzt frei');

// --
define('_MD_SELOK', 'Sie haben eine Uhrzeit ausgew�hlt,vergessen Sie aber nicht,diese zu best�tigen');
define('_MD_SELSUPP', 'Ihre Auswahl wurde aus der Liste entfernt');
define('_MD_ALLSEL', 'Ihre Auswahl');
define('_MD_COMMENTAIRE',					'Kommentar');
define('_MD_SEE',									'See');
define('_MD_NORESERV',						'No books made');
define ('_MD_IMGCAT','Kategorienbild');
define ('_MD_UPLOAD_ERROR','Versand unm�gliches Bild, H�he, Breite und Gr��e Ihres Bildes zu pr�fen');  

// Verwaltungsbildschirm
define ('_MD_PERM_TITLE', 'Verwaltung von den Rechten vom Reservierungsmodul.');  
define ('_MD_PERM_DESC', 'w�hlen Sie die Kategorien, die er befugt ist, zu sehen, f�r jede Gruppe aus. <br /> ');  
define ('_MD_DENIED_CAT', 'Sie sind nicht befugt, diese Kategorie zu erlangen.');   
define ('_MD_ETATDEM_ANNULEE' ('annullierte Bitte');

// Empfangsbildschirm  
define ('_MD_ACCEUIL1', 'Klein Modul',;  
define ('_MD_ACCEUIL2', 'Die letzten Kalenderreservierungen');  
define ('_MD_ACCEUIL3', 'Die einfachen letzten Reservierungen');  
define ('_MD_ACCEUIL4','Ihre Bitten');  
define ('_MD_SUITE', 'Folge... ');  
define ('_MD_TOTAL_RES','Summe');  
define ('_MD_DEM_VAL', 'Dem Val.');  
define ('_MD_RES_DISPO','Dispo');  
define ('_MD_CARACTERE_A', 'an');  
define ('_MD_MASS_UPD_RES', 'Reservierungsupdate in Masse');  
define ('_MD_CHECK_BOX_MAJ', 'aktuell zu legen? ');  
define ('_MD_MASS_UPD_DESC', 'die Reservierungen Auszuw�hlen, die an Tag gebraucht werden m�ssen. Danach Information jeder zu zeigen, aktuell zu legen.');  
define ('_MD_MASS_UPD_SPECAL', 'zu sperren (Perioden in Masse Freizugeben');  
define ('_MD_MASS_UPD_SPECAL_DESC', 'die Reservierungen Auszuw�hlen, die an Tag gebraucht werden m�ssen. <br /> danach Information jeder zu zeigen, aktuell zu legen. <br /> <br /> daran zu denken, zu zeigen, wenn Sie sperren oder Sie geben Perioden frei. <br /> <br /> danach den Update pro Tag oder durch Zeitzone von einem Tag zu w�hlen.');  
define ('_MD_MASS_UPD_LOCK' ,'zu sperren');  
define ('_MD_MASS_UPD_UNLOCK','Freizugeben');  
  
  
?>  
