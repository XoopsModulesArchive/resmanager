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

// DO bug 7 Afficher fermer si la réservation est fermée => v 0.2.1
// DO bug 6 affichage de l'image lock => V 0.2.1
include ("header.php");
include (XOOPS_ROOT_PATH."/header.php");

function lienHoraire($res, $cal_day, $cal_month, $cal_year, $heure, $appel, $op) {
	$chaine = "";
	$chaine = $chaine.XOOPS_URL."/modules/resmanager/make_demcal.php?";
	$chaine = $chaine."id_res=".$res;
	$chaine = $chaine."&cal_day=".$cal_day;
	$chaine = $chaine."&cal_month=".$cal_month;
	$chaine = $chaine."&cal_year=".$cal_year;
	$chaine = $chaine."&cal_heure=".$heure;
	$chaine = $chaine."&op=".$op;
	$chaine = $chaine."&appel_mkdem=".$appel;

	return $chaine;
}

function lienJour($res, $year, $month, $day, $appel, $aff) {
	$chaine = "";
	$chaine = $chaine."<a href=edit_day.php?";
	$chaine = $chaine."id_reserv=".$res;
	$chaine = $chaine."&cal_day=".$day;
	$chaine = $chaine."&cal_month=".$month;
	$chaine = $chaine."&cal_year=".$year;
	$chaine = $chaine."&appel=".magicUrl($appel);
	$chaine = $chaine.">".$aff."</a>";

	return $chaine;
}

// --

// récupération des données
extract($_GET, EXTR_SKIP);

// Date du jour
$date_jour = getdate();

// Mise en forme
$myts = & MyTextSanitizer :: getInstance();

// Vérifie si date saisie
// sinon date courante
if (!isset ($cal_month) && !isset ($cal_day) && !isset ($cal_year)) {
	$cal_year = $date_jour['year'];
	$cal_day = $date_jour['mday'];
	$cal_month = $date_jour['mon'];
}
// --

// contrôles format date
if (!checkDate($cal_month, $cal_day, $cal_year))
	redirect_header($appel, 3, _MD_FORMAT_DATE_KO);
// --

// Classe Specal => fermeture spécifiques d'une réservation
$specal = new ResManagerSpecal($xoopsDB);
$specal->year = $cal_year;
$specal->month = $cal_month;
$specal->day = $cal_day;

$tab_time = $specal->getTabTime($heure_deb, $heure_fin, $id_cat);
// --

// Liste des utilisateurs ayant fait une demande
$demcal = new ResManagerDemcal($xoopsDB);
$demcal->year = $cal_year;
$demcal->month = $cal_month;
$demcal->day = $cal_day;
$tab_dem = $demcal->getTabDemTimeAllRes(); // Liste des demandes
$tab_dem_res = array (); // Liste user ayant fait une demande
$liste = "";

// Mise en forme d'un tableau indexé sur réservation et heure
$rup_res = null;
$rup_heure = null;

if ($tab_dem) {

	for ($i = 0; $i < count($tab_dem); $i ++) {
		if (($rup_res != $tab_dem[$i]['id_reserv_dem'] and $rup_res != null) or ($rup_heure != $tab_dem[$i]['time_demcal'] and $rup_heure != null)) {
			$tab_dem_res[$rup_res][$rup_heure] = $liste;
			$liste = "";
		}

		$rup_res = $tab_dem[$i]['id_reserv_dem'];
		$rup_heure = $tab_dem[$i]['time_demcal'];

		if ($typeaff == "popup") {
			$user = new XoopsUser();
			$liste .= "<tr class=even ><td>".$user->getUnameFromId($tab_dem[$i]['id_user_dem'])."</td>"."<td>".$tab_dem[$i]['id_dem']."</td>"."<td>".$myts->oopsHtmlSpecialChars($tab_dem[$i]['comm_dem'])."</td></tr>";
		} else
			if ($typeaff == "comment") {
				if (empty ($liste))
					$liste .= "<font size=1>".$myts->oopsHtmlSpecialChars(substr($tab_dem[$i]['comm_dem'], 0, 30))."</font>";
			} else
				if ($typeaff == "user") {
					if (empty ($liste))
						$liste .= xoops_getLinkedUnameFromId($tab_dem[$i]['id_user_dem']);

				}
	}

	$tab_dem_res[$rup_res][$rup_heure] = $liste;
}
// --    

$appel = "edit_day_cat.php?"."minical_month=".$minical_month."&minical_year=".$minical_year."&heure_deb=".$heure_deb."&heure_fin=".$heure_fin."&id_cat=".$id_cat."&cal_day=".$cal_day."&cal_month=".$cal_month."&cal_year=".$cal_year."&typeaff=".$typeaff;

echo "<div align=center>".affDate($cal_year, $cal_month, $cal_day)."</div>";

// Affichage d'une sélection des catégories
//echo "<div align=center><h4>".$cat['nom_cat']."</h4></div>";
$allcat = new ResManagerCat($xoopsDB);
// liste des catégories
$lst_cat = "<div align=center><select name=categorie value=".$heure_deb." onchange=\"location='";
$lst_cat .= XOOPS_URL."/modules/resmanager/edit_day_cat.php?minical_month=".$cal_month;
$lst_cat .= "&minical_year=".$cal_year;
$lst_cat .= "&heure_deb=".$heure_deb;
$lst_cat .= "&cal_day=".$cal_day;
$lst_cat .= "&cal_month=".$cal_month;
$lst_cat .= "&cal_year=".$cal_year;
$lst_cat .= "&typeaff=".$typeaff;
$lst_cat .= "&heure_fin=".$heure_fin;
$lst_cat .= "&id_cat='+this.options[this.selectedIndex].value \" >";
$tab_cat = $allcat->getAllCat();

foreach ($tab_cat as $key => $acat) {

	if (checkRightCat($key)) {

		if ($key == $id_cat)
			$lst_cat .= "<option selected value=".$key." > ".$acat." </option>";
		else
			$lst_cat .= "<option value=".$key." > ".$acat." </option>";
	}
}

$lst_cat .= "</select></div>";
echo $lst_cat;
// -- 

if (!empty ($tab_time)) {
	foreach ($tab_time as $cat) {

		// Affichage de la session
		echo "<div>";
		/*affSelection(lienHoraire("", $cal_day, $cal_month, $cal_year,"", magicUrl($appel), "suppsel"),
				 lienHoraire("", $cal_day, $cal_month, $cal_year,"", magicUrl($appel), "demande"));
		    Gestion de la notification modification de la fonction affselection
		    */
		affSelection(lienHoraire("", $cal_day, $cal_month, $cal_year, "", magicUrl($appel), "suppsel"), "", // id res vide
		array ("day" => $cal_day, "month" => $cal_month, "year" => $cal_year), magicUrl($appel), "edit_day_cat");
		echo "</div>";

		echo '<table width="100%" cellspacing="1" class="outer">';

		// Liste heure début
		$lst_heure = _MD_HEURE_DEB." : <select name=heure_deb value=".$heure_deb." onchange=\"location='";
		$lst_heure .= XOOPS_URL."/modules/resmanager/edit_day_cat.php?minical_month=".$minical_month;
		$lst_heure .= "&minical_year=".$minical_year;
		$lst_heure .= "&heure_fin=".$heure_fin;
		$lst_heure .= "&id_cat=".$id_cat;
		$lst_heure .= "&cal_day=".$cal_day;
		$lst_heure .= "&cal_month=".$cal_month;
		$lst_heure .= "&cal_year=".$cal_year;
		$lst_heure .= "&typeaff=".$typeaff;
		$lst_heure .= "&heure_deb='+this.options[this.selectedIndex].value \">";
		foreach ($tab_heure as $heure) {
			if ($heure == $heure_deb)
				$lst_heure .= "<option selected value=".$heure." > ".$heure." </option>";
			else
				$lst_heure .= "<option value=".$heure." > ".$heure." </option>";
		}
		$lst_heure .= "</select>";
		echo $lst_heure;
		// --

		// Liste heure fin
		$lst_heure = _MD_HEURE_FIN." : <select name=heure_deb value=".$heure_deb." onchange=\"location='";
		$lst_heure .= XOOPS_URL."/modules/resmanager/edit_day_cat.php?minical_month=".$minical_month;
		$lst_heure .= "&minical_year=".$minical_year;
		$lst_heure .= "&heure_deb=".$heure_deb;
		$lst_heure .= "&id_cat=".$id_cat;
		$lst_heure .= "&cal_day=".$cal_day;
		$lst_heure .= "&cal_month=".$cal_month;
		$lst_heure .= "&cal_year=".$cal_year;
		$lst_heure .= "&typeaff=".$typeaff;
		$lst_heure .= "&heure_fin='+this.options[this.selectedIndex].value \">";
		foreach ($tab_heure as $heure)
			if ($heure == $heure_fin)
				$lst_heure .= "<option selected value=".$heure." > ".$heure." </option>";
			else
				$lst_heure .= "<option value=".$heure." > ".$heure." </option>";
		$lst_heure .= "</select>";
		echo $lst_heure;
		// -- 

		$first = true;
		$i = 0;

		foreach ($cat['time'] as $key => $time) {
			if ($first) {
				// Nom réservation
				$first = false;
				echo "<tr class=even><td></td>";
				foreach ($time['res'] as $keyres => $res) {
					// $retour = "../../index.php";
					// $retour = $_SERVER['PHP_SELF'];
					$lien = XOOPS_URL."/modules/resmanager/edit_day.php?id_reserv=".$keyres."&appel=".magicUrl($appel)."&cal_year=".$cal_year."&cal_month=".$cal_month."&cal_day=".$cal_day;
					echo "<td align=center><a href=".$lien.">".$res['nom_res']."</a></td>";
				}
				echo "</tr>";
				$i ++;
			}

			echo "<tr class=". (($i % 2) == 0 ? 'even' : 'odd').">";
			echo "<td><b>".$key." "._MD_HEURE."</b></td>";

			foreach ($time['res'] as $keyres => $res) {

				$lien = lienHoraire($keyres, $cal_day, $cal_month, $cal_year, $key, magicUrl($appel), "selection");
				echo "<td align =center valign=top height=40>". ($res['status'] == 0 ? affImage("full.png") : lienImage("ok_bouton.gif", $lien));
				//echo "<br /><i>".(isset($tab_dem_res[$keyres][$key])?"<br />".$tab_dem_res[$keyres][$key]:"")."</i></td>";
				if (!empty ($tab_dem_res[$keyres][$key]) and is_object($xoopsUser) and $typeaff == "popup")
					echo "<br /><a href='#' onclick='javascript:openWithSelfMain(\"".XOOPS_URL."/modules/resmanager/aff_fen_lstdem.php?message=".$tab_dem_res[$keyres][$key]."\",\"\",400,200);'>"._MD_SEE."</a></td>";
				else
					if (!empty ($tab_dem_res[$keyres][$key]) and ($typeaff == "comment" or $typeaff == "user") and is_object($xoopsUser))
						echo "<br />".$tab_dem_res[$keyres][$key]."</td>";
			}

			echo "</tr>";
			$i ++;
		}

		echo " </table>";
	}
}

$lien_edit_day_cat = XOOPS_URL."/modules/resmanager/edit_day_cat.php";
$extra = "&id_cat=".$id_cat."&heure_deb=".$heure_deb."&heure_fin=".$heure_fin."&minical_year=".$minical_year."&minical_month=".$minical_month."&typeaff=".$typeaff;

$minical_year_prev = $minical_month <= 3 ? $minical_year -1 : $minical_year;
$minical_month_prev = $minical_month <= 3 ? 9 + $minical_month : $minical_month -3;

$minical_year_next = $minical_month > 9 ? $minical_year +1 : $minical_year;
$minical_month_next = $minical_month > 9 ? $minical_month -9 : $minical_month +3;

$lien_prev = $lien_edit_day_cat."?"."minical_month=".$minical_month_prev."&minical_year=".$minical_year_prev."&heure_deb=".$heure_deb."&heure_fin=".$heure_fin."&id_cat=".$id_cat."&cal_day=".$cal_day."&cal_month=".$cal_month."&cal_year=".$cal_year."&typeaff=".$typeaff;

$lien_next = $lien_edit_day_cat."?"."minical_month=".$minical_month_next."&minical_year=".$minical_year_next."&heure_deb=".$heure_deb."&heure_fin=".$heure_fin."&id_cat=".$id_cat."&cal_day=".$cal_day."&cal_month=".$cal_month."&cal_year=".$cal_year."&typeaff=".$typeaff;
;

echo "<table width=100% >";
echo "<tr>";

echo "<td>";
echo creMinical($minical_year, $minical_month, $lien_edit_day_cat, $extra, $lien_prev, null);
echo "</td>";
echo "<td align=center>";
echo creMinical($minical_month == 12 ? $minical_year +1 : $minical_year, $minical_month == 12 ? 1 : $minical_month +1, $lien_edit_day_cat, $extra, null, null);
echo "</td>";
echo "<td align=right>";
echo creMinical($minical_month >= 11 ? $minical_year +1 : $minical_year, $minical_month >= 11 ? $minical_month -10 : $minical_month +2, $lien_edit_day_cat, $extra, null, $lien_next);

echo "</td>";

echo "</table>";

// Pied de page
include (XOOPS_ROOT_PATH."/footer.php");

//debugSqlBloc();
?>

