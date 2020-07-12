<?php

// variable pour partie admin du module
// -- menu
define('_MD_TITLE', 'Administration');
define('_MD_MENU1', 'Group permissions');
define('_MD_MENU2', 'Add a category');
define('_MD_MENU3', 'Update a category');
define('_MD_MENU4', 'Setup a booking');
define('_MD_MENU5', 'Update settings of a booking');
define('_MD_MENU6', 'Update few reservation');


define('_MD_RESMANAGER_SUBMENU1', 'Book');
define('_MD_RESMANAGER_SUBMENU2', 'Request list');
define('_MD_RESMANAGER_SUBMENU3', 'Add a category');
define('_MD_RESMANAGER_SUBMENU4', 'Update a category');
define('_MD_RESMANAGER_SUBMENU5', 'Setup a booking');
define('_MD_RESMANAGER_SUBMENU6', 'Update settings of a booking');

// Commun
define('_MD_ENR',		 							'Record');
define('_MD_SUPP', 									'Delete');
define('_MD_VAL', 									'Validate');
define('_MD_REFUS', 								'Refuse');
define('_MD_EDIT',		 							'Open');
define('_MD_DETAIL',		 						'Detail');
define('_MD_ANNULER',								'Cancel');
define('_MD_BOUTONOK',		 						'Ok');
define('_MD_RETOUR',		 						'Back');
define('_MD_ACTION',		 						'Action');

// -- liste de valeur
define('_MD_OK',			 						'YES');
define('_MD_KO',		 							'NO');

define('_MD_TYPERES_UNIQUE',						'Special');
define('_MD_TYPERES_EVENEMENT',						'Event');
define('_MD_TYPERES_CALENDRIER',					'Calendar');

define('_MD_ETATDEM_A_VALIDER',						'To be validated');
define('_MD_ETATDEM_VALIDE',						'Validated');
define('_MD_ETATDEM_REFUSEE',						'Denied');

// -- calendrier
define('_MD_DIMANCHE_C',							'Sun');
define('_MD_LUNDI_C',								'Mon');
define('_MD_MARDI_C',								'Tue');
define('_MD_MERCREDI_C',							'Wed');
define('_MD_JEUDI_C',								'Thu');
define('_MD_VENDREDI_C',							'Fri');
define('_MD_SAMEDI_C',								'Sat');

define('_MD_DIMANCHE',								'Sunday');
define('_MD_LUNDI',									'Monday');
define('_MD_MARDI',									'Tuesday');
define('_MD_MERCREDI',								'Wednesday');
define('_MD_JEUDI',									'Thursday');
define('_MD_VENDREDI',								'Friday');
define('_MD_SAMEDI',								'Saturday');

define('_MD_JANVIER',								'January');
define('_MD_FEVRIER',								'February');
define('_MD_MARS',									'March');
define('_MD_AVRIL',									'April');
define('_MD_MAI',									'May');
define('_MD_JUIN',									'June');
define('_MD_JUILLET',								'Jully');
define('_MD_AOUT',									'Augustus');
define('_MD_SEPTEMBRE',								'September');
define('_MD_OCTOBRE',								'October');
define('_MD_NOVEMBRE',								'November');
define('_MD_DECEMBRE',								'December');

define('_MD_HEURE',									'Hour');
define('_MD_MINUTE',								'Minute');

define('_MD_DATE_JOUR',								'Today');

define('_MD_JOUR_SUIV',								'Day >');
define('_MD_JOUR_PREC',	  							'< Day');

define('_MD_MOIS_SUIV',								'Month >>');
define('_MD_MOIS_PREC',	  							'<< Month');

define('_MD_ANNEE_SUIV',							'Year >>>');
define('_MD_ANNEE_PREC',	  						'<<< Year');

// -- minimum réservation
define('_MD_MIN_HEURE',								'Hour');

// -- message erreur communs
define('_MD_ACCES_DENIED',							'You are not authorised to see this page'); 
define('_MD_VALID_DENIED',							'You are not authorised to validate requests'); 
define('_MD_REFUS_DENIED',        					'You are not authorised to refuse requests');
define('_MD_DEMDENIED',								'This demand is not your. Access denied ');
define('_MD_ACCESBD_KO',							'An error occured while connecting to database. Please, contact the webmaster.');
define('_MD_ERREUR_SAISIE',							'Input error');
define('_MD_MESS_DB',								'Database message');

define('_MD_FORMAT_DATE_KO',						'Wrong Date');
define('_MD_FORMAT_NUMBER_KO',						'Wrong number');
define('_MD_NB_NOTZERO',							'The number must be higher than zero');

// Administration
// Formulaire ajout catégorie
define('_MD_TADDCAT', 								'Booking Category');
define('_MD_NOMCAT', 								'Category name');
define('_MD_DESCRCAT', 								'Category description');
define('_MD_ADDCAT', 								'Add category');
define('_MD_ADDOK', 								'Category added');

// -- Formulaire edition, supp, maj catégorie
define('_MD_TMAJCAT', 								'Booking category');
define('_MD_ENRCAT', 								'Send');
define('_MD_SUPPCAT', 								'Delete');
define('_MD_EDITCAT', 								'Open');
define('_MD_ENROK', 								'Category updated');
define('_MD_SUPPOK', 								'Category deleted');
define('_MD_SUPPCATKO', 							'You can not delete this category, booking are associated to this category.');


// -- Formulaire ajout reservation
define('_MD_TADDRES', 								'Booking');
define('_MD_NOMRES', 								'Booking Name');
define('_MD_DESCRRES', 								'Description');
define('_MD_OPENRES', 								'Start date of calendar');
define('_MD_CLOSERES', 								'End date of calendar');
define('_MD_TYPERES', 								'Type');
define('_MD_CATRES', 								'Category');
define('_MD_VALIDRES', 								'Validation required');
define('_MD_NBOCCRES', 								'Total requests');
define('_MD_OCCPERSRES', 							'Request by members');
define('_MD_ADDRES', 								'Add a booking');
define('_MD_ADDRESOK',								'Booking added');
define('_MD_TYPERES_QUESTION',						'What type of reservation do you want to create?');
define('_MD_OPEN_SEM',								'Opening days');
define('_MD_MIN_RES',								'Minimum booking');
define('_MD_HEURE_DEB',								'Start hour');
define('_MD_HEURE_FIN',								'End hour');
define('_MD_HEURE_FIN_ERROR',     					'End hour must be higher than start hour');
define('_MD_ACTIVERES', 							'To activate reservation');

// Formulaire maj réservation
define('_MD_TMAJRES', 								'Edit booking');
define('_MD_MAJRESOK',								'Booking updated');
define('_MD_SUPPRESOK',								'Booking deleted');
define('_MD_SUPPRESKO',								'You can not delete this booking, requests are associated to this booking.');
define('_MD_LST_ALLDEM',							'Members requests');
define('_MD_OPEN_SUP_CLOSE',						'End date of calendar must be higher than start date');
define('_MD_OCC_SUP_NB',							'Total number must be higher than members requests');

define('_MD_NBDEMVAL', 								'Number of requests validated');
define('_MD_DEMTOVAL',								'Number of requests to be validated');



// Module
// -- Ecran demande de reservation
define('_MD_TITLE_MAKERESERV1',						'Category choice');
define('_MD_TITLE_MAKERESERV2',						'Booking list in the category');
define('_MD_TITLE_MAKERESERV3',						'Book');
define('_MD_TITLE_TABRESERV1',						'Booking name');
define('_MD_TITLE_TABRESERV2',						'Type');
define('_MD_TITLE_TABRESERV3',						'Action');
define('_MD_BACK_LSTCAT',							'<< Categories\'s list');
define('_MD_OPERESERV',								'Book');
define('_MD_RESERV_RESULTAT',						'Booking result');
define('_MD_RESERVOK',								'Your booking has been done.');
define('_MD_RESERNUMANDINFO',						'If validation is required, you will receive a confirmation. <br />Your request number is following: ');
define('_MD_RESERVKO',								'An error occured while booking');
define('_MD_RESERVFULL',							'There are no disponibility for this booking');
define('_MD_RESERVFULLUSER',						'You have done the maximum amount of booking for a member');
define('_MD_FREERES',								'Disponibility');
define('_MD_RESERV_NOTACTIVE',						'This booking is not open');

// -- Ecran liste des demandes de reservation
define('_MD_TITLE_LSTDEM',							'Your request\'s list');
define('_MD_TITLE_TABDEM1',							'N°');
define('_MD_TITLE_TABDEM2',							'Request Date');
define('_MD_TITLE_TABDEM3',							'Category');
define('_MD_TITLE_TABDEM4',							'Booking');
define('_MD_TITLE_TABDEM5',							'Member\'s name');
define('_MD_TITLE_TABDEM6',							'Request\'s status');
define('_MD_TITLE_TABDEM7',							'Action');

// -- Editer une demande
define('_MD_TITLE_TITLE_NODEM',						'Request N° : ');
define('_MD_DATE_DEM',								'Request\'s Date');
define('_MD_DATE_VAL',								'Validation\'s Date');
define('_MD_NOM_MEMBRE',							'Member\'s name');
define('_MD_STATUS_DEM',							'Request status');
define('_MD_MESS_REFUS',							'Message');
define('_MD_MESSAGE_EDITDEM',						'Action result');
define('_MD_VALDEM_OK',								'Request is validated');
define('_MD_REFUS_OK',								'Request has been refused');
define('_MD_REFUS_MESS_KO',							'You must type a message to refuse this request');
define('_MD_ANNULATION_OK',							'Your request has been canceled');
define('_MD_DEM_ALREADY_VALID',						'This request is already validated');
define('_MD_DEM_ALREADY_REFUSEE',					'This request has already been refused');

// -- Editer une journée
define('_MD_DAY_CLOSE',								'This day is not available');
define('_MD_HEURE_JOURNEE',							'Hour');
define('_MD_HEURE_RES',								'Booking');
define('_MD_TITLE_EDIT_DAY',						'Booking calendar: ');
define('_MD_FERMER_CAL', 							'Close calendar');
define('_MD_JOUR_INDISPO', 							'This day is not open for reservation');
define('_MD_MOIS_INDISPO', 							'This month is not open for reservation');
define('_MD_HEURE_INDISPO', 						'This hour is not open for reservation');

// -- demande liée à un calendrier (make_demcal.php)
define('_MD_TITLE_MAKEDEMCAL',						'Book');
define('_MD_NBOCCRES_TRANCHE',						'Total booking available at that time:');
define('_MD_DATEHEURE_RESERV', 						'Booking date and hour');

// -- Spécificités du calendrier
define('_MD_RES_INCONNU',							'Booking unknown');
define('_MD_SPEC_EXISTE',							'You already have booked this period');
define('_MD_SPEC_OK',								'This period is now closed');
define('_MD_OPERATION_INCONNUE', 					'Unknown operation');
define('_MD_SPEC_NOT_EXISTE', 						'This period is not closed');
define('_MD_SPEC_DEL_OK', 							'This period is now open');

// --
define('_MD_SELOK', 								'Your time was selected, but don\'t forget to confirm these');
define('_MD_SELSUPP', 								'your selection was removed from the list');
define('_MD_ALLSEL', 								'Your choice');
define('_MD_COMMENTAIRE',							'comment');
define('_MD_SEE',									'See');
define('_MD_NORESERV',								'No books made');
define('_MD_IMGCAT',                                'Image category');
define('_MD_UPLOAD_ERROR',                          'You can\'t upload the image, check size of your image.');
// Ecran administration
define('_MD_PERM_TITLE',                            'Category permissions.');
define('_MD_PERM_DESC',                             'Select for each group the catgory that the group can access.<br />');
define('_MD_DENIED_CAT',        					'You are not allowed to see this category.'); 
define('_MD_ETATDEM_ANNULEE',                       'Book canceled.');
// Ecran acceuil
define('_MD_ACCEUIL1',                              'Resmanager Menu');
define('_MD_ACCEUIL2',                              'The last calendary reservation');
define('_MD_ACCEUIL3',                              'The last unique reservation');
define('_MD_ACCEUIL4',                              'Your request');
define('_MD_SUITE',                                 'Next ...');
define('_MD_TOTAL_RES',                             'Total');
define('_MD_DEM_VAL',                               'Val. Request');
define('_MD_RES_DISPO',                             'Available');
define('_MD_CARACTERE_A',                           'To');
define('_MD_MASS_UPD_RES',                          'Reservation update in mass');
define('_MD_CHECK_BOX_MAJ',                         'Update ?');
define('_MD_MASS_UPD_DESC',                         'Select the reservation to be updated. Indicate each information to be updated.');
define('_MD_MASS_UPD_SPECAL',                       'Lock, unlock periods in mass');
define('_MD_MASS_UPD_SPECAL_DESC',                  'Select the reservation to be updated. Indicate each information to be updated.<br /><br />Indicate if you lock or unlock a period.<br /><br />Then choose to update period by day or hour.');
define('_MD_MASS_UPD_LOCK',                         'Lock');
define('_MD_MASS_UPD_UNLOCK',                       'Unlock');


?>
