<?php

// variable pour partie admin du module
// -- menu
define('_MD_TITLE','Administración');
define('_MD_MENU1','Gestion des droits');
define('_MD_MENU2', 'Ajouter une catégorie');
define('_MD_MENU3', 'Mettre à jour une  catégorie');
define('_MD_MENU4', 'Paramétrer une réservation');
define('_MD_MENU5', 'Mettre à jour le paramétrage d\'une  réservation');
define('_MD_MENU6', 'Mettre à jour plusieurs réservations');

define('_MD_RESMANAGER_SUBMENU1', 'Reservaciones');
define('_MD_RESMANAGER_SUBMENU2', 'Solicitar Lista');
define('_MD_RESMANAGER_SUBMENU3', 'Agregar una categoría');
define('_MD_RESMANAGER_SUBMENU4', 'Acutalizar una categoría');
define('_MD_RESMANAGER_SUBMENU5', 'Generar una reservación');
define('_MD_RESMANAGER_SUBMENU6', 'Actualizar la configuración de una reservación');


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
define('_MD_ACTION',		 						'Acción');

// -- liste de valeur
define('_MD_OK',			 						'Sí');
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
define('_MD_MERCREDI',								'Miércoles');
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

define('_MD_JOUR_SUIV',								'Día >');
define('_MD_JOUR_PREC',	  							'< Día');

define('_MD_MOIS_SUIV',								'Mes >>');
define('_MD_MOIS_PREC',	  							'<< Mes');

define('_MD_ANNEE_SUIV',							'Año >>>');
define('_MD_ANNEE_PREC',	  						'<<< Año');

// -- minimum réservation
define('_MD_MIN_HEURE',								'Hora');


// -- message erreur communs
define('_MD_ACCES_DENIED',							'Usted no está autorizado para ver esta página'); 
define('_MD_VALID_DENIED',							'Usted no está autorizado para validar solicitudes'); 
define('_MD_REFUS_DENIED',        						'Usted no está autorizado para rechazar solicitudes');
define('_MD_DEMDENIED',								'Esta petición no la tiene permitida. Acceso denegado ');
define('_MD_ACCESBD_KO',							'Un error ha ocurrido cuando se intentaba conectar a la base de datos. Por favor, contacte el webmaster.');
define('_MD_ERREUR_SAISIE',							'Errores de saisie');
define('_MD_MESS_DB',								'Mensaje de la base de datos');

define('_MD_FORMAT_DATE_KO',							'Fecha equivocada');
define('_MD_FORMAT_NUMBER_KO',						'Número equivocado');
define('_MD_NB_NOTZERO',							'El número debe ser más grande que cero');

// Administration
// Formulaire ajout catégorie
define('_MD_TADDCAT', 								'Categoría de reservación');
define('_MD_NOMCAT', 								'Nombre de la categoría');
define('_MD_DESCRCAT', 								'Descripción de la categoría');
define('_MD_ADDCAT', 								'Agregar una categoría');
define('_MD_ADDOK', 								'Categoría agregada');

// -- Formulaire edition, supp, maj catégorie
define('_MD_TMAJCAT', 								'Categoría de reservación');
define('_MD_ENRCAT', 								'Enviar');
define('_MD_SUPPCAT', 								'Borrar');
define('_MD_EDITCAT', 								'Abrir');
define('_MD_ENROK', 								'Categoría actualizada');
define('_MD_SUPPOK', 								'Category borrada');
define('_MD_SUPPCATKO', 							'Usted no puede borrar esta categoría: hay reservaciones hechas en ella.');


// -- Formulaire ajout reservation
define('_MD_TADDRES', 							'Reservaciones');
define('_MD_NOMRES', 							'Nombre de la reservación');
define('_MD_DESCRRES', 							'Descripción');
define('_MD_OPENRES', 							'Comienzo de la fecha del calendario');
define('_MD_CLOSERES', 							'Fin de la fecha del calendario');
define('_MD_TYPERES', 							'Tipo');
define('_MD_CATRES', 							'Categoría');
define('_MD_VALIDRES', 							'Una validación es requerida');
define('_MD_NBOCCRES', 							'Solicitudes totales');
define('_MD_OCCPERSRES', 						'Solicitudes por miembros');
define('_MD_ADDRES', 							'Agregar una reservación');
define('_MD_ADDRESOK',							'Reservación agregada');
define('_MD_TYPERES_QUESTION',					'¿Qué tipo de reservación usted quiere crear?');
define('_MD_OPEN_SEM',							'Días disponibles');
define('_MD_MIN_RES',							'Reservación mínima');
define('_MD_HEURE_DEB',							'Hora de comienzo');
define('_MD_HEURE_FIN',							'Hora de terminación');
define('_MD_HEURE_FIN_ERROR',     					'La hora final debe ser más grande que la hora de comienzo');
define('_MD_ACTIVERES', 						'Activar reservación');

// Formulaire maj réservation
define('_MD_TMAJRES', 							'Editar reservación');
define('_MD_MAJRESOK',							'Reservación actualizada');
define('_MD_SUPPRESOK',							'Reservación borrada');
define('_MD_SUPPRESKO',							'Usted no puede borrar esta reservación: hay solicitudes asociadas a ella.');
define('_MD_LST_ALLDEM',						'Solicitudes de miembros');
define('_MD_OPEN_SUP_CLOSE',						'El fin de la fecha del calendario debe ser mayor que cero que la fecha de comienzo');
define('_MD_OCC_SUP_NB',						'El número total debe ser mayor que las solicitudes de los miembros');

define('_MD_NBDEMVAL', 							'Número de solicitudes validadas');
define('_MD_DEMTOVAL',							'Numeros de solicitudes para ser validadas');



// Module
// -- Ecran demande de reservation
define('_MD_TITLE_MAKERESERV1',					'Elija una categoría');
define('_MD_TITLE_MAKERESERV2',					'Lista de reservaciones en la categoría');
define('_MD_TITLE_MAKERESERV3',					'Reserva');
define('_MD_TITLE_TABRESERV1',					'Nombre de la reservación');
define('_MD_TITLE_TABRESERV2',					'Tipo');
define('_MD_TITLE_TABRESERV3',					'Acción');
define('_MD_BACK_LSTCAT',						'<< Lista de categoría\'s');
define('_MD_OPERESERV',							'Reserva');
define('_MD_RESERV_RESULTAT',						'Resultados de las reservaciones');
define('_MD_RESERVOK',							'Su reservación ha sido anotada.');
define('_MD_RESERNUMANDINFO',				'Si una validación es requerida, usted recibirá una confirmación. <br />Su número de solicitud es el siguiente: ');
define('_MD_RESERVKO',							'Un error ocurrió cuando se realizaba la reservación');
define('_MD_RESERVFULL',						'No hay disponibilidades para esta reservación');
define('_MD_RESERVFULLUSER',						'Usted ya tiene hechas la cantidad máxima de reservaciones permitidas a cada miembro');
define('_MD_FREERES',							'Disponibilidad');
define('_MD_RESERV_NOTACTIVE',					'Esta reservación no está abierta');

// -- Ecran liste des demandes de reservation
define('_MD_TITLE_LSTDEM',						'Su lista de solicitudes');
define('_MD_TITLE_TABDEM1',						'N°');
define('_MD_TITLE_TABDEM2',						'Fecha de la solicitud');
define('_MD_TITLE_TABDEM3',						'Categoría');
define('_MD_TITLE_TABDEM4',						'Reservación');
define('_MD_TITLE_TABDEM5',						'Nombre del miembro');
define('_MD_TITLE_TABDEM6',						'Estado de la solicitud');
define('_MD_TITLE_TABDEM7',						'Acción');

// -- Editer une demande
define('_MD_TITLE_TITLE_NODEM',					'Soliciud nº : ');
define('_MD_DATE_DEM',							'Fecha de la solicitud');
define('_MD_DATE_VAL',							'Fecha de la validación');
define('_MD_NOM_MEMBRE',						'Nombre del miembro');
define('_MD_STATUS_DEM',						'Estado de la solicitud');
define('_MD_MESS_REFUS',						'Mensaje');
define('_MD_MESSAGE_EDITDEM',						'Resultado de la acción');
define('_MD_VALDEM_OK',							'La solicitud está validada');
define('_MD_REFUS_OK',							'La soicitud ha sido rechazada');
define('_MD_REFUS_MESS_KO',						'Usted debe escribir un mensaje a máquina para negar esta solicitud');
define('_MD_ANNULATION_OK',						'Su solicitud ha sido cancelada');
define('_MD_DEM_ALREADY_VALID',					'Esta solicitud ya se validó');
define('_MD_DEM_ALREADY_REFUSEE',					'Esta solicitud ya se negó');

// -- Editer une journée
define('_MD_DAY_CLOSE',							'Este día no esta disponible');
define('_MD_HEURE_JOURNEE',						'Hora');
define('_MD_HEURE_RES',							'Reservación');
define('_MD_TITLE_EDIT_DAY',						'Calendario de reservaciones: ');
define('_MD_FERMER_CAL', 						'Calendario cerrado');
define('_MD_JOUR_INDISPO', 						'Este día no está abierto para reservaciones');
define('_MD_MOIS_INDISPO', 						'Este mes no está abierto para reservaciones');
define('_MD_HEURE_INDISPO', 					'Esta hora no está abierta para reservaciones');

// -- demande liée à un calendrier (make_demcal.php)
define('_MD_TITLE_MAKEDEMCAL',					'Reservaciones');
define('_MD_NBOCCRES_TRANCHE',					'Total de reservaciones disponibles en este el momento:');
define('_MD_DATEHEURE_RESERV', 					'Hora y fecha de la reservaciones');

// -- Spécificités du calendrier
define('_MD_RES_INCONNU',						'Reservaciones desconocidas');
define('_MD_SPEC_EXISTE',						'Usted ya ha reservado este período');
define('_MD_SPEC_OK',							'Este período ahora está cerrado');
define('_MD_OPERATION_INCONNUE', 					'Operación desconocida');
define('_MD_SPEC_NOT_EXISTE', 					'Este período no esta cerrado');
define('_MD_SPEC_DEL_OK', 						'Este período ahora está abierto');

// --
define('_MD_SELOK', 'Su programación ha sido seleccionada, pero no se olvide de confirmarla');
define('_MD_SELSUPP', 'su selección fue sacada de la lista');
define('_MD_ALLSEL', 'Su elección');
define('_MD_COMMENTAIRE', 'comment');
define('_MD_SEE',									'See');
define('_MD_NORESERV',						'No books made');
define('_MD_IMGCAT',                                            'Image catégorie');
define('_MD_UPLOAD_ERROR',                                      'Upload image impossible, vérifier hauteur, largeur et taile de votre image.');
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
