<?php


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

if (!defined("RESMANAGER_INCLUDED_FUNCTION")) {
	define("RESMANAGER_INCLUDED_FUNCTION", 1);

	// vérifie si administrateur
	// pour le moment vérifie si administrateur du site 
	// par la suite vérifie si administrateur du module
	function checkAdmin($user, $mod) {
		if (!empty ($user) and is_object($mod)) {
			if ($user->isAdmin($mod->getVar('mid')))
				return true;
		}

		return false;
	}

	// securiser la page
	function securePage($user, $module) {

		if (!checkAdmin($user, $module))
			redirect_header("index.php", 5, _MD_ACCES_DENIED);

	}

	// Define pour des valeurs
	function initDefine() {
		// status d'une demande
		define("DEMANDE_A_VALIDER", 0);
		define("DEMANDE_VALIDE", 1);
		define("DEMANDE_REFUSEE", 2);
		define("DEMANDE_ANNULEE", 2);

		// type de reservation
		define("RES_UNIQUE", 0);
		define("RES_CALENDRIER", 1);


		// Minimum réservation
		define("MIN_HEURE", 0);
		define("MIN_MOIS", 1);

	}

	// initialisation de constantes
	function initConstante() {

		if (!defined('DEMANDE_A_VALIDER'))
			initDefine();

		// NE PAS TRADUIRE/DONT TRANSLATE
		global $tab_suff_jour;
		$tab_suff_jour = array ();
		$tab_suff_jour[0] = 'dim';
		$tab_suff_jour[1] = 'lun';
		$tab_suff_jour[2] = 'mar';
		$tab_suff_jour[3] = 'mer';
		$tab_suff_jour[4] = 'jeu';
		$tab_suff_jour[5] = 'ven';
		$tab_suff_jour[6] = 'sam';
		// ------------------------------

		global $tab_etat_dem;
		$tab_etat_dem[DEMANDE_A_VALIDER] = _MD_ETATDEM_A_VALIDER;
		$tab_etat_dem[DEMANDE_VALIDE] = _MD_ETATDEM_VALIDE;
		$tab_etat_dem[DEMANDE_REFUSEE] = _MD_ETATDEM_REFUSEE;
		$tab_etat_dem[DEMANDE_ANNULEE] = _MD_ETATDEM_ANNULEE;

		global $tab_etat_dem_img;
		$tab_etat_dem_img[DEMANDE_A_VALIDER] = "tovalidate.gif";
		$tab_etat_dem_img[DEMANDE_VALIDE] = "ok.gif";
		$tab_etat_dem_img[DEMANDE_REFUSEE] = "ko.gif";
		$tab_etat_dem_img[DEMANDE_ANNULEE] = "cancel.gif";

		global $tab_type_res;
		$tab_type_res[RES_UNIQUE] = _MD_TYPERES_UNIQUE;
		$tab_type_res[RES_CALENDRIER] = _MD_TYPERES_CALENDRIER;

		

		// tableau des jours de la semaine
		global $tab_jour_short;
		$tab_jour_short[0] = _MD_DIMANCHE_C;
		$tab_jour_short[1] = _MD_LUNDI_C;
		$tab_jour_short[2] = _MD_MARDI_C;
		$tab_jour_short[3] = _MD_MERCREDI_C;
		$tab_jour_short[4] = _MD_JEUDI_C;
		$tab_jour_short[5] = _MD_VENDREDI_C;
		$tab_jour_short[6] = _MD_SAMEDI_C;

		// tableau des jours de la semaine
		global $tab_jour;
		$tab_jour[0] = _MD_DIMANCHE;
		$tab_jour[1] = _MD_LUNDI;
		$tab_jour[2] = _MD_MARDI;
		$tab_jour[3] = _MD_MERCREDI;
		$tab_jour[4] = _MD_JEUDI;
		$tab_jour[5] = _MD_VENDREDI;
		$tab_jour[6] = _MD_SAMEDI;

		// tableau heure journée
		global $tab_heure;
		$tab_heure[0] = 0;
		$tab_heure[1] = 1;
		$tab_heure[2] = 2;
		$tab_heure[3] = 3;
		$tab_heure[4] = 4;
		$tab_heure[5] = 5;
		$tab_heure[6] = 6;
		$tab_heure[7] = 7;
		$tab_heure[8] = 8;
		$tab_heure[9] = 9;
		$tab_heure[10] = 10;
		$tab_heure[11] = 11;
		$tab_heure[12] = 12;
		$tab_heure[13] = 13;
		$tab_heure[14] = 14;
		$tab_heure[15] = 15;
		$tab_heure[16] = 16;
		$tab_heure[17] = 17;
		$tab_heure[18] = 18;
		$tab_heure[19] = 19;
		$tab_heure[20] = 20;
		$tab_heure[21] = 21;
		$tab_heure[22] = 22;
		$tab_heure[23] = 23;
		// $tab_heure[24] = 24;

		// tableau des mois de l'année
		global $tab_mois;
		$tab_mois[1] = _MD_JANVIER;
		$tab_mois[2] = _MD_FEVRIER;
		$tab_mois[3] = _MD_MARS;
		$tab_mois[4] = _MD_AVRIL;
		$tab_mois[5] = _MD_MAI;
		$tab_mois[6] = _MD_JUIN;
		$tab_mois[7] = _MD_JUILLET;
		$tab_mois[8] = _MD_AOUT;
		$tab_mois[9] = _MD_SEPTEMBRE;
		$tab_mois[10] = _MD_OCTOBRE;
		$tab_mois[11] = _MD_NOVEMBRE;
		$tab_mois[12] = _MD_DECEMBRE;

		global $tab_min_res;
		$tab_min_res[MIN_HEURE] = _MD_MIN_HEURE;

	}

	// Force l'affiche la fenetre de debugging sql et bloc
	// cette même fenêtre est affichée en activant le mode 
	// debug sql et bloc
	function debugSqlBloc() {
		// Logger xoops
		global $xoopsLogger;

		// Création du fichier avec le dump
		$dummyfile = 'dummy_'.time().'.html';
		$fp = fopen(XOOPS_CACHE_PATH.'/'.$dummyfile, 'w');
		fwrite($fp, $xoopsLogger->dumpAll());
		fclose($fp);

		// Affichage du fichier
		echo '<script language=javascript>
					debug_window = openWithSelfMain("'.XOOPS_URL.'/misc.php?action=showpopups&type=debug&file='.$dummyfile.'", "popup", 680, 450);
					</script>';
	}

	// Modifie un champ en magic url
	// remplace ? ==> !
	// remplace = ==> :
	// remplace & ==> ,
	function magicUrl($url) {

		return str_replace('&', ',', str_replace('=', ':', str_replace('?', '!', $url)));

	}

	// Transforme une url magique en url correcte
	// remplace ? ==> !
	// remplace = ==> :
	// remplace & ==> ,
	function magicToUrl($url) {

		return str_replace(',', '&', str_replace(':', '=', str_replace('!', '?', $url)));

	}

	// Affichage d'un tableau d'erreur
	function affTabError($error) {

		$mess = "";

		// Mise en forme de l table
		for ($i = 0; $i < count($error); $i ++) {
			$mess = $mess.$error[$i].'<br />';
		}

		// Afichage du message
		themecenterposts('<b>'._MD_ERREUR_SAISIE.'</b>', $mess);
		echo '<br />';

	}

	// Affichage d'un tableau de message
	function affTabMessage($titre, $messages) {

		$mess = "";

		// Mise en forme de l table
		for ($i = 0; $i < count($messages); $i ++) {
			$mess = $mess.$messages[$i].'<br />';
		}

		// Afichage du message
		themecenterposts('<b>'.$titre.'</b>', $mess);
		echo '<br />';

	}

	// format une date d:m:y en timestamp
	function toTimestamp($sep, $ma_date) {
		$tab_date = explode($sep, $ma_date);

		return mktime(0, 0, 0, $tab_date[1], $tab_date[2], $tab_date[0]);

	}

	// Mise en forme d'une date
	function affDate($year, $month, $day, $heure = -1, $min = -1) {
		global $tab_jour;
		global $tab_mois;
		
		if ( $heure == -1 )
		{
			$heure 	   = 0;
		  	$heure_flg = "KO";
		}
		else
			$heure_flg = "OK";

		if ( $min == -1 )
		{
			$min 	   = 0;
		  	$min_flg = "KO";
		}
		else
			$min_flg = "OK";			

		$cal = dateToCalendar($year, $month, $day, $heure, $min);
		$jour_semaine = $cal['dow'];

		$chaine = $tab_jour[$jour_semaine]." ".$day." ".$tab_mois[$month]." ".$year;

		if ($heure_flg == "OK") {
			$chaine = $chaine.", ".$heure." "._MD_HEURE;
		}

		return $chaine;
	}

	// Transfome une date en calendrier
	function dateToCalendar($year, $month, $day, $heure = 0, $min = 0) {
			// mise au format timestamp
	$cal_timestamp = mktime($heure, $min, 0, $month, $day, $year);
		// nombre de jours julien
		$cal_jd = unixtojd($cal_timestamp);
		// Mise au format calendrier
		$calendar = cal_from_jd($cal_jd, CAL_GREGORIAN);

		return $calendar;
	}

	// Timestamp to iso
	function TimestampToIso($timestamp) {
		$cal_jd = unixtojd($timestamp);
		$calendar = cal_from_jd($cal_jd, CAL_GREGORIAN);
		return $calendar['year'].'-'.$calendar['month'].'-'.$calendar['day'];
	}

	// Timestamp to calendar
	function TimestampToCal($timestamp) {
		$cal_jd = unixtojd($timestamp);
		$calendar = cal_from_jd($cal_jd, CAL_GREGORIAN);
		return $calendar;
	}

	// Lien image
	function lienImage($img, $lien, $alt = "") {
		return "<a href=".$lien.">"."<img ". (empty ($alt) ? "" : " alt=".$alt)." src=".XOOPS_URL."/modules/resmanager/images/".$img." /></a>";
	}

	// Affiche une image
	function affImage($img, $alt = "") {
		return "<img src=".XOOPS_URL."/modules/resmanager/images/".$img." ". (empty ($alt) ? "" : " alt=".$alt)."/ >";
	}

	// aficher une liste de sélection
	function affListe($nom, $liste, $valeur) {
		$chaine = "<select name=".$nom." >";

		foreach ($liste as $key => $enr) {
			$chaine .= "<option value=".$key." ". (($valeur == $key) ? "selected" : "").">".$enr."</option>";
		}

		$chaine .= "</select>";

		return $chaine;
	}

	// Créer un minical
	function creMinical($year, $month, $lien, $extra, $lien_prev, $lien_next) {

		// Premier jour du mois
		$cal_timestamp = mktime(0, 0, 0, $month, 1, $year);
		$cal_jd = unixtojd($cal_timestamp);
		$cal = cal_from_jd($cal_jd, CAL_GREGORIAN);
		$dow = $cal['dow'] == 0 ? 6 : ($cal['dow'] - 1);
		// -- 

		global $tab_jour_short;
		global $tab_mois;

		// Nbre de jours dans le mois
		$nb_day = cal_days_in_month(CAL_GREGORIAN, $month, $year) + $dow;
		// --

		$minical = '<table cellspacing="1" class="outer">';

		$minical .= "<tr><td colspan=7><div align=center><b>". (empty ($lien_prev) ? "" : "<a href=".$lien_prev."> << </a>").$tab_mois[$month]." ".$year. (empty ($lien_next) ? "" : "<a href=".$lien_next."> >> </a>")."</b></div></td></tr>";

		// Minical	
		$minical .= "<tr>";
		$minical .= "<th align='center' >".substr($tab_jour_short[1], 0, 1)."</th>";
		$minical .= "<th align='center' >".substr($tab_jour_short[2], 0, 1)."</th>";
		$minical .= "<th align='center' >".substr($tab_jour_short[3], 0, 1)."</th>";
		$minical .= "<th align='center' >".substr($tab_jour_short[4], 0, 1)."</th>";
		$minical .= "<th align='center' >".substr($tab_jour_short[5], 0, 1)."</th>";
		$minical .= "<th align='center' >".substr($tab_jour_short[6], 0, 1)."</th>";
		$minical .= "<th align='center' >".substr($tab_jour_short[0], 0, 1)."</th>";
		$minical .= "</tr>";

		$minical .= "<tr>";

		for ($i = 0; $i < $dow; $i ++) {
			$minical .= "<td></td>";
		}

		for ($i = $dow; $i < $nb_day; $i ++) {

			if (($i % 7) == 0) {
				$minical .= "</tr><tr>";
			}

			$minical .= "<td align='center' ><a href=".$lien."?cal_day=". ($i - $dow +1)."&cal_month=".$month."&cal_year=".$year.$extra.">". ($i - $dow +1)."</a></td>";
		}

		$minical .= "</tr>";
		$minical .= "</table>";

		return $minical;

	}

	// Affiche les sélections de l'utilisateur contenues dans la session
	// Le lien permet de manipuler les cookies et revenir à la page
	// telle quelle était
	// TODO Voir la saisie du commentaire pour prendre en compte les sauts de lignes
	// si utilisation d'un textarea
	// function affSelection($lien_supp, $lien_val)
	function affSelection($lien_supp, $id_reserv, $calendar, $appel, $page) {

		global $xoopsDB;

		$res = new ResManagerRes($xoopsDB);

		if (isset ($_SESSION['tab_horaire_sel']) and !empty ($_SESSION['tab_horaire_sel']) and count($_SESSION['tab_horaire_sel']) > 0) {

			// Tableau
			echo '<table cellspacing="1" class="outer">';
			//echo '<table>';
			echo '<tr>';
			echo '<th>';
			echo _MD_ALLSEL;
			echo '</th>';
			echo '</tr>';

			echo "<form name='saisie_com' action='make_demcal.php' method='post'>";

			foreach ($_SESSION['tab_horaire_sel'] as $key => $horaire) {
				if (!empty ($horaire)) {
					$res->id = $horaire['id_res'];
					$res->getReserv();

					// Date début
					echo "<tr><td>".$res->nom." : ";
					echo affDate($horaire['cal_year'], $horaire['cal_month'], $horaire['cal_day'], $horaire['cal_heure']);
					echo " "._MD_CARACTERE_A." ".makeListNumber($horaire['cal_heure'], 24, 'cal_heure_fin[]')." ".lienImage('ko.gif', $lien_supp."&num_sel=".$key);
					echo "</td></tr>";
				}
			}

			echo '</table>';
			/* Gestion de la notification impossible en get donc création d'un formulaire
			echo '<table cellspacing="1" class="outer">';
			echo "<tr><td colspan=2>"._MD_COMMENTAIRE."</td></tr><tr><td><form name=saisie_comm ><input type=text name=comm_val></form></td>";
			echo "<td><input type=button class=formbutton value="._MD_VAL." onClick=\"location='$lien_val&comm_val='+saisie_comm.comm_val.value;\" ></span></td></tr>";
			echo '</tr></table>';
			*/

			//echo "<form name='saisie_com' action='make_demcal.php' method='post'>";
			echo "<table cellspacing='1' class='outer'>";
			echo "<tr><td><b>"._MD_COMMENTAIRE."</b></td></tr>"; /* <tr><td><input type=text name=comm_val />"; */
			echo "<tr><td><textarea name='comm_val' cols='50' rows='5'></textarea></td>";
			echo "<input type='hidden' id=id_res name=id_res value='".$id_reserv."' /> ";
			echo "<input type='hidden' id=cal_day name=cal_day value='".$calendar['day']."' / > ";
			echo "<input type='hidden' id=cal_month name=cal_month value='".$calendar['month']."' / > ";
			echo "<input type='hidden' id=cal_year name=cal_year value='".$calendar['year']."' / > ";
			echo "<input type='hidden' id=op name=op value='demande' / > ";
			if ($page == 'edit_day')
				echo "<input type='hidden' id=appel name=appel value='".$appel."' / >";
			else
				echo "<input type='hidden' id=appel name=appel_mkdem value='".$appel."' / >";

			echo "<tr><td><input type='submit' class='formbutton' value="._MD_VAL." / > </td></tr>";
			echo "</table>";
			echo "</form>";

			$_SESSION['tab_horaire_sel'] = $_SESSION['tab_horaire_sel'];

		}

	}

	// Fonction pour télécharger une image sur le serveur
	//
	function uploadImage($field, $xoopsModuleConfig, $_FILES) {
		// Taille maxi du fichier
		$max_imgsize = $xoopsModuleConfig['max_imgsize'];

		// Largeur maxi de l'image
		$max_imgwidth = $xoopsModuleConfig['max_imgwidth'];

		// Hauteur maxi de l'image
		$max_imgheight = $xoopsModuleConfig['max_imgheight'];

		// Formats dont vous autorisez l'upload
		$allowed_mimetypes = array ('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png');

		// Répertoire d'upload
		$img_dir = XOOPS_ROOT_PATH."/modules/resmanager/images";

		// champ rempli ou non
		if (!empty ($field) || $field != "") {

			// puis test si le fichier a été uploadé dans le réperoire temporaire:
			if ($_FILES[$field]['tmp_name'] == "" || !is_readable($_FILES[$field]['tmp_name'])) {
				// pas de fichier à télécharger
				return 'warning_upload_10';
			}

			// création de l'objet uploader
			$uploader = new XoopsMediaUploader($img_dir, $allowed_mimetypes, $max_imgsize, $max_imgwidth, $max_imgheight);

			// test si le fichier uploadé est conforme en dimension et taille, et bien copié du répertoire temporaire au répertoire indiqué
			if ($uploader->fetchMedia($field) && $uploader->upload()) {

				// L'upload a réussi - à adapter bien évidemment

				// nom du fichier uploadé
				return $uploader->getSavedFileName();
				// echo 'Full path: ' . $uploader->getSavedDestination();

				// sinon l''upload a échoué : message d'erreur
			} else {
				return false;
			}

		} else
			return 'warning_upload_20';

	}

	// Vérifier si l'utilisateur a accès à cette catégorie
	//
	function checkRightCat($id_cat) {

		global $xoopsDB, $xoopsUser, $xoopsModule;

		$perm_name = 'CATPERM';
		$perm_itemid = intval($id_cat);

		if ($xoopsUser) {
			$groups = $xoopsUser->getGroups();
		} else {
			$groups = XOOPS_GROUP_ANONYMOUS;
		}

		// $module_id = $xoopsModule->getVar('mid');
		$module_id = getModuleId('resmanager');

		$gperm_handler = & xoops_gethandler('groupperm');

		if ($gperm_handler->checkRight($perm_name, $perm_itemid, $groups, $module_id))
			return true;
		else
			return false;

	}

	// Vérifier si l'utilisateur a accès à cette réservation
	//
	function checkRightRes($id_res) {
		global $xoopsDB;
		$res = new ResmanagerRes($xoopsDB);
		$res->id = $id_res;
		if ($res->getReserv()) {
			return checkRightCat($res->idcat);
		} else
			return false;

	}

	// Renvoie l'id d'un module
	// A vérifier si cette fonction n'existe pas
	function getModuleId($dirname) {

		global $xoopsDB;

		$nom_table = $xoopsDB->prefix('modules');

		$sql = new ResManagerStmt("select mid from ".$nom_table." where dirname = ?");

		$result = $xoopsDB->queryF($sql->bindParamVar("s", $dirname));

		if ($xoopsDB->getRowsNum($result) == 1) {
			$row = $xoopsDB->fetchArray($result);
			return $row['mid'];
		} else
			return false;

	}

	// Renvoie une information sur un utilisateur
	function getUserInfoFromUid($id_user, $id_info) {
		$member_handler = & xoops_gethandler('member');
		$user = & $member_handler->getUser($id_user);
		return $user->getVar($id_info);

	}

	// Création d'une liste de chiffre en deux valeurs
	function makeListNumber($val_deb, $val_fin, $nom_list) {
		$list = "";
		$list .= "<select name='".$nom_list."' >";
		for ($i = $val_deb; $i < $val_fin; $i ++) {
			$list .= "<option value='".$i."'>".$i."</option>";
		}
		$list .= "</select>";

		return $list;

	}

	// Mettre en forme un tableau de semaine
	function makeOpensem($sel) {

		$open_sem = "0000000";

		for ($i = 0; $i < count($sel); $i ++) {
			$open_sem[$sel[$i]] = "1";
		}

		return $open_sem;
	}

	// Test si une variable contient une valeur
	function testVal($val) {

		return (isset ($val) ? $val : "");

	}

}
?>



