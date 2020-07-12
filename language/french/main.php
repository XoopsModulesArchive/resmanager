<?php

// variable pour partie admin du module
// -- menu
define('_MD_TITLE','Administration module r�servation');
define('_MD_MENU1','Gestion des droits');
define('_MD_MENU2', 'Ajouter une cat�gorie');
define('_MD_MENU3', 'Mettre � jour une  cat�gorie');
define('_MD_MENU4', 'Param�trer une r�servation');
define('_MD_MENU5', 'Mettre � jour le param�trage d\'une  r�servation');
define('_MD_MENU6', 'Mettre � jour plusieurs r�servations');


define('_MD_RESMANAGER_SUBMENU1', 'R�server');
define('_MD_RESMANAGER_SUBMENU2', 'Liste des demandes');
define('_MD_RESMANAGER_SUBMENU3', 'Ajouter une cat�gorie');
define('_MD_RESMANAGER_SUBMENU4', 'Mettre � jour une  cat�gorie');
define('_MD_RESMANAGER_SUBMENU5', 'Param�trer une r�servation');
define('_MD_RESMANAGER_SUBMENU6', 'Mettre � jour le param�trage d\'une  r�servation');


// Commun
define('_MD_ENR',		 							'Enregistrer');
define('_MD_SUPP', 									'Supprimer');
define('_MD_VAL', 									'Valider');
define('_MD_REFUS', 								'Refuser');
define('_MD_EDIT',		 							'Modifier');
define('_MD_DETAIL',		 						'D�tail');
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
define('_MD_ETATDEM_VALIDE',						'Valid�e');
define('_MD_ETATDEM_REFUSEE',						'Refus�e');

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
define('_MD_FEVRIER',								'F�vrier');
define('_MD_MARS',									'Mars');
define('_MD_AVRIL',									'Avril');
define('_MD_MAI',									'Mai');
define('_MD_JUIN',									'Juin');
define('_MD_JUILLET',								'Juillet');
define('_MD_AOUT',									'Ao�t');
define('_MD_SEPTEMBRE',								'Septembre');
define('_MD_OCTOBRE',								'Octobre');
define('_MD_NOVEMBRE',								'Novembre');
define('_MD_DECEMBRE',								'D�cembre');

define('_MD_HEURE',									'Heure');
define('_MD_MINUTE',								'Minute');

define('_MD_DATE_JOUR',								'Aujourd\'hui');

define('_MD_JOUR_SUIV',								'Jour >');
define('_MD_JOUR_PREC',	  							'< Jour');

define('_MD_MOIS_SUIV',								'Mois >>');
define('_MD_MOIS_PREC',	  							'<< Mois');

define('_MD_ANNEE_SUIV',							'Ann�e >>>');
define('_MD_ANNEE_PREC',	  						'<<< Ann�e');

// -- minimum r�servation
define('_MD_MIN_HEURE',								'Heure');


// -- message erreur communs
define('_MD_ACCES_DENIED',							'Vous n\'�tes pas autoris� � acc�der � cette page'); 
define('_MD_VALID_DENIED',							'Vous n\'�tes pas autoris� � valider des demandes'); 
define('_MD_REFUS_DENIED',        					'Vous n\'�tes pas autoris� � refuser des demandes');
define('_MD_DEMDENIED',								'Cette demande ne vous appartient pas, vous n\'y avez pas acc�s');
define('_MD_ACCESBD_KO',							'Une erreur est survenue lors de l\'acc�s � la base de donn�e. Contactez le webmaster.');
define('_MD_ERREUR_SAISIE',							'Erreurs de saisie');
define('_MD_MESS_DB',								'Message base de donn�e');

define('_MD_FORMAT_DATE_KO',						'Date incorrecte');
define('_MD_FORMAT_NUMBER_KO',						'Nombre incorrect');
define('_MD_NB_NOTZERO',							'Le nombre doit �tre sup�rieur � z�ro');

// Administration
// Formulaire ajout cat�gorie
define('_MD_TADDCAT', 								'Cat�gorie r�servation');
define('_MD_NOMCAT', 								'Nom Cat�gorie');
define('_MD_DESCRCAT', 								'Description Cat�gorie');
define('_MD_ADDCAT', 								'Ajouter une cat�gorie');
define('_MD_ADDOK', 								'Cat�gorie ajout�e');

// -- Formulaire edition, supp, maj cat�gorie
define('_MD_TMAJCAT', 								'Cat�gorie r�servation');
define('_MD_ENRCAT', 								'Enregistrer');
define('_MD_SUPPCAT', 								'Supprimer');
define('_MD_EDITCAT', 								'Modifier');
define('_MD_ENROK', 								'Cat�gorie Mise � jour');
define('_MD_SUPPOK', 								'Cat�gorie supprim�e');
define('_MD_SUPPCATKO', 							'Vous ne pouvez pas supprimer cette cat�gorie, des r�servations sont associ�s � cette cat�gorie.');


// -- Formulaire ajout reservation
define('_MD_TADDRES', 							'R�servation');
define('_MD_NOMRES', 							'Nom r�servation');
define('_MD_DESCRRES', 							'Description');
define('_MD_OPENRES', 							'Date de d�but du calendrier');
define('_MD_CLOSERES', 							'Date de fin du calendrier');
define('_MD_TYPERES', 							'Type');
define('_MD_CATRES', 							'Cat�gorie ');
define('_MD_VALIDRES', 							'Validation n�cessaire');
define('_MD_NBOCCRES', 							'Nombre de demande total ');
define('_MD_OCCPERSRES', 						'Nombre de demande par membre ');
define('_MD_ADDRES', 							'Ajouter une r�servation');
define('_MD_ADDRESOK',							'R�servation ajout�e');
define('_MD_TYPERES_QUESTION',					'Quel type de r�servation voulez vous cr�er ?');
define('_MD_OPEN_SEM',							'Jour ouverture');
define('_MD_MIN_RES',							'R�servation minimum');
define('_MD_HEURE_DEB',							'Heure D�but');
define('_MD_HEURE_FIN',							'Heure fin');
define('_MD_HEURE_FIN_ERROR',     				'L\'heure de fin doit �tre sup�rieures � l\'heure de d�but');
define('_MD_ACTIVERES', 						'Activer r�servation');

// Formulaire maj r�servation
define('_MD_TMAJRES', 							'Edition r�servation');
define('_MD_MAJRESOK',							'R�servation Mise � jour');
define('_MD_SUPPRESOK',							'R�servation supprim�e');
define('_MD_SUPPRESKO',							'Des demandes sont associ�s � cette r�servation, impossible de la supprimer');
define('_MD_LST_ALLDEM',						'Les demandes des membres');
define('_MD_OPEN_SUP_CLOSE',					'La date de fin du calendrier doit �tre sup�rieur � la date de d�but');
define('_MD_OCC_SUP_NB',						'Le nombre total doit �tre sup�rieur au nombre de demande par membre');

define('_MD_NBDEMVAL', 							'Nombre de demandes valid�es ');
define('_MD_DEMTOVAL',							'Nombre de demandes � valider ');



// Module
// -- Ecran demande de reservation
define('_MD_TITLE_MAKERESERV1',					'Choix de la cat�gorie');
define('_MD_TITLE_MAKERESERV2',					'Liste des r�servation dans la cat�gorie');
define('_MD_TITLE_MAKERESERV3',					'R�server');
define('_MD_TITLE_TABRESERV1',					'Nom r�servation');
define('_MD_TITLE_TABRESERV2',					'Type');
define('_MD_TITLE_TABRESERV3',					'Action');
define('_MD_BACK_LSTCAT',						'<< Liste des cat�gories');
define('_MD_OPERESERV',							'R�server');
define('_MD_RESERV_RESULTAT',					'R�sultat r�servation');
define('_MD_RESERVOK',							'Votre r�servation est effectu�e.');
define('_MD_RESERNUMANDINFO',				'Si une validation est n�cessaire vous recevrez une confirmation. <br />votre num�ro de demande est le suivant : ');
define('_MD_RESERVKO',							'Une erreur est survenue lors de la r�servation');
define('_MD_RESERVFULL',						'Il n\'y a plus de disponibilit�s pour cette r�servation');
define('_MD_RESERVFULLUSER',					'Vous avez d�j� effectu� le nombre de r�servation maximum possible pour un membre');
define('_MD_FREERES',							'Disponibilit�s');
define('_MD_RESERV_NOTACTIVE',					'Cette r�servation n\'est pas ouverte');

// -- Ecran liste des demandes de reservation
define('_MD_TITLE_LSTDEM',						'Liste de vos demandes');
define('_MD_TITLE_TABDEM1',						'N�');
define('_MD_TITLE_TABDEM2',						'Date demande');
define('_MD_TITLE_TABDEM3',						'Cat�gorie');
define('_MD_TITLE_TABDEM4',						'R�servation');
define('_MD_TITLE_TABDEM5',						'Nom membre');
define('_MD_TITLE_TABDEM6',						'Etat demande');
define('_MD_TITLE_TABDEM7',						'Action');

// -- Editer une demande
define('_MD_TITLE_TITLE_NODEM',					'Demande N� : ');
define('_MD_DATE_DEM',							'Date demande ');
define('_MD_DATE_VAL',							'Date Validation ');
define('_MD_NOM_MEMBRE',						'Nom membre ');
define('_MD_STATUS_DEM',						'Etat demande ');
define('_MD_MESS_REFUS',						'Message');
define('_MD_MESSAGE_EDITDEM',					'R�sultat action');
define('_MD_VALDEM_OK',							'La demande est valid�e');
define('_MD_REFUS_OK',							'La demande est bien refus�e');
define('_MD_REFUS_MESS_KO',						'Vous devez saisir un message pour refuser la demande');
define('_MD_ANNULATION_OK',						'Votre demande a �t� annul�e');
define('_MD_DEM_ALREADY_VALID',					'Cette demande est d�j� valid�e');
define('_MD_DEM_ALREADY_REFUSEE',				'Cette demande a d�j� �t� refus�e');

// -- Editer une journ�e
define('_MD_DAY_CLOSE',							'Cette journ�e n\'est pas disponible');
define('_MD_HEURE_JOURNEE',						'Heure');
define('_MD_HEURE_RES',							'Reservations');
define('_MD_TITLE_EDIT_DAY',					'Calendrier de la r�servation : ');
define('_MD_FERMER_CAL', 						'Fermer le calendrier');
define('_MD_JOUR_INDISPO', 						'Cette journ�e n\'est pas ouverte � la r�servation');
define('_MD_MOIS_INDISPO', 						'Ce mois n\'est pas ouvert � la r�servation');
define('_MD_HEURE_INDISPO', 					'Cette heure n\'est pas ouverte � la r�servation');

// -- demande li�e � un calendrier (make_demcal.php)
define('_MD_TITLE_MAKEDEMCAL',					'R�server');
define('_MD_NBOCCRES_TRANCHE',					'Nombre de r�servation total possible pour une tranche horraire ');
define('_MD_DATEHEURE_RESERV', 					'Date et heure de r�servation');

// -- Sp�cificit�s du calendrier
define('_MD_RES_INCONNU',						'R�servation inconnue');
define('_MD_SPEC_EXISTE',						'Vous avez d�j� bloqu� cette p�riode');
define('_MD_SPEC_OK',							'Cette p�riode est maintenant bloqu�e');
define('_MD_OPERATION_INCONNUE', 				'Op�ration inconnue');
define('_MD_SPEC_NOT_EXISTE', 					'Cette p�riode n\'est pas bloqu�e');
define('_MD_SPEC_DEL_OK', 						'Cette p�riode est maintenant ouverte');

// --
define('_MD_SELOK',								'Vous avez s�lectionn� un horaire mais n\'oubliez de valider vos demandes pour quelles soient prises en compte');
define('_MD_SELSUPP',							'Votre s�lection a bien �t� supprim�e de votre liste');
define('_MD_ALLSEL',							'Vos s�lections');
define('_MD_COMMENTAIRE',					'Commentaire');
define('_MD_SEE',									'Voir');
define('_MD_NORESERV',						'Aucune r�servation effectu�e');
define('_MD_IMGCAT',                                            'Image cat�gorie');
define('_MD_UPLOAD_ERROR',                                      'Upload image impossible, v�rifier hauteur, largeur et taille de votre image.');
// Ecran administration
define('_MD_PERM_TITLE',                                        'Gestion des droits du module de r�servation.');
define('_MD_PERM_DESC',                                         'S�lectionnez pour chaque groupe les cat�gories qu\'il est autoris� � voir.<br />');
define('_MD_DENIED_CAT',        				'Vous n\'�tes pas autoris� � acc�der � cette cat�gorie.'); 
define('_MD_ETATDEM_ANNULEE',                                   'Demande annul�e');
// Ecran acceuil
define('_MD_ACCEUIL1',                                          'Menu module');
define('_MD_ACCEUIL2',                                          'Les derni�res r�servations calendrier');
define('_MD_ACCEUIL3',                                          'Les derni�res r�servations simple');
define('_MD_ACCEUIL4',                                          'Vos demandes');
define('_MD_SUITE',                                             'Suite ...');
define('_MD_TOTAL_RES',                                         'Total');
define('_MD_DEM_VAL',                                           'Dem Val.');
define('_MD_RES_DISPO',                                         'Dispo.');
define('_MD_CARACTERE_A',                                       '�');
define('_MD_MASS_UPD_RES',                                      'Mise � jour r�servation en masse');
define('_MD_CHECK_BOX_MAJ',                                     'Mettre � jour ?');
define('_MD_MASS_UPD_DESC',                                     'S&eacute;lectionner les r&eacute;servations qui doivent &ecirc;tre mise &agrave; jour. Indiquer ensuite chaque information &agrave; mettre &agrave; jour.');
define('_MD_MASS_UPD_SPECAL',                                   'Bloquer, D&eacute;bloquer des p&eacute;riodes en masse');
define('_MD_MASS_UPD_SPECAL_DESC',                              'S&eacute;lectionner les r&eacute;servations qui doivent &ecirc;tre mise &agrave; jour.<br /> Indiquer ensuite chaque information &agrave; mettre &agrave; jour. <br /><br />Penser � indiquer si vous bloquez ou vous d&eacute;bloquez des p�riodes.<br /><br />Choisir ensuite la mise &agrave; jour par journ&eacute;e ou par tranche horaire d\'une journ&eacute;e.');
define('_MD_MASS_UPD_LOCK',                                     'Bloquer');
define('_MD_MASS_UPD_UNLOCK',                                   'D&eacute;bloquer');

?>
