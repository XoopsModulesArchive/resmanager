<?php

// variable pour partie admin du module
// -- menu
define('_MD_TITLE','Administration module réservation');
define('_MD_MENU1','Gestion des droits');
define('_MD_MENU2', 'Ajouter une catégorie');
define('_MD_MENU3', 'Mettre à jour une  catégorie');
define('_MD_MENU4', 'Paramétrer une réservation');
define('_MD_MENU5', 'Mettre à jour le paramétrage d\'une  réservation');
define('_MD_MENU6', 'Mettre à jour plusieurs réservations');


define('_MD_RESMANAGER_SUBMENU1', 'Réserver');
define('_MD_RESMANAGER_SUBMENU2', 'Liste des demandes');
define('_MD_RESMANAGER_SUBMENU3', 'Ajouter une catégorie');
define('_MD_RESMANAGER_SUBMENU4', 'Mettre à jour une  catégorie');
define('_MD_RESMANAGER_SUBMENU5', 'Paramétrer une réservation');
define('_MD_RESMANAGER_SUBMENU6', 'Mettre à jour le paramétrage d\'une  réservation');


// Commun
define('_MD_ENR',		 							'Enregistrer');
define('_MD_SUPP', 									'Supprimer');
define('_MD_VAL', 									'Valider');
define('_MD_REFUS', 								'Refuser');
define('_MD_EDIT',		 							'Modifier');
define('_MD_DETAIL',		 						'Détail');
define('_MD_ANNULER',								'Annuler');
define('_MD_BOUTONOK',		 						'Ok');
define('_MD_RETOUR',		 						'Retour');
define('_MD_ACTION',		 						'Action');

// -- liste de valeur
define('_MD_OK',			 						'OUI');
define('_MD_KO',		 							'NON');

define('_MD_TYPERES_UNIQUE',						'Unique');
define('_MD_TYPERES_EVENEMENT',						'Evenement');
define('_MD_TYPERES_CALENDRIER',					'Calendrier');

define('_MD_ETATDEM_A_VALIDER',						'A valider');
define('_MD_ETATDEM_VALIDE',						'Validée');
define('_MD_ETATDEM_REFUSEE',						'Refusée');

// -- calendrier
define('_MD_DIMANCHE_C',							'Dim');
define('_MD_LUNDI_C',								'Lun');
define('_MD_MARDI_C',								'Mar');
define('_MD_MERCREDI_C',							'Mer');
define('_MD_JEUDI_C',								'Jeu');
define('_MD_VENDREDI_C',							'Ven');
define('_MD_SAMEDI_C',								'Sam');

define('_MD_DIMANCHE',								'Dimanche');
define('_MD_LUNDI',									'Lundi');
define('_MD_MARDI',									'Mardi');
define('_MD_MERCREDI',								'Mercredi');
define('_MD_JEUDI',									'Jeudi');
define('_MD_VENDREDI',								'Vendredi');
define('_MD_SAMEDI',								'Samedi');

define('_MD_JANVIER',								'Janvier');
define('_MD_FEVRIER',								'Février');
define('_MD_MARS',									'Mars');
define('_MD_AVRIL',									'Avril');
define('_MD_MAI',									'Mai');
define('_MD_JUIN',									'Juin');
define('_MD_JUILLET',								'Juillet');
define('_MD_AOUT',									'Août');
define('_MD_SEPTEMBRE',								'Septembre');
define('_MD_OCTOBRE',								'Octobre');
define('_MD_NOVEMBRE',								'Novembre');
define('_MD_DECEMBRE',								'Décembre');

define('_MD_HEURE',									'Heure');
define('_MD_MINUTE',								'Minute');

define('_MD_DATE_JOUR',								'Aujourd\'hui');

define('_MD_JOUR_SUIV',								'Jour >');
define('_MD_JOUR_PREC',	  							'< Jour');

define('_MD_MOIS_SUIV',								'Mois >>');
define('_MD_MOIS_PREC',	  							'<< Mois');

define('_MD_ANNEE_SUIV',							'Année >>>');
define('_MD_ANNEE_PREC',	  						'<<< Année');

// -- minimum réservation
define('_MD_MIN_HEURE',								'Heure');


// -- message erreur communs
define('_MD_ACCES_DENIED',							'Vous n\'êtes pas autorisé à accéder à cette page'); 
define('_MD_VALID_DENIED',							'Vous n\'êtes pas autorisé à valider des demandes'); 
define('_MD_REFUS_DENIED',        					'Vous n\'êtes pas autorisé à refuser des demandes');
define('_MD_DEMDENIED',								'Cette demande ne vous appartient pas, vous n\'y avez pas accès');
define('_MD_ACCESBD_KO',							'Une erreur est survenue lors de l\'accès à la base de donnée. Contactez le webmaster.');
define('_MD_ERREUR_SAISIE',							'Erreurs de saisie');
define('_MD_MESS_DB',								'Message base de donnée');

define('_MD_FORMAT_DATE_KO',						'Date incorrecte');
define('_MD_FORMAT_NUMBER_KO',						'Nombre incorrect');
define('_MD_NB_NOTZERO',							'Le nombre doit être supérieur à zéro');

// Administration
// Formulaire ajout catégorie
define('_MD_TADDCAT', 								'Catégorie réservation');
define('_MD_NOMCAT', 								'Nom Catégorie');
define('_MD_DESCRCAT', 								'Description Catégorie');
define('_MD_ADDCAT', 								'Ajouter une catégorie');
define('_MD_ADDOK', 								'Catégorie ajoutée');

// -- Formulaire edition, supp, maj catégorie
define('_MD_TMAJCAT', 								'Catégorie réservation');
define('_MD_ENRCAT', 								'Enregistrer');
define('_MD_SUPPCAT', 								'Supprimer');
define('_MD_EDITCAT', 								'Modifier');
define('_MD_ENROK', 								'Catégorie Mise à jour');
define('_MD_SUPPOK', 								'Catégorie supprimée');
define('_MD_SUPPCATKO', 							'Vous ne pouvez pas supprimer cette catégorie, des réservations sont associés à cette catégorie.');


// -- Formulaire ajout reservation
define('_MD_TADDRES', 							'Réservation');
define('_MD_NOMRES', 							'Nom réservation');
define('_MD_DESCRRES', 							'Description');
define('_MD_OPENRES', 							'Date de début du calendrier');
define('_MD_CLOSERES', 							'Date de fin du calendrier');
define('_MD_TYPERES', 							'Type');
define('_MD_CATRES', 							'Catégorie ');
define('_MD_VALIDRES', 							'Validation nécessaire');
define('_MD_NBOCCRES', 							'Nombre de demande total ');
define('_MD_OCCPERSRES', 						'Nombre de demande par membre ');
define('_MD_ADDRES', 							'Ajouter une réservation');
define('_MD_ADDRESOK',							'Réservation ajoutée');
define('_MD_TYPERES_QUESTION',					'Quel type de réservation voulez vous créer ?');
define('_MD_OPEN_SEM',							'Jour ouverture');
define('_MD_MIN_RES',							'Réservation minimum');
define('_MD_HEURE_DEB',							'Heure Début');
define('_MD_HEURE_FIN',							'Heure fin');
define('_MD_HEURE_FIN_ERROR',     				'L\'heure de fin doit être supérieures à l\'heure de début');
define('_MD_ACTIVERES', 						'Activer réservation');

// Formulaire maj réservation
define('_MD_TMAJRES', 							'Edition réservation');
define('_MD_MAJRESOK',							'Réservation Mise à jour');
define('_MD_SUPPRESOK',							'Réservation supprimée');
define('_MD_SUPPRESKO',							'Des demandes sont associés à cette réservation, impossible de la supprimer');
define('_MD_LST_ALLDEM',						'Les demandes des membres');
define('_MD_OPEN_SUP_CLOSE',					'La date de fin du calendrier doit être supérieur à la date de début');
define('_MD_OCC_SUP_NB',						'Le nombre total doit être supérieur au nombre de demande par membre');

define('_MD_NBDEMVAL', 							'Nombre de demandes validées ');
define('_MD_DEMTOVAL',							'Nombre de demandes à valider ');



// Module
// -- Ecran demande de reservation
define('_MD_TITLE_MAKERESERV1',					'Choix de la catégorie');
define('_MD_TITLE_MAKERESERV2',					'Liste des réservation dans la catégorie');
define('_MD_TITLE_MAKERESERV3',					'Réserver');
define('_MD_TITLE_TABRESERV1',					'Nom réservation');
define('_MD_TITLE_TABRESERV2',					'Type');
define('_MD_TITLE_TABRESERV3',					'Action');
define('_MD_BACK_LSTCAT',						'<< Liste des catégories');
define('_MD_OPERESERV',							'Réserver');
define('_MD_RESERV_RESULTAT',					'Résultat réservation');
define('_MD_RESERVOK',							'Votre réservation est effectuée.');
define('_MD_RESERNUMANDINFO',				'Si une validation est nécessaire vous recevrez une confirmation. <br />votre numéro de demande est le suivant : ');
define('_MD_RESERVKO',							'Une erreur est survenue lors de la réservation');
define('_MD_RESERVFULL',						'Il n\'y a plus de disponibilités pour cette réservation');
define('_MD_RESERVFULLUSER',					'Vous avez déjà effectué le nombre de réservation maximum possible pour un membre');
define('_MD_FREERES',							'Disponibilités');
define('_MD_RESERV_NOTACTIVE',					'Cette réservation n\'est pas ouverte');

// -- Ecran liste des demandes de reservation
define('_MD_TITLE_LSTDEM',						'Liste de vos demandes');
define('_MD_TITLE_TABDEM1',						'N°');
define('_MD_TITLE_TABDEM2',						'Date demande');
define('_MD_TITLE_TABDEM3',						'Catégorie');
define('_MD_TITLE_TABDEM4',						'Réservation');
define('_MD_TITLE_TABDEM5',						'Nom membre');
define('_MD_TITLE_TABDEM6',						'Etat demande');
define('_MD_TITLE_TABDEM7',						'Action');

// -- Editer une demande
define('_MD_TITLE_TITLE_NODEM',					'Demande N° : ');
define('_MD_DATE_DEM',							'Date demande ');
define('_MD_DATE_VAL',							'Date Validation ');
define('_MD_NOM_MEMBRE',						'Nom membre ');
define('_MD_STATUS_DEM',						'Etat demande ');
define('_MD_MESS_REFUS',						'Message');
define('_MD_MESSAGE_EDITDEM',					'Résultat action');
define('_MD_VALDEM_OK',							'La demande est validée');
define('_MD_REFUS_OK',							'La demande est bien refusée');
define('_MD_REFUS_MESS_KO',						'Vous devez saisir un message pour refuser la demande');
define('_MD_ANNULATION_OK',						'Votre demande a été annulée');
define('_MD_DEM_ALREADY_VALID',					'Cette demande est déjà validée');
define('_MD_DEM_ALREADY_REFUSEE',				'Cette demande a déjà été refusée');

// -- Editer une journée
define('_MD_DAY_CLOSE',							'Cette journée n\'est pas disponible');
define('_MD_HEURE_JOURNEE',						'Heure');
define('_MD_HEURE_RES',							'Reservations');
define('_MD_TITLE_EDIT_DAY',					'Calendrier de la réservation : ');
define('_MD_FERMER_CAL', 						'Fermer le calendrier');
define('_MD_JOUR_INDISPO', 						'Cette journée n\'est pas ouverte à la réservation');
define('_MD_MOIS_INDISPO', 						'Ce mois n\'est pas ouvert à la réservation');
define('_MD_HEURE_INDISPO', 					'Cette heure n\'est pas ouverte à la réservation');

// -- demande liée à un calendrier (make_demcal.php)
define('_MD_TITLE_MAKEDEMCAL',					'Réserver');
define('_MD_NBOCCRES_TRANCHE',					'Nombre de réservation total possible pour une tranche horraire ');
define('_MD_DATEHEURE_RESERV', 					'Date et heure de réservation');

// -- Spécificités du calendrier
define('_MD_RES_INCONNU',						'Réservation inconnue');
define('_MD_SPEC_EXISTE',						'Vous avez déjà bloqué cette période');
define('_MD_SPEC_OK',							'Cette période est maintenant bloquée');
define('_MD_OPERATION_INCONNUE', 				'Opération inconnue');
define('_MD_SPEC_NOT_EXISTE', 					'Cette période n\'est pas bloquée');
define('_MD_SPEC_DEL_OK', 						'Cette période est maintenant ouverte');

// --
define('_MD_SELOK',								'Vous avez sélectionné un horaire mais n\'oubliez de valider vos demandes pour quelles soient prises en compte');
define('_MD_SELSUPP',							'Votre sélection a bien été supprimée de votre liste');
define('_MD_ALLSEL',							'Vos sélections');
define('_MD_COMMENTAIRE',					'Commentaire');
define('_MD_SEE',									'Voir');
define('_MD_NORESERV',						'Aucune réservation effectuée');
define('_MD_IMGCAT',                                            'Image catégorie');
define('_MD_UPLOAD_ERROR',                                      'Upload image impossible, vérifier hauteur, largeur et taille de votre image.');
// Ecran administration
define('_MD_PERM_TITLE',                                        'Gestion des droits du module de réservation.');
define('_MD_PERM_DESC',                                         'Sélectionnez pour chaque groupe les catégories qu\'il est autorisé à voir.<br />');
define('_MD_DENIED_CAT',        				'Vous n\'êtes pas autorisé à accéder à cette catégorie.'); 
define('_MD_ETATDEM_ANNULEE',                                   'Demande annulée');
// Ecran acceuil
define('_MD_ACCEUIL1',                                          'Menu module');
define('_MD_ACCEUIL2',                                          'Les dernières réservations calendrier');
define('_MD_ACCEUIL3',                                          'Les dernières réservations simple');
define('_MD_ACCEUIL4',                                          'Vos demandes');
define('_MD_SUITE',                                             'Suite ...');
define('_MD_TOTAL_RES',                                         'Total');
define('_MD_DEM_VAL',                                           'Dem Val.');
define('_MD_RES_DISPO',                                         'Dispo.');
define('_MD_CARACTERE_A',                                       'à');
define('_MD_MASS_UPD_RES',                                      'Mise à jour réservation en masse');
define('_MD_CHECK_BOX_MAJ',                                     'Mettre à jour ?');
define('_MD_MASS_UPD_DESC',                                     'S&eacute;lectionner les r&eacute;servations qui doivent &ecirc;tre mise &agrave; jour. Indiquer ensuite chaque information &agrave; mettre &agrave; jour.');
define('_MD_MASS_UPD_SPECAL',                                   'Bloquer, D&eacute;bloquer des p&eacute;riodes en masse');
define('_MD_MASS_UPD_SPECAL_DESC',                              'S&eacute;lectionner les r&eacute;servations qui doivent &ecirc;tre mise &agrave; jour.<br /> Indiquer ensuite chaque information &agrave; mettre &agrave; jour. <br /><br />Penser à indiquer si vous bloquez ou vous d&eacute;bloquez des périodes.<br /><br />Choisir ensuite la mise &agrave; jour par journ&eacute;e ou par tranche horaire d\'une journ&eacute;e.');
define('_MD_MASS_UPD_LOCK',                                     'Bloquer');
define('_MD_MASS_UPD_UNLOCK',                                   'D&eacute;bloquer');

?>
