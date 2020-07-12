<?php
//Translated to brazilian portuguese by Wilson > www.xoopstotal.com.br//
// variable pour partie admin du module
// -- menu
define('_MD_TITLE','Administra��o');
define('_MD_MENU1','Gestion des droits');
define('_MD_MENU2', 'Ajouter une cat�gorie');
define('_MD_MENU3', 'Mettre � jour une  cat�gorie');
define('_MD_MENU4', 'Param�trer une r�servation');
define('_MD_MENU5', 'Mettre � jour le param�trage d\'une  r�servation');
define('_MD_MENU6', 'Mettre � jour plusieurs r�servations');

define('_MD_RESMANAGER_SUBMENU1', 'Categorias');
define('_MD_RESMANAGER_SUBMENU2', 'Lista das requisi��es');
define('_MD_RESMANAGER_SUBMENU3', 'Incluir categoria');
define('_MD_RESMANAGER_SUBMENU4', 'Atualizar categoria');
define('_MD_RESMANAGER_SUBMENU5', 'Criar reserva');
define('_MD_RESMANAGER_SUBMENU6', 'Editar reserva');


// Commun
define('_MD_ENR',		 							'Gravar');
define('_MD_SUPP', 								'Deletar');
define('_MD_VAL', 								'Validar');
define('_MD_REFUS', 								'Recusar');
define('_MD_EDIT',		 						'Abrir');
define('_MD_DETAIL',		 						'Detalhe');
define('_MD_ANNULER',								'Cancelar');
define('_MD_BOUTONOK',		 						'Ok');
define('_MD_RETOUR',		 						'Voltar');
define('_MD_ACTION',		 						'A��o');

// -- liste de valeur
define('_MD_OK',			 						'SIM');
define('_MD_KO',		 							'N�O');

define('_MD_TYPERES_UNIQUE',							'Especial');
define('_MD_TYPERES_EVENEMENT',						'Evento');
define('_MD_TYPERES_CALENDRIER',						'Calend�rio');

define('_MD_ETATDEM_A_VALIDER',						'Aguardando valida��o');
define('_MD_ETATDEM_VALIDE',						'Validado');
define('_MD_ETATDEM_REFUSEE',						'Negado');

// -- calendrier
define('_MD_DIMANCHE_C',							'Dom');
define('_MD_LUNDI_C',								'Seg');
define('_MD_MARDI_C',								'Ter');
define('_MD_MERCREDI_C',							'Qua');
define('_MD_JEUDI_C',								'Quin');
define('_MD_VENDREDI_C',							'Sex');
define('_MD_SAMEDI_C',								'S�b');

define('_MD_DIMANCHE',								'Domingo');
define('_MD_LUNDI',								'Segunda');
define('_MD_MARDI',								'Ter�a');
define('_MD_MERCREDI',								'Quarta');
define('_MD_JEUDI',								'Quinta');
define('_MD_VENDREDI',								'Sexta');
define('_MD_SAMEDI',								'S�bado');

define('_MD_JANVIER',								'Janeiro');
define('_MD_FEVRIER',								'Fevereiro');
define('_MD_MARS',									'Mar�o');
define('_MD_AVRIL',									'Abril');
define('_MD_MAI',									'Maio');
define('_MD_JUIN',									'Junho');
define('_MD_JUILLET',								'Jullho');
define('_MD_AOUT',									'Agosto');
define('_MD_SEPTEMBRE',								'Setembro');
define('_MD_OCTOBRE',								'Outubro');
define('_MD_NOVEMBRE',								'Novembro');
define('_MD_DECEMBRE',								'Dezembro');

define('_MD_HEURE',									'Hora');
define('_MD_MINUTE',								'Minuto');

define('_MD_DATE_JOUR',								'Hoje');

define('_MD_JOUR_SUIV',								'Dia >');
define('_MD_JOUR_PREC',	  							'< Dia');

define('_MD_MOIS_SUIV',								'M�s>>');
define('_MD_MOIS_PREC',	  							'<< M�s');

define('_MD_ANNEE_SUIV',							'Ano >>>');
define('_MD_ANNEE_PREC',	  						'<<< Ano');

// -- minimum r�servation
define('_MD_MIN_HEURE',								'Hora');


// -- message erreur communs
define('_MD_ACCES_DENIED',							'Voc� n�o est� autorizado a ver esta p�gina'); 
define('_MD_VALID_DENIED',							'Voc� n�o est� autorizado a validar requisi��es'); 
define('_MD_REFUS_DENIED',        						'Voc� n�o est� autorizado a recusar requisi��es');
define('_MD_DEMDENIED',								'Esta requisi��o n�o � sua. Acesso negado');
define('_MD_ACCESBD_KO',							'Erro de conex�o com o banco de dados. Por favor, contate o webmaster.');
define('_MD_ERREUR_SAISIE',							'Erro(s) de processamento');
define('_MD_MESS_DB',								'Mensagem do banco de dados');

define('_MD_FORMAT_DATE_KO',							'Data errada');
define('_MD_FORMAT_NUMBER_KO',						'N�mero errado');
define('_MD_NB_NOTZERO',							'O n�mero deve ser maior que zero');

// Administration
// Formulaire ajout cat�gorie
define('_MD_TADDCAT', 								'Categoria de Reserva');
define('_MD_NOMCAT', 								'Nome da categoria');
define('_MD_DESCRCAT', 								'Descri��o da categoria');
define('_MD_ADDCAT', 								'Incluir categoria');
define('_MD_ADDOK', 								'Categoria inclu�da');

// -- Formulaire edition, supp, maj cat�gorie
define('_MD_TMAJCAT', 								'Categoria de Reserva');
define('_MD_ENRCAT', 								'Enviar');
define('_MD_SUPPCAT', 								'Deletar');
define('_MD_EDITCAT', 								'Abrir');
define('_MD_ENROK', 								'Categoria atualizada');
define('_MD_SUPPOK', 								'Categoria deletada');
define('_MD_SUPPCATKO', 							'Voc� n�o pode deletar esta categoria. Existem reservas associadas a ela.');


// -- Formulaire ajout reservation
define('_MD_TADDRES', 							'Reservas');
define('_MD_NOMRES', 							'Nome da reserva');
define('_MD_DESCRRES', 							'Descri��o');
define('_MD_OPENRES', 							'Data inicial do calend�rio');
define('_MD_CLOSERES', 							'Data final do calend�rio');
define('_MD_TYPERES', 							'Tipo');
define('_MD_CATRES', 							'Categoria');
define('_MD_VALIDRES', 							'Valida��o requerida');
define('_MD_NBOCCRES', 							'Total de requisi��es');
define('_MD_OCCPERSRES', 						'Requerida(s) pelos membros');
define('_MD_ADDRES', 							'Incluir reserva');
define('_MD_ADDRESOK',							'Reserva inclu�da');
define('_MD_TYPERES_QUESTION',					'Qual tipo de reserva voc� gostaria de criar?');
define('_MD_OPEN_SEM',							'Dias dispon�veis');
define('_MD_MIN_RES',							'Tempo m�nimo');
define('_MD_HEURE_DEB',							'Hor�rio inicial-');
define('_MD_HEURE_FIN',							'Hor�rio final');
define('_MD_HEURE_FIN_ERROR',     					'Hor�rio final deve ser maior que o hor�rio inicial');
define('_MD_ACTIVERES', 						'Ativar a reserva');

// Formulaire maj r�servation
define('_MD_TMAJRES', 							'Editar reserva');
define('_MD_MAJRESOK',							'Reseva atualizada');
define('_MD_SUPPRESOK',							'Reserva apagada');
define('_MD_SUPPRESKO',							'Voc� n�o pode deletar esta reserva. Existem requisi��es associadas a ela.');
define('_MD_LST_ALLDEM',						'Requisi��es dos membros');
define('_MD_OPEN_SUP_CLOSE',						'A data final do calend�rio deve ser maior que a inicial');
define('_MD_OCC_SUP_NB',						'N�mero total deve ser maior que as requisi��es dos membros');

define('_MD_NBDEMVAL', 							'N�mero de requisi��es validadas');
define('_MD_DEMTOVAL',							'N�mero de requisi��es � serem validadas');



// Module
// -- Ecran demande de reservation
define('_MD_TITLE_MAKERESERV1',					'Escolha de categoria');
define('_MD_TITLE_MAKERESERV2',					'Listagem das reservas na categoria');
define('_MD_TITLE_MAKERESERV3',					'Reserva');
define('_MD_TITLE_TABRESERV1',					'Nome da reserva');
define('_MD_TITLE_TABRESERV2',					'Tipo');
define('_MD_TITLE_TABRESERV3',					'A��o');
define('_MD_BACK_LSTCAT',						'<< Lista das categorias');
define('_MD_OPERESERV',							'Agendar');
define('_MD_RESERV_RESULTAT',						'Resultado do agendamento');
define('_MD_RESERVOK',							'Sua reserva foi efetuada.');
define('_MD_RESERNUMANDINFO',				'Caso a valida��o seja necess�ria, voc� receber� uma confirma��o. <br />O n�mero da sua requisi��o � o seguinte: ');
define('_MD_RESERVKO',							'Aconteceu um erro durante o processo de reserva');
define('_MD_RESERVFULL',						'N�o h� disponibilidade para esta reserva');
define('_MD_RESERVFULLUSER',						'Voc� j� realizou o maior n�mero de reservas permitidas para um �nico membro');
define('_MD_FREERES',							'Disponibilidade');
define('_MD_RESERV_NOTACTIVE',					'Agendamento n�o dispon�vel');

// -- Ecran liste des demandes de reservation
define('_MD_TITLE_LSTDEM',						'Sua lista de requisi��es');
define('_MD_TITLE_TABDEM1',						'N�');
define('_MD_TITLE_TABDEM2',						'Data');
define('_MD_TITLE_TABDEM3',						'Categoria');
define('_MD_TITLE_TABDEM4',						'Agendamento');
define('_MD_TITLE_TABDEM5',						'Nome');
define('_MD_TITLE_TABDEM6',						'Status');
define('_MD_TITLE_TABDEM7',						'A��o');

// -- Editer une demande
define('_MD_TITLE_TITLE_NODEM',					'Requisi��o N� : ');
define('_MD_DATE_DEM',							'Data da Requisi��o');
define('_MD_DATE_VAL',							'Data da Valida��o');
define('_MD_NOM_MEMBRE',						'Nome do membro');
define('_MD_STATUS_DEM',						'Status da requisi��o');
define('_MD_MESS_REFUS',						'Mensagem');
define('_MD_MESSAGE_EDITDEM',						'Resultado da a��o');
define('_MD_VALDEM_OK',							'Requisi��o validada');
define('_MD_REFUS_OK',							'Requisi��o foi recusada');
define('_MD_REFUS_MESS_KO',						'Digite uma mensagem para recusar esta requisi��o');
define('_MD_ANNULATION_OK',						'Sua requisi��o foi cancelada');
define('_MD_DEM_ALREADY_VALID',					'Esta requisi��o j� foi validada');
define('_MD_DEM_ALREADY_REFUSEE',					'Esta requisi��o j� foi recusada');

// -- Editer une journ�e
define('_MD_DAY_CLOSE',							'Este dia n�o est� dispon�vel');
define('_MD_HEURE_JOURNEE',						'Hora');
define('_MD_HEURE_RES',							'Booking');
define('_MD_TITLE_EDIT_DAY',						'Calend�rio das reservas: ');
define('_MD_FERMER_CAL', 						'Fechar Calend�rio');
define('_MD_JOUR_INDISPO', 						'Este dia n�o est� dispon�vel para reserva');
define('_MD_MOIS_INDISPO', 						'Este m�s n�o est� dispon�vel para reserva');
define('_MD_HEURE_INDISPO', 					'Este hor�rio n�o est� dispon�vel para reserva');

// -- demande li�e � un calendrier (make_demcal.php)
define('_MD_TITLE_MAKEDEMCAL',					'Agendar');
define('_MD_NBOCCRES_TRANCHE',					'Total de reservas at� o presente momento');
define('_MD_DATEHEURE_RESERV', 					'Data e hora do agendamento');

// -- Sp�cificit�s du calendrier
define('_MD_RES_INCONNU',						'Reserva desconhecida');
define('_MD_SPEC_EXISTE',						'Voc� j� havia reservado este per�odo');
define('_MD_SPEC_OK',							'Este per�odo encontra-se fechado atualmente');
define('_MD_OPERATION_INCONNUE', 					'Opera��o desconhecida');
define('_MD_SPEC_NOT_EXISTE', 					'Este per�odo n�o est� fechado');
define('_MD_SPEC_DEL_OK', 						'Este per�odo est� dispon�vel agora');

// --
define('_MD_SELOK', 'Seu hor�rio foi selecionado, mas n�o se esque�a de confirm�-lo');
define('_MD_SELSUPP', 'sua sele��o foi removida da lista');
define('_MD_ALLSEL', 'Sua escolha');
define('_MD_COMMENTAIRE',					'comment�rio');
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
