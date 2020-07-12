<?php

//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
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

// header de l'admin
include '../../../include/cp_header.php';

// si pas le language du site, anglais par défaut
if (file_exists("../language/".$xoopsConfig['language']."/main.php")) {
	include "../language/".$xoopsConfig['language']."/main.php";
} else {
	include "../language/english/main.php";
}

include_once (XOOPS_ROOT_PATH."/class/uploader.php");
include_once ("../class/ResManagerCat.class.php");
include_once ("../class/ResManagerCal.class.php");
include_once ("../class/ResManagerRes.class.php");
include_once ("../class/ResManagerInfores.class.php");
include_once ("../include/functions.php");

// initialisation des constantes
initConstante();

// globales
global $xoopsDB, $xoopsModule;

// En tete
xoops_cp_header();

// Mise en forme
$myts = & MyTextSanitizer :: getInstance();

$data_saisie = "";

// Recuperation des données 
if (isset ($_GET['typeres'])) {
	extract($_GET);
	$data_saisie = $_GET;
} else {
	extract($_POST);
	$data_saisie = $_POST;
}

// Classe catégorie
$res = new ResManagerRes($xoopsDB);
$cat = new ResManagerCat($xoopsDB);
$cal = new ResManagerCal($xoopsDB);
$infores = new ResManagerInfores($xoopsDB);

// cas ajout
if (isset ($add)) {

	// Ajout de la reservation
	$res->nom = $myts->oopsAddSlashes($nomres);
	$res->descr = $myts->oopsAddSlashes($descrres);
	$res->type = $typeres;
	$res->nbocc = $nboccres;
	$res->idcat = $idcatres;
	$res->status = 0;
	$res->valid = $validres;
	$res->occpers = $occpersres;
	$res->active = $active_res;

	if ($typeres == RES_CALENDRIER) {
		$cal->setOpensem($open_sem);
		$cal->min_res = $min_res;
		$cal->date_deb_f = $date_deb;
		$cal->date_fin_f = $date_fin;
		$cal->heure_deb_dim = $heure_deb_dim;
		$cal->heure_fin_dim = $heure_fin_dim;
		$cal->heure_deb_lun = $heure_deb_lun;
		$cal->heure_fin_lun = $heure_fin_lun;
		$cal->heure_deb_mar = $heure_deb_mar;
		$cal->heure_fin_mar = $heure_fin_mar;
		$cal->heure_deb_mer = $heure_deb_mer;
		$cal->heure_fin_mer = $heure_fin_mer;
		$cal->heure_deb_jeu = $heure_deb_jeu;
		$cal->heure_fin_jeu = $heure_fin_jeu;
		$cal->heure_deb_ven = $heure_deb_ven;
		$cal->heure_fin_ven = $heure_fin_ven;
		$cal->heure_deb_sam = $heure_deb_sam;
		$cal->heure_fin_sam = $heure_fin_sam;

	}

	// Contrôle de saisie
	$tab_error_res = $res->checkSaisie();
	if ($typeres == RES_CALENDRIER)
		$tab_error_cal = $cal->checkSaisie();
	else
		$tab_error_cal = null;

	$tab_error = array_merge($tab_error_res, $tab_error_cal);

	// Erreurs
	if (count($tab_error) > 0) {
		affTabError($tab_error);
		$date_deb = toTimestamp('-', $date_deb);
		$date_fin = toTimestamp('-', $date_fin);
	} else {
		if (!$res->addReserv()) {
			// Message erreur
			themecenterposts('<b>'._MD_MESS_DB.'</b>', _MD_ACCESBD_KO);
			echo '<br />';
		} else {

			// Insertion des données supplémentaires
			if ($infores->addAllInfo($data_saisie, $res->id)) {

				if ($typeres == RES_CALENDRIER) {

					// récupération du id_reserv
					$cal->id_reserv = $res->id;

					// ajout des paramètres calendriers
					if ($cal->addCal()) {
						// Insertion ok redirection sur cette page
						$notification_handler = & xoops_gethandler('notification');
						$notification_handler->subscribe('suivires', $res->id, 'new_userdem', $mode = null, $module_id = null, $xoopsUser->uid());
						$notification_handler->subscribe('suivires', $res->id, 'ann_userdem', $mode = null, $module_id = null, $xoopsUser->uid());
						// redirect_header("addres.php?typeres=".$typeres,3,_MD_ADDRESOK);
						redirect_header("index.php", 3, _MD_ADDRESOK);
					} else {
						// suppresion dans la table reserv et les données supplémentaires
						$res->suppReserv();
						$infores->delAllInfo($res->id);

						// Message erreur
						themecenterposts('<b>'._MD_MESS_DB.'</b>', _MD_ACCESBD_KO);
						echo '<br />';
					}
				} else {
					$notification_handler = & xoops_gethandler('notification');
					$notification_handler->subscribe('suivires', $res->id, 'new_userdem', $mode = null, $module_id = null, $xoopsUser->uid());
					$notification_handler->subscribe('suivires', $res->id, 'ann_userdem', $mode = null, $module_id = null, $xoopsUser->uid());
					redirect_header("index.php", 3, _MD_ADDRESOK);
				}
			} else {
				// suppresion dans la table reserv
				$res->suppReserv();

				// Message erreur
				themecenterposts('<b>'._MD_MESS_DB.'</b>', _MD_ACCESBD_KO);
				echo '<br />';
			}
		}
	}
} else {
	// Valeurs par défaut
	$occpersres = 1;
	$nboccres = 1;
	$validres = 1;
	$cal->open_sem = "0111110";
	$open_sem = $cal->getOpensem();
	$active_res = 1;
	$heure_deb_dim = 9;
	$heure_fin_dim = 17;
	$heure_deb_lun = 9;
	$heure_fin_lun = 17;
	$heure_deb_mar = 9;
	$heure_fin_mar = 17;
	$heure_deb_mer = 9;
	$heure_fin_mer = 17;
	$heure_deb_jeu = 9;
	$heure_fin_jeu = 17;
	$heure_deb_ven = 9;
	$heure_fin_ven = 17;
	$heure_deb_sam = 9;
	$heure_fin_sam = 17;
}

// Ecran de saisie de type
include '../include/addres.inc.php';

// Pied de page
xoops_cp_footer();

// debugSqlBloc();
?>

