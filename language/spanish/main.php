<?php

// variable pour partie admin du module
// -- menu
define('_MD_TITLE','Administraci�n');
define('_MD_MENU1','Gestion des droits');
define('_MD_MENU2', 'Ajouter une cat�gorie');
define('_MD_MENU3', 'Mettre � jour une  cat�gorie');
define('_MD_MENU4', 'Param�trer une r�servation');
define('_MD_MENU5', 'Mettre � jour le param�trage d\'une  r�servation');
define('_MD_MENU6', 'Mettre � jour plusieurs r�servations');

define('_MD_RESMANAGER_SUBMENU1', 'Reservaciones');
define('_MD_RESMANAGER_SUBMENU2', 'Solicitar Lista');
define('_MD_RESMANAGER_SUBMENU3', 'Agregar una categor�a');
define('_MD_RESMANAGER_SUBMENU4', 'Acutalizar una categor�a');
define('_MD_RESMANAGER_SUBMENU5', 'Generar una reservaci�n');
define('_MD_RESMANAGER_SUBMENU6', 'Actualizar la configuraci�n de una reservaci�n');


// Commun
define('_MD_ENR',		 							'Grabar');
define('_MD_SUPP', 								'Borrar');
define('_MD_VAL', 								'Validar');
define('_MD_REFUS', 								'Rechazar');
define('_MD_EDIT',		 						'Abierto');
define('_MD_DETAIL',		 						'Detalles');
define('_MD_ANNULER',								'Cancelar');
define('_MD_BOUTONOK',		 						'Ok');
define('_MD_RETOUR',		 						'Volver');
define('_MD_ACTION',		 						'Acci�n');

// -- liste de valeur
define('_MD_OK',			 						'S�');
define('_MD_KO',		 							'NO');

define('_MD_TYPERES_UNIQUE',							'Epecial');
define('_MD_TYPERES_EVENEMENT',						'Evento');
define('_MD_TYPERES_CALENDRIER',						'Calendario');

define('_MD_ETATDEM_A_VALIDER',						'Para ser validada');
define('_MD_ETATDEM_VALIDE',						'Validada');
define('_MD_ETATDEM_REFUSEE',						'Denegada');

// -- calendrier
define('_MD_DIMANCHE_C',							'Dom');
define('_MD_LUNDI_C',								'Lun');
define('_MD_MARDI_C',								'Mar');
define('_MD_MERCREDI_C',							'Mie');
define('_MD_JEUDI_C',								'Jue');
define('_MD_VENDREDI_C',							'Vie');
define('_MD_SAMEDI_C',								'Sab');

define('_MD_DIMANCHE',								'Domingo');
define('_MD_LUNDI',								'Lunes');
define('_MD_MARDI',								'Martes');
define('_MD_MERCREDI',								'Mi�rcoles');
define('_MD_JEUDI',								'Jueves');
define('_MD_VENDREDI',								'Viernes');
define('_MD_SAMEDI',								'Sabado');

define('_MD_JANVIER',								'Enero');
define('_MD_FEVRIER',								'Febrero');
define('_MD_MARS',									'Marzo');
define('_MD_AVRIL',									'Abril');
define('_MD_MAI',									'Mayo');
define('_MD_JUIN',									'Junio');
define('_MD_JUILLET',								'Julio');
define('_MD_AOUT',									'Agosto');
define('_MD_SEPTEMBRE',								'Septiembre');
define('_MD_OCTOBRE',								'Octubre');
define('_MD_NOVEMBRE',								'Noviembre');
define('_MD_DECEMBRE',								'Deciembre');

define('_MD_HEURE',									'Hora');
define('_MD_MINUTE',								'Minuto');

define('_MD_DATE_JOUR',								'Hoy');

define('_MD_JOUR_SUIV',								'D�a >');
define('_MD_JOUR_PREC',	  							'< D�a');

define('_MD_MOIS_SUIV',								'Mes >>');
define('_MD_MOIS_PREC',	  							'<< Mes');

define('_MD_ANNEE_SUIV',							'A�o >>>');
define('_MD_ANNEE_PREC',	  						'<<< A�o');

// -- minimum r�servation
define('_MD_MIN_HEURE',								'Hora');


// -- message erreur communs
define('_MD_ACCES_DENIED',							'Usted no est� autorizado para ver esta p�gina'); 
define('_MD_VALID_DENIED',							'Usted no est� autorizado para validar solicitudes'); 
define('_MD_REFUS_DENIED',        						'Usted no est� autorizado para rechazar solicitudes');
define('_MD_DEMDENIED',								'Esta petici�n no la tiene permitida. Acceso denegado ');
define('_MD_ACCESBD_KO',							'Un error ha ocurrido cuando se intentaba conectar a la base de datos. Por favor, contacte el webmaster.');
define('_MD_ERREUR_SAISIE',							'Errores de saisie');
define('_MD_MESS_DB',								'Mensaje de la base de datos');

define('_MD_FORMAT_DATE_KO',							'Fecha equivocada');
define('_MD_FORMAT_NUMBER_KO',						'N�mero equivocado');
define('_MD_NB_NOTZERO',							'El n�mero debe ser m�s grande que cero');

// Administration
// Formulaire ajout cat�gorie
define('_MD_TADDCAT', 								'Categor�a de reservaci�n');
define('_MD_NOMCAT', 								'Nombre de la categor�a');
define('_MD_DESCRCAT', 								'Descripci�n de la categor�a');
define('_MD_ADDCAT', 								'Agregar una categor�a');
define('_MD_ADDOK', 								'Categor�a agregada');

// -- Formulaire edition, supp, maj cat�gorie
define('_MD_TMAJCAT', 								'Categor�a de reservaci�n');
define('_MD_ENRCAT', 								'Enviar');
define('_MD_SUPPCAT', 								'Borrar');
define('_MD_EDITCAT', 								'Abrir');
define('_MD_ENROK', 								'Categor�a actualizada');
define('_MD_SUPPOK', 								'Category borrada');
define('_MD_SUPPCATKO', 							'Usted no puede borrar esta categor�a: hay reservaciones hechas en ella.');


// -- Formulaire ajout reservation
define('_MD_TADDRES', 							'Reservaciones');
define('_MD_NOMRES', 							'Nombre de la reservaci�n');
define('_MD_DESCRRES', 							'Descripci�n');
define('_MD_OPENRES', 							'Comienzo de la fecha del calendario');
define('_MD_CLOSERES', 							'Fin de la fecha del calendario');
define('_MD_TYPERES', 							'Tipo');
define('_MD_CATRES', 							'Categor�a');
define('_MD_VALIDRES', 							'Una validaci�n es requerida');
define('_MD_NBOCCRES', 							'Solicitudes totales');
define('_MD_OCCPERSRES', 						'Solicitudes por miembros');
define('_MD_ADDRES', 							'Agregar una reservaci�n');
define('_MD_ADDRESOK',							'Reservaci�n agregada');
define('_MD_TYPERES_QUESTION',					'�Qu� tipo de reservaci�n usted quiere crear?');
define('_MD_OPEN_SEM',							'D�as disponibles');
define('_MD_MIN_RES',							'Reservaci�n m�nima');
define('_MD_HEURE_DEB',							'Hora de comienzo');
define('_MD_HEURE_FIN',							'Hora de terminaci�n');
define('_MD_HEURE_FIN_ERROR',     					'La hora final debe ser m�s grande que la hora de comienzo');
define('_MD_ACTIVERES', 						'Activar reservaci�n');

// Formulaire maj r�servation
define('_MD_TMAJRES', 							'Editar reservaci�n');
define('_MD_MAJRESOK',							'Reservaci�n actualizada');
define('_MD_SUPPRESOK',							'Reservaci�n borrada');
define('_MD_SUPPRESKO',							'Usted no puede borrar esta reservaci�n: hay solicitudes asociadas a ella.');
define('_MD_LST_ALLDEM',						'Solicitudes de miembros');
define('_MD_OPEN_SUP_CLOSE',						'El fin de la fecha del calendario debe ser mayor que cero que la fecha de comienzo');
define('_MD_OCC_SUP_NB',						'El n�mero total debe ser mayor que las solicitudes de los miembros');

define('_MD_NBDEMVAL', 							'N�mero de solicitudes validadas');
define('_MD_DEMTOVAL',							'Numeros de solicitudes para ser validadas');



// Module
// -- Ecran demande de reservation
define('_MD_TITLE_MAKERESERV1',					'Elija una categor�a');
define('_MD_TITLE_MAKERESERV2',					'Lista de reservaciones en la categor�a');
define('_MD_TITLE_MAKERESERV3',					'Reserva');
define('_MD_TITLE_TABRESERV1',					'Nombre de la reservaci�n');
define('_MD_TITLE_TABRESERV2',					'Tipo');
define('_MD_TITLE_TABRESERV3',					'Acci�n');
define('_MD_BACK_LSTCAT',						'<< Lista de categor�a\'s');
define('_MD_OPERESERV',							'Reserva');
define('_MD_RESERV_RESULTAT',						'Resultados de las reservaciones');
define('_MD_RESERVOK',							'Su reservaci�n ha sido anotada.');
define('_MD_RESERNUMANDINFO',				'Si una validaci�n es requerida, usted recibir� una confirmaci�n. <br />Su n�mero de solicitud es el siguiente: ');
define('_MD_RESERVKO',							'Un error ocurri� cuando se realizaba la reservaci�n');
define('_MD_RESERVFULL',						'No hay disponibilidades para esta reservaci�n');
define('_MD_RESERVFULLUSER',						'Usted ya tiene hechas la cantidad m�xima de reservaciones permitidas a cada miembro');
define('_MD_FREERES',							'Disponibilidad');
define('_MD_RESERV_NOTACTIVE',					'Esta reservaci�n no est� abierta');

// -- Ecran liste des demandes de reservation
define('_MD_TITLE_LSTDEM',						'Su lista de solicitudes');
define('_MD_TITLE_TABDEM1',						'N�');
define('_MD_TITLE_TABDEM2',						'Fecha de la solicitud');
define('_MD_TITLE_TABDEM3',						'Categor�a');
define('_MD_TITLE_TABDEM4',						'Reservaci�n');
define('_MD_TITLE_TABDEM5',						'Nombre del miembro');
define('_MD_TITLE_TABDEM6',						'Estado de la solicitud');
define('_MD_TITLE_TABDEM7',						'Acci�n');

// -- Editer une demande
define('_MD_TITLE_TITLE_NODEM',					'Soliciud n� : ');
define('_MD_DATE_DEM',							'Fecha de la solicitud');
define('_MD_DATE_VAL',							'Fecha de la validaci�n');
define('_MD_NOM_MEMBRE',						'Nombre del miembro');
define('_MD_STATUS_DEM',						'Estado de la solicitud');
define('_MD_MESS_REFUS',						'Mensaje');
define('_MD_MESSAGE_EDITDEM',						'Resultado de la acci�n');
define('_MD_VALDEM_OK',							'La solicitud est� validada');
define('_MD_REFUS_OK',							'La soicitud ha sido rechazada');
define('_MD_REFUS_MESS_KO',						'Usted debe escribir un mensaje a m�quina para negar esta solicitud');
define('_MD_ANNULATION_OK',						'Su solicitud ha sido cancelada');
define('_MD_DEM_ALREADY_VALID',					'Esta solicitud ya se valid�');
define('_MD_DEM_ALREADY_REFUSEE',					'Esta solicitud ya se neg�');

// -- Editer une journ�e
define('_MD_DAY_CLOSE',							'Este d�a no esta disponible');
define('_MD_HEURE_JOURNEE',						'Hora');
define('_MD_HEURE_RES',							'Reservaci�n');
define('_MD_TITLE_EDIT_DAY',						'Calendario de reservaciones: ');
define('_MD_FERMER_CAL', 						'Calendario cerrado');
define('_MD_JOUR_INDISPO', 						'Este d�a no est� abierto para reservaciones');
define('_MD_MOIS_INDISPO', 						'Este mes no est� abierto para reservaciones');
define('_MD_HEURE_INDISPO', 					'Esta hora no est� abierta para reservaciones');

// -- demande li�e � un calendrier (make_demcal.php)
define('_MD_TITLE_MAKEDEMCAL',					'Reservaciones');
define('_MD_NBOCCRES_TRANCHE',					'Total de reservaciones disponibles en este el momento:');
define('_MD_DATEHEURE_RESERV', 					'Hora y fecha de la reservaciones');

// -- Sp�cificit�s du calendrier
define('_MD_RES_INCONNU',						'Reservaciones desconocidas');
define('_MD_SPEC_EXISTE',						'Usted ya ha reservado este per�odo');
define('_MD_SPEC_OK',							'Este per�odo ahora est� cerrado');
define('_MD_OPERATION_INCONNUE', 					'Operaci�n desconocida');
define('_MD_SPEC_NOT_EXISTE', 					'Este per�odo no esta cerrado');
define('_MD_SPEC_DEL_OK', 						'Este per�odo ahora est� abierto');

// --
define('_MD_SELOK', 'Su programaci�n ha sido seleccionada, pero no se olvide de confirmarla');
define('_MD_SELSUPP', 'su selecci�n fue sacada de la lista');
define('_MD_ALLSEL', 'Su elecci�n');
define('_MD_COMMENTAIRE', 'comment');
define('_MD_SEE',									'See');
define('_MD_NORESERV',						'No books made');
define('_MD_IMGCAT',                                            'Image cat�gorie');
define('_MD_UPLOAD_ERROR',                                      'Upload image impossible, v�rifier hauteur, largeur et taile de votre image.');
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
