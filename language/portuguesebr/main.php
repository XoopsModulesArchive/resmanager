<?php
//Translated to brazilian portuguese by Wilson > www.xoopstotal.com.br//
// variable pour partie admin du module
// -- menu
define('_MD_TITLE','Administração');
define('_MD_MENU1','Gestion des droits');
define('_MD_MENU2', 'Ajouter une catégorie');
define('_MD_MENU3', 'Mettre à jour une  catégorie');
define('_MD_MENU4', 'Paramétrer une réservation');
define('_MD_MENU5', 'Mettre à jour le paramétrage d\'une  réservation');
define('_MD_MENU6', 'Mettre à jour plusieurs réservations');

define('_MD_RESMANAGER_SUBMENU1', 'Categorias');
define('_MD_RESMANAGER_SUBMENU2', 'Lista das requisições');
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
define('_MD_ACTION',		 						'Ação');

// -- liste de valeur
define('_MD_OK',			 						'SIM');
define('_MD_KO',		 							'NÃO');

define('_MD_TYPERES_UNIQUE',							'Especial');
define('_MD_TYPERES_EVENEMENT',						'Evento');
define('_MD_TYPERES_CALENDRIER',						'Calendário');

define('_MD_ETATDEM_A_VALIDER',						'Aguardando validação');
define('_MD_ETATDEM_VALIDE',						'Validado');
define('_MD_ETATDEM_REFUSEE',						'Negado');

// -- calendrier
define('_MD_DIMANCHE_C',							'Dom');
define('_MD_LUNDI_C',								'Seg');
define('_MD_MARDI_C',								'Ter');
define('_MD_MERCREDI_C',							'Qua');
define('_MD_JEUDI_C',								'Quin');
define('_MD_VENDREDI_C',							'Sex');
define('_MD_SAMEDI_C',								'Sáb');

define('_MD_DIMANCHE',								'Domingo');
define('_MD_LUNDI',								'Segunda');
define('_MD_MARDI',								'Terça');
define('_MD_MERCREDI',								'Quarta');
define('_MD_JEUDI',								'Quinta');
define('_MD_VENDREDI',								'Sexta');
define('_MD_SAMEDI',								'Sábado');

define('_MD_JANVIER',								'Janeiro');
define('_MD_FEVRIER',								'Fevereiro');
define('_MD_MARS',									'Março');
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

define('_MD_MOIS_SUIV',								'Mês>>');
define('_MD_MOIS_PREC',	  							'<< Mês');

define('_MD_ANNEE_SUIV',							'Ano >>>');
define('_MD_ANNEE_PREC',	  						'<<< Ano');

// -- minimum réservation
define('_MD_MIN_HEURE',								'Hora');


// -- message erreur communs
define('_MD_ACCES_DENIED',							'Você não está autorizado a ver esta página'); 
define('_MD_VALID_DENIED',							'Você não está autorizado a validar requisições'); 
define('_MD_REFUS_DENIED',        						'Você não está autorizado a recusar requisições');
define('_MD_DEMDENIED',								'Esta requisição não é sua. Acesso negado');
define('_MD_ACCESBD_KO',							'Erro de conexão com o banco de dados. Por favor, contate o webmaster.');
define('_MD_ERREUR_SAISIE',							'Erro(s) de processamento');
define('_MD_MESS_DB',								'Mensagem do banco de dados');

define('_MD_FORMAT_DATE_KO',							'Data errada');
define('_MD_FORMAT_NUMBER_KO',						'Número errado');
define('_MD_NB_NOTZERO',							'O número deve ser maior que zero');

// Administration
// Formulaire ajout catégorie
define('_MD_TADDCAT', 								'Categoria de Reserva');
define('_MD_NOMCAT', 								'Nome da categoria');
define('_MD_DESCRCAT', 								'Descrição da categoria');
define('_MD_ADDCAT', 								'Incluir categoria');
define('_MD_ADDOK', 								'Categoria incluída');

// -- Formulaire edition, supp, maj catégorie
define('_MD_TMAJCAT', 								'Categoria de Reserva');
define('_MD_ENRCAT', 								'Enviar');
define('_MD_SUPPCAT', 								'Deletar');
define('_MD_EDITCAT', 								'Abrir');
define('_MD_ENROK', 								'Categoria atualizada');
define('_MD_SUPPOK', 								'Categoria deletada');
define('_MD_SUPPCATKO', 							'Você não pode deletar esta categoria. Existem reservas associadas a ela.');


// -- Formulaire ajout reservation
define('_MD_TADDRES', 							'Reservas');
define('_MD_NOMRES', 							'Nome da reserva');
define('_MD_DESCRRES', 							'Descrição');
define('_MD_OPENRES', 							'Data inicial do calendário');
define('_MD_CLOSERES', 							'Data final do calendário');
define('_MD_TYPERES', 							'Tipo');
define('_MD_CATRES', 							'Categoria');
define('_MD_VALIDRES', 							'Validação requerida');
define('_MD_NBOCCRES', 							'Total de requisições');
define('_MD_OCCPERSRES', 						'Requerida(s) pelos membros');
define('_MD_ADDRES', 							'Incluir reserva');
define('_MD_ADDRESOK',							'Reserva incluída');
define('_MD_TYPERES_QUESTION',					'Qual tipo de reserva você gostaria de criar?');
define('_MD_OPEN_SEM',							'Dias disponíveis');
define('_MD_MIN_RES',							'Tempo mínimo');
define('_MD_HEURE_DEB',							'Horário inicial-');
define('_MD_HEURE_FIN',							'Horário final');
define('_MD_HEURE_FIN_ERROR',     					'Horário final deve ser maior que o horário inicial');
define('_MD_ACTIVERES', 						'Ativar a reserva');

// Formulaire maj réservation
define('_MD_TMAJRES', 							'Editar reserva');
define('_MD_MAJRESOK',							'Reseva atualizada');
define('_MD_SUPPRESOK',							'Reserva apagada');
define('_MD_SUPPRESKO',							'Você não pode deletar esta reserva. Existem requisições associadas a ela.');
define('_MD_LST_ALLDEM',						'Requisições dos membros');
define('_MD_OPEN_SUP_CLOSE',						'A data final do calendário deve ser maior que a inicial');
define('_MD_OCC_SUP_NB',						'Número total deve ser maior que as requisições dos membros');

define('_MD_NBDEMVAL', 							'Número de requisições validadas');
define('_MD_DEMTOVAL',							'Número de requisições à serem validadas');



// Module
// -- Ecran demande de reservation
define('_MD_TITLE_MAKERESERV1',					'Escolha de categoria');
define('_MD_TITLE_MAKERESERV2',					'Listagem das reservas na categoria');
define('_MD_TITLE_MAKERESERV3',					'Reserva');
define('_MD_TITLE_TABRESERV1',					'Nome da reserva');
define('_MD_TITLE_TABRESERV2',					'Tipo');
define('_MD_TITLE_TABRESERV3',					'Ação');
define('_MD_BACK_LSTCAT',						'<< Lista das categorias');
define('_MD_OPERESERV',							'Agendar');
define('_MD_RESERV_RESULTAT',						'Resultado do agendamento');
define('_MD_RESERVOK',							'Sua reserva foi efetuada.');
define('_MD_RESERNUMANDINFO',				'Caso a validação seja necessária, você receberá uma confirmação. <br />O número da sua requisição é o seguinte: ');
define('_MD_RESERVKO',							'Aconteceu um erro durante o processo de reserva');
define('_MD_RESERVFULL',						'Não há disponibilidade para esta reserva');
define('_MD_RESERVFULLUSER',						'Você já realizou o maior número de reservas permitidas para um único membro');
define('_MD_FREERES',							'Disponibilidade');
define('_MD_RESERV_NOTACTIVE',					'Agendamento não disponível');

// -- Ecran liste des demandes de reservation
define('_MD_TITLE_LSTDEM',						'Sua lista de requisições');
define('_MD_TITLE_TABDEM1',						'N°');
define('_MD_TITLE_TABDEM2',						'Data');
define('_MD_TITLE_TABDEM3',						'Categoria');
define('_MD_TITLE_TABDEM4',						'Agendamento');
define('_MD_TITLE_TABDEM5',						'Nome');
define('_MD_TITLE_TABDEM6',						'Status');
define('_MD_TITLE_TABDEM7',						'Ação');

// -- Editer une demande
define('_MD_TITLE_TITLE_NODEM',					'Requisição N° : ');
define('_MD_DATE_DEM',							'Data da Requisição');
define('_MD_DATE_VAL',							'Data da Validação');
define('_MD_NOM_MEMBRE',						'Nome do membro');
define('_MD_STATUS_DEM',						'Status da requisição');
define('_MD_MESS_REFUS',						'Mensagem');
define('_MD_MESSAGE_EDITDEM',						'Resultado da ação');
define('_MD_VALDEM_OK',							'Requisição validada');
define('_MD_REFUS_OK',							'Requisição foi recusada');
define('_MD_REFUS_MESS_KO',						'Digite uma mensagem para recusar esta requisição');
define('_MD_ANNULATION_OK',						'Sua requisição foi cancelada');
define('_MD_DEM_ALREADY_VALID',					'Esta requisição já foi validada');
define('_MD_DEM_ALREADY_REFUSEE',					'Esta requisição já foi recusada');

// -- Editer une journée
define('_MD_DAY_CLOSE',							'Este dia não está disponível');
define('_MD_HEURE_JOURNEE',						'Hora');
define('_MD_HEURE_RES',							'Booking');
define('_MD_TITLE_EDIT_DAY',						'Calendário das reservas: ');
define('_MD_FERMER_CAL', 						'Fechar Calendário');
define('_MD_JOUR_INDISPO', 						'Este dia não está disponível para reserva');
define('_MD_MOIS_INDISPO', 						'Este mês não está disponível para reserva');
define('_MD_HEURE_INDISPO', 					'Este horário não está disponível para reserva');

// -- demande liée à un calendrier (make_demcal.php)
define('_MD_TITLE_MAKEDEMCAL',					'Agendar');
define('_MD_NBOCCRES_TRANCHE',					'Total de reservas até o presente momento');
define('_MD_DATEHEURE_RESERV', 					'Data e hora do agendamento');

// -- Spécificités du calendrier
define('_MD_RES_INCONNU',						'Reserva desconhecida');
define('_MD_SPEC_EXISTE',						'Você já havia reservado este período');
define('_MD_SPEC_OK',							'Este período encontra-se fechado atualmente');
define('_MD_OPERATION_INCONNUE', 					'Operação desconhecida');
define('_MD_SPEC_NOT_EXISTE', 					'Este período não está fechado');
define('_MD_SPEC_DEL_OK', 						'Este período está disponível agora');

// --
define('_MD_SELOK', 'Seu horário foi selecionado, mas não se esqueça de confirmá-lo');
define('_MD_SELSUPP', 'sua seleção foi removida da lista');
define('_MD_ALLSEL', 'Sua escolha');
define('_MD_COMMENTAIRE',					'commentário');
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
