<?

//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

include ("header.php");
include (XOOPS_ROOT_PATH."/header.php");

// Recuperation des données 
if (isset ($_GET['op']))
	extract($_GET, EXTR_SKIP);
else
	extract($_POST, EXTR_SKIP);

// Mise en forme
$myts = & MyTextSanitizer :: getInstance();

switch ($op) {

	// liste des catégories
	case 'lstcat' :

		// Titre
		echo '<b>'._MD_TITLE_MAKERESERV1.'</b><br /><br />';

		$nom_table1 = $xoopsDB->prefix('resman_categorie');
		$nom_table2 = $xoopsDB->prefix('resman_reservation');

		$sql = 'select 		id_cat,
			  								nom_cat,
				  							descr_cat,
		                                                                        img_cat,
					  						count(*) nb
						  					from '.$nom_table1.' , '.$nom_table2.' where id_cat = idcat_reserv'.' and active_reserv = 1 '.'group by id_cat, nom_cat, descr_cat';
		// Requete
		$result = $xoopsDB->queryF($sql);

		while ($row = $xoopsDB->fetchArray($result)) {

			if (checkRightCat($row['id_cat']) == true) {

				echo ' - <a href=make_dem.php?op=lstreserv&idcat='.$row['id_cat'].'>'.$row['nom_cat'].'</a> ( <a href=make_dem.php?op=lstreserv&idcat='.$row['id_cat'].'>'.$row['nb'].'</a> ) : <br />';
				echo '<i> '.$myts->previewTarea($row['descr_cat']).'</i>';
				// Affichage d'une image
				if (!empty ($row['img_cat']))
					echo '<img src=images/'.$row['img_cat'].' />';
				echo '<br /><br />';

				// Affichage des reservations asscociés

				if ($xoopsModuleConfig['detailcat'] == 1) {
					$nom_tableres = $xoopsDB->prefix('resman_reservation');

					// Requete
					$sqlres = 'select 		id_reserv, 
					                                  nom_reserv, 
					                                  type_reserv,
					                                  descr_reserv,
					                                  nbocc_reserv
					                                  from '.$nom_tableres.' where idcat_reserv = '.$row['id_cat'].' and active_reserv = 1 '.' order by type_reserv, id_reserv desc';

					// Execution
					$resultres = $xoopsDB->queryF($sqlres);

					// Mise en forme tableau
					echo '<table width="100%" cellspacing="1" class="outer">';
					echo '<tr>';
					echo '<th>'._MD_TITLE_TABRESERV1.'</th>';
					echo '<th>'._MD_TITLE_TABRESERV2.'</th>';
					echo '<th>'._MD_TOTAL_RES.'</th>';
					echo '<th>'._MD_DEM_VAL.'</th>';
					echo '<th>'._MD_RES_DISPO.'</th>';
					echo '<th>'._MD_TITLE_TABRESERV3.'</th>';
					echo '</tr>';

					$i = 0;

					while ($rowres = $xoopsDB->fetchArray($resultres)) {
						// différencier lignes paires impaires
						echo '<tr class='. (($i % 2) == 0 ? 'odd' : 'even').'>';

						// Compter le nombre de demande validées
						$dem = new ResManagerDem($xoopsDB);
						$dem->id_reserv = $rowres['id_reserv'];
						$nb_valid = $dem->countValDem();

						// les colonnes
						echo '<td><u>'.$rowres['nom_reserv'].'</u>';
						echo '<td>'.$tab_type_res[$rowres['type_reserv']].'</td>';

						if ($rowres['type_reserv'] == RES_UNIQUE) {
							echo '<td>'.$rowres['nbocc_reserv'].'</td>';
							echo '<td>'.$nb_valid.'</td>';
							echo '<td>'. ($rowres['nbocc_reserv'] - $nb_valid).'</td>';
							echo '<td>'.'<a href=make_dem.php?op=detail&idcat='.$row['id_cat'].'&idres='.$rowres['id_reserv'].'>'._MD_OPERESERV.'</a></td>';

						} else
							if ($rowres['type_reserv'] == RES_CALENDRIER) {
								echo '<td colspan=3></td>';
								// lien action
								$retour = 'make_dem.php?op=lstcat';
								$lien_cal = lienImage("calendrier.jpg", "edit_day.php?id_reserv=".$rowres['id_reserv']."&appel=".magicUrl($retour));
								echo '<td>'.$lien_cal.'</td>';
							}

						echo '</tr>';

						// ligne suivante
						$i ++;

					}

					echo '</table><br /><br />';

				}
			}

		}

		break;

		// liste des réservations
	case 'lstreserv' :

		if (checkRightCat($idcat) == true) {
			$nom_table1 = $xoopsDB->prefix('resman_reservation');

			// Requete
			$sql = 'select 		id_reserv, 
			                                nom_reserv, 
			                                type_reserv,
			                                descr_reserv,
			                                nbocc_reserv
			                                from '.$nom_table1.' where idcat_reserv = '.$idcat.' and active_reserv = 1 '.' order by type_reserv, id_reserv desc';

			// Execution
			$result = $xoopsDB->queryF($sql);

			// Lecture catégorie
			$cat = new ResManagerCat($xoopsDB, $xoopsLogger);
			$cat->id = $idcat;
			$cat->getCat();

			// Titre
			echo '<b>'._MD_TITLE_MAKERESERV2.' : '.$cat->nom.'</b><br /><br />';

			//revenir à la liste précédente
			echo '<a href=make_dem.php?op=lstcat>'._MD_BACK_LSTCAT.'</a><br /><br />';

			// Mise en forme tableau
			echo '<table width="100%" cellspacing="1" class="outer">';
			echo '<tr>';
			echo '<th>'._MD_TITLE_TABRESERV1.'</th>';
			echo '<th>'._MD_TITLE_TABRESERV2.'</th>';
			echo '<th>'._MD_TOTAL_RES.'</th>';
			echo '<th>'._MD_DEM_VAL.'</th>';
			echo '<th>'._MD_RES_DISPO.'</th>';
			echo '<th>'._MD_TITLE_TABRESERV3.'</th>';
			echo '</tr>';

			$i = 0;

			while ($row = $xoopsDB->fetchArray($result)) {
				// différencier lignes paires impaires
				echo '<tr class='. (($i % 2) == 0 ? 'odd' : 'even').'>';

				// Compter le nombre de demande validées
				$dem = new ResManagerDem($xoopsDB);
				$dem->id_reserv = $row['id_reserv'];
				$nb_valid = $dem->countValDem();

				// les colonnes
				echo '<td><u>'.$row['nom_reserv'].' :</u><br /><i>'.$myts->previewTarea($row['descr_reserv']).'</i></td>';
				echo '<td>'.$tab_type_res[$row['type_reserv']].'</td>';

				if ($row['type_reserv'] == RES_UNIQUE) {
					echo '<td>'.$row['nbocc_reserv'].'</td>';
					echo '<td>'.$nb_valid.'</td>';
					echo '<td>'. ($row['nbocc_reserv'] - $nb_valid).'</td>';
					echo '<td>'.'<a href=make_dem.php?op=detail&idcat='.$idcat.'&idres='.$row['id_reserv'].'>'._MD_OPERESERV.'</a></td>';
				} else
					if ($row['type_reserv'] == RES_CALENDRIER) {
						echo '<td colspan=3></td>';
						// ien action
						$retour = 'make_dem.php?op=lstreserv&idcat='.$idcat;
						$lien_cal = lienImage("calendrier.jpg", "edit_day.php?id_reserv=".$row['id_reserv']."&appel=".magicUrl($retour));
						echo '<td>'.$lien_cal.'</td>';
					}

				echo '</tr>';

				// ligne suivante
				$i ++;

			}

			echo '</table>';

			break;
		} else {
			redirect_header("make_dem.php?op=lstcat", 3, _MD_DENIED_CAT);
		}

		// Edition d'une réservation
	case 'detail' :

		if (checkRightRes($idres) == true) {

			// Titre
			echo '<b>'._MD_TITLE_MAKERESERV3.'</b><br /><br />';

			// Lecture de réservation
			$res = new ResManagerRes($xoopsDB);
			$res->id = $idres;
			$res->getReserv();

			// Mise en forme de la description
			$res->descr = $myts->makeTareaData4Preview($res->descr);

			// Lecture catégorie
			$cat = new ResManagerCat($xoopsDB, $xoopsLogger);
			$cat->id = $idcat;
			$cat->getCat();

			// Lecture info supplémentaire
			$infores = new ResManagerInfores($xoopsDB);

			//revenir à la liste précédente
			echo '<a href=make_dem.php?op=lstreserv&idcat='.$idcat.'>'.'<< '.$cat->nom.'</a><br /><br />';

			include 'include/make_dem.inc.php';
		} else {
			redirect_header("make_dem.php?op=lstcat", 3, _MD_DENIED_CAT);
		}

		break;

		// demande de réservation
	case 'demande' :

		if (checkRightRes($idres) == true) {
			// Titre
			echo '<b>'._MD_TITLE_MAKERESERV3.'</b><br /><br />';

			// Création de la demande
			$dem = new ResManagerDem($xoopsDB);
			$dem->id_reserv = $idres;
			$dem->id_user = $xoopsUser->uid();
			$dem->comm = $myts->oopsAddSlashes($com_dem);

			// Lecture de réservation
			$res = new ResManagerRes($xoopsDB);
			$res->id = $idres;
			$res->getReserv();

			// contrôles préliminaire
			// réservation non activée
			if ($res->active == 1) {
				// plus de dispo
				if ($dem->countValDem() >= $res->nbocc)
					$mess = _MD_RESERVFULL;
				// deja reservé
				else {
					if ($dem->countUserDem() >= $res->occpers)
						$mess = _MD_RESERVFULLUSER;
					else {
						// Nécessite une validation
						if ($res->valid == 1)
							$result = $dem->addDem();
						else
							$result = $dem->addDemVal();

						// Préparation message
						if ($result) {
							$mess = _MD_RESERVOK."<br />"._MD_RESERNUMANDINFO."<b>".$dem->id.'</b>';

							// Inscription à la notification pour cette demande
							$notification_handler = & xoops_gethandler('notification');
							$notification_handler->subscribe('suividem', $dem->id, 'new_dem', $mode = null, $module_id = null, $dem->id_user);
							$notification_handler->subscribe('suividem', $dem->id, 'val_dem', $mode = null, $module_id = null, $dem->id_user);
							$notification_handler->subscribe('suividem', $dem->id, 'ref_dem', $mode = null, $module_id = null, $dem->id_user);
							$notification_handler->subscribe('suividem', $dem->id, 'ann_dem', $mode = null, $module_id = null, $dem->id_user);

							// Notification Nouvelle demande pour le demandeur
							$notification_handler->triggerEvent('suividem', $dem->id, 'new_dem', $extra_tags = array ('X_LIEN_DEM' => $dem->getLienDem(), 'X_IDDEM' => $dem->id), $user_list = array ($dem->id_user), $module_id = null, 0);
							// Le dernier paramètre permet d'envoyer la notification au user lui même

							// Notification Nouvelle demande pour administrateur qui a créé la réservation
							$extra_tags = array ("X_USERDEM" => getUserInfoFromUid($dem->id_user, 'uname'), "X_IDDEM" => $dem->id, "X_LIENDEM" => $dem->getLienDem());
							$notification_handler->triggerEvent('suivires', $dem->id_reserv, 'new_userdem', $extra_tags, $user_list = array (), $module_id = null, 0);

						} else
							$mess = _MD_RESERVKO;
					}
				}
			} else {
				$mess = _MD_RESERV_NOTACTIVE;
			}

		} else {
			redirect_header("make_dem.php?op=lstcat", 3, _MD_DENIED_CAT);
		}

		// Afichage résultat
		// Lien pour revenir
		echo '<a href=make_dem.php?op=detail&idcat='.$idcat.'&idres='.$res->id.'> << '.$res->nom.'</a><br /><br />';
		themecenterposts('<b>'._MD_RESERV_RESULTAT.'</b>', $mess);
		echo '<br />';

		break;
}

include (XOOPS_ROOT_PATH."/footer.php");
?>

