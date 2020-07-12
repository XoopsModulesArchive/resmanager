<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System //
//                    Copyright (c) 2000 XOOPS.org //
//                       <http://www.xoops.org/> //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify //
//  it under the terms of the GNU General Public License as published by //
//  the Free Software Foundation; either version 2 of the License, or //
//  (at your option) any later version. //
//                                                                           //
//  You may not change or alter any portion of this comment or credits //
//  of supporting developers from this source code or any supporting //
//  source code which is considered copyrighted (c) material of the //
//  original comment or credit authors. //
//                                                                           //
//  This program is distributed in the hope that it will be useful, //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the //
//  GNU General Public License for more details. //
//                                                                           //
//  You should have received a copy of the GNU General Public License //
//  along with this program; if not, write to the Free Software //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA //
//  ------------------------------------------------------------------------ //

// DO bug 7 Afficher fermer si la réservation est fermée => v 0.2.1
// DO bug 6 affichage de l'image lock => V 0.2.1
include("header.php");
include(XOOPS_ROOT_PATH."/header.php");

// functions
function lienHoraire( $res, $cal, $heure, $appel, $op )
{
  $chaine = "";
  $chaine = $chaine."<a href=make_demcal.php?";
  $chaine = $chaine."id_res=".$res;
  $chaine = $chaine."&cal_day=".$cal['day'];
  $chaine = $chaine."&cal_month=".$cal['month'];
  $chaine = $chaine."&cal_year=".$cal['year'];
  $chaine = $chaine."&cal_heure=".$heure;
  $chaine = $chaine."&op=".$op;
  $chaine = $chaine."&appel=".magicUrl($appel);
  $chaine = $chaine.">".$heure."</a>";
  
  return $chaine; 
}

// functions
function lienHoraireSansBalise( $res, $cal, $heure, $appel, $op )
{
  $chaine = "";
  $chaine = $chaine."make_demcal.php?";
  $chaine = $chaine."id_res=".$res;
  $chaine = $chaine."&cal_day=".$cal['day'];
  $chaine = $chaine."&cal_month=".$cal['month'];
  $chaine = $chaine."&cal_year=".$cal['year'];
  $chaine = $chaine."&cal_heure=".$heure;
  $chaine = $chaine."&op=".$op;
  $chaine = $chaine."&appel=".magicUrl($appel);
  
  return $chaine; 
}


function lienJour($res, $year, $month, $day,  $appel, $aff )
{
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

function lienJourSuiv($res, $year, $month, $day, $appel, $aff )
{
  $calendar = dateToCalendar($year, $month, ++$day);
  return lienJour($res, $calendar['year'], $calendar['month'], $calendar['day'], $appel, $aff );
}

function lienJourPrec($res, $year, $month, $day, $appel, $aff )
{
  $calendar = dateToCalendar($year, $month, --$day);
  return lienJour($res, $calendar['year'], $calendar['month'], $calendar['day'], $appel, $aff );
}

function lienMoisSuiv($res, $year, $month, $day, $appel, $aff )
{
  $calendar = dateToCalendar($year, ++$month, $day);
  return lienJour($res, $calendar['year'], $calendar['month'], $calendar['day'], $appel, $aff );
}

function lienMoisPrec($res, $year, $month, $day, $appel, $aff )
{
  $calendar = dateToCalendar($year, --$month, $day);
  return lienJour($res, $calendar['year'], $calendar['month'], $calendar['day'], $appel, $aff );
}

function lienAnneeSuiv($res, $year, $month, $day, $appel, $aff )
{
  $calendar = dateToCalendar(++$year, $month, $day);
  return lienJour($res, $calendar['year'], $calendar['month'], $calendar['day'], $appel, $aff );
}

function lienAnneePrec($res, $year, $month, $day, $appel, $aff )
{
  $calendar = dateToCalendar(--$year, $month, $day);
  return lienJour($res, $calendar['year'], $calendar['month'], $calendar['day'], $appel, $aff );
}

function lienSpecal($op, $cal, $res, $appel, $year=null, $month=null, $day=null, $time=null , $allres=null)
{
  $chaine = "";
  $chaine = $chaine."specal.php?id_res=".$res;
  $chaine = ($year==null?$chaine.'':$chaine."&year=".$year);
  $chaine = ($month==null?$chaine.'':$chaine."&month=".$month);
  $chaine = ($day==null?$chaine.'':$chaine."&day=".$day);
  $chaine = ($time==null?$chaine.'':$chaine."&time=".$time);
  $chaine = $chaine."&year_r=".$cal['year'];
  $chaine = $chaine."&month_r=".$cal['month'];
  $chaine = $chaine."&day_r=".$cal['day'];
  $chaine = $chaine."&appel=".$appel;
  $chaine = $chaine."&op=".$op;
  $chaine = ($allres==null?$chaine.'':$chaine."&allres=".$allres);
 
  return $chaine;
}

// fonction pour afficher la liste des demandes pour un horaire
function affDemande($tab)
{
	global $tab_etat_dem_img;
	global $xoopsUser;
	global $xoopsModule;
	
	foreach ($tab as $enr)
	{
		if (checkAdmin($xoopsUser, $xoopsModule)) 
		{
			echo xoops_getLinkedUnameFromId($enr['id_user_dem']);    
			$lien = "<a href=edit_demcal.php?op=detail&iddem=".$enr['id_dem']." target=_blank>".$enr['id_dem']." : ".substr($enr['comm_dem'],0,30)."...</a>";
			echo ' ('.$lien.' '.affImage($tab_etat_dem_img[$enr['status_dem']]).') ';
		}
		else if ($xoopsUser->getVar('uid') == $enr['id_user_dem']) 
		{
			$lien = "<a href=edit_demcal.php?op=detail&iddem=".$enr['id_dem']." target=_blank>".$enr['id_dem']." : ".substr($enr['comm_dem'],0,30)."...</a>";
			echo ' ('.$lien.' '.lienImage($tab_etat_dem_img[$enr['status_dem']]).') ';			
		}
	}
}

// --

// récupération des données
extract($_GET,EXTR_SKIP);



// Lien retour
// transformation de la magic url
$appel = magicToUrl($appel);

// Date du jour
$date_jour 	= getdate();

// Classe de demande
$demcal = new ResManagerDemcal($xoopsDB);

// Lecture des infos de la réservation
$res = new ResManagerRes($xoopsDB);
$res->id = $id_reserv;
if ( ! $res->getReserv() )
  redirect_header($appel,3,_MD_ACCESBD_KO);
// --

// contrôle réservation ouverte
if (!checkadmin($xoopsUser, $xoopsModule) and $res->active == 0)
  redirect_header($appel,3,_MD_RESERV_NOTACTIVE);
// --

// contrôle réservation autorisée pour cet utilisateur
if (!checkRightRes($res->id))
  redirect_header($appel,3,_MD_DENIED_CAT);
// --

// Vérifie si date saisie
// sinon date courante
if ( !isset($cal_month) && !isset($cal_day) && !isset($cal_year))
  {
		$cal_year	 	= $date_jour['year'];
		$cal_day 		= $date_jour['mday'];
		$cal_month 		= $date_jour['mon'];  
  }
// --

// contrôles format date
if ( !checkDate($cal_month, $cal_day, $cal_year) )
  redirect_header($appel,3,_MD_FORMAT_DATE_KO);
// --

// mise au format timestamp
$cal_timestamp = mktime(0,0,0, $cal_month, $cal_day, $cal_year);
// nombre de jours julien
$cal_jd 			 = unixtojd($cal_timestamp);
// Mise au format calendrier
$calendar		 	 = cal_from_jd($cal_jd, CAL_GREGORIAN);
// --

// Lecture des paramètres du calendrier
$cal = new ResManagerCal($xoopsDB);
$cal->id_reserv = $id_reserv;
if ( ! $cal->getCal($calendar["dow"]) )
  redirect_header($appel,3,_MD_ACCESBD_KO);


// Contrôle ouverture des périodes
$ctrl_dispo = null;
$jour_indispo = false;
// Contrôle jour semaine ouverte
// Contrôle fourchette de date de réservation
if ($cal_timestamp > $cal->date_fin or $cal_timestamp < $cal->date_deb )
  $ctrl_dispo = _MD_JOUR_INDISPO;
else if (! $cal->isOpen($calendar['dow']) )
  $ctrl_dispo = _MD_JOUR_INDISPO;
else
{
  // Contrôle mois et jour
  $specal = new ResManagerSpecal($xoopsDB);
  $specal->id_reserv = $id_reserv;
  $specal->year = $cal_year;
  $specal->month = $cal_month;
  if ($specal->existSpecal())
    $ctrl_dispo = _MD_MOIS_INDISPO;
  else
  {
    $specal->day = $cal_day;
    if ($specal->existSpecal())
	{
      $ctrl_dispo 		= _MD_JOUR_INDISPO;
	  $jour_indispo	= true;
	}
  }
}

if ($ctrl_dispo == null) {
 // Création du tableau pour les heures de fermetures
 $specal->year 		= 	$cal_year;
 $specal->month 	= 	$cal_month;
 $specal->day 		= 	$cal_day;
 $tab_specal 		= 	$specal->getSpecalDay();
}
// --


// --

// Affichage d'un lien retour
echo '<div align=right><a href='.magicToUrl($appel)."> "._MD_FERMER_CAL.' </a></div>';

// Préparation du lien blocage journée ou déblocage journée
$lien_bloc_jour = "";
if( $cal->isOpen($calendar['dow']) )
{
  if ( $jour_indispo )
  {
    $lien_bloc_jour = lienImage("unlock.jpg", lienSpecal('del', $calendar, $id_reserv, magicUrl($appel), $cal_year,$cal_month,$cal_day)).lienImage("unlockall.jpg", lienSpecal('del', $calendar, $id_reserv, magicUrl($appel), $cal_year,$cal_month,$cal_day,null,'O'));    
  }
  else
  {
    $lien_bloc_jour = lienImage("lock.jpg", lienSpecal('add', $calendar, $id_reserv, magicUrl($appel), $cal_year,$cal_month,$cal_day)).lienImage("lockall.jpg", lienSpecal('add', $calendar, $id_reserv, magicUrl($appel), $cal_year,$cal_month,$cal_day,null, 'O'));
  }
}
// --

// Affichage du calendrier
echo "<div align=center><b>"._MD_TITLE_EDIT_DAY." ".$res->nom."</b></div><br />";
echo "<div align=center>".lienJour($id_reserv, $date_jour['year'],$date_jour['mon'], $date_jour['mday'], $appel, _MD_DATE_JOUR)."</div><br />";

// Affichage de la session
echo "<div>";
/*
 * affSelection(lienHoraireSansBalise($id_reserv, $calendar, "", $appel,
 * "suppsel"), lienHoraireSansBalise($id_reserv, $calendar, "", $appel,
 * "demande")); Nécessaire à la gestion de la notification, modification de la
 * fonction affselection
 */
affSelection(lienHoraireSansBalise($id_reserv, $calendar, "", $appel, "suppsel"), 
			 $id_reserv, $calendar, $appel, "edit_day");                         
echo "</div>";

echo "<div align=center>";
echo "<table><tr>";
echo "<td><div align=left>".lienAnneePrec($id_reserv, $cal_year,$cal_month, $cal_day, $appel, _MD_ANNEE_PREC)."</div></td>";
echo "<td><div align=left>".lienMoisPrec($id_reserv, $cal_year,$cal_month, $cal_day, $appel, _MD_MOIS_PREC)."</div></td>";
echo "<td><div align=left>".lienJourPrec($id_reserv, $cal_year,$cal_month, $cal_day, $appel, _MD_JOUR_PREC)."</div></td>";
echo "<td><div align=center>".affDate($cal_year, $cal_month, $cal_day).(checkAdmin($xoopsUser, $xoopsModule)?$lien_bloc_jour:"")."</div></td>";
echo "<td><div align=right>".lienJourSuiv($id_reserv, $cal_year,$cal_month, $cal_day, $appel, _MD_JOUR_SUIV)."</div></td>";
echo "<td><div align=right>".lienMoisSuiv($id_reserv, $cal_year,$cal_month, $cal_day, $appel, _MD_MOIS_SUIV)."</div></td>";
echo "<td><div align=right>".lienAnneeSuiv($id_reserv, $cal_year,$cal_month, $cal_day, $appel, _MD_ANNEE_SUIV)."</div></td>";
echo "</tr></table>";
echo "</div>";

if ($ctrl_dispo == null) {

// calcul des dispo pour chaque horaire
$demcal->year = $cal_year;
$demcal->month = $cal_month;
$demcal->day = $cal_day;
$tab_dispo = $demcal->getDispoDay($res);
$tab_desdem = $demcal->getTabDemTime($res);
   
echo '<table width="100%" cellspacing="1" class="outer">';
echo '<tr>';
echo '<th width=10>'._MD_HEURE_JOURNEE.'</th>';
echo '<th width=800>'._MD_HEURE_RES.'</th>';
if (checkAdmin($xoopsUser, $xoopsModule) ) echo '<th width=60>'._MD_ACTION.'</th>';
echo '</tr>';

// Affichage de la journée
// TODO gérer des intervalles autre que l'heure
for ($i=$cal->heure_deb; $i<=$cal->heure_fin;$i++)
{
	echo '<tr class='.((($i-$cal->heure_deb)%2)==0?'odd':'even').'>';
	if ((isset($tab_specal[$i]) ) or (isset($tab_dispo[$i]) and $tab_dispo[$i] == 0))
	  echo '<td>'.$i.'</td>';
	else
	  echo '<td>'.lienHoraire($id_reserv, $calendar, $i, $appel, "selection").'</td>';
	
	// Colonne réservation
	// Membre : inique si free ou full + liste de ses demandes
	// Admin : indique si free ou full + liste des demandes
	echo '<td>';
	
  	if ( isset($tab_specal[$i]) )
		echo affImage("full.png");
	else
		echo ((isset($tab_dispo[$i]) and $tab_dispo[$i] == 0)?affImage("full.png"):lienImage("ok_bouton.gif",lienHoraireSansBalise($id_reserv, $calendar, $i, $appel, "selection")));
	
	if (isset($tab_desdem[$i]) )affDemande($tab_desdem[$i], $id_reserv, $cal_day, $cal_month, $cal_year, $appel);

	echo '</td>';
	
	if ( checkAdmin($xoopsUser, $xoopsModule) )
	{
	  if ( isset($tab_specal[$i]) )
          {
            echo '<td>'.lienImage("unlock.jpg", lienSpecal('del', $calendar, $id_reserv, magicUrl($appel), $cal_year,$cal_month,$cal_day, $i ));	  
            echo lienImage("unlockall.jpg", lienSpecal('del', $calendar, $id_reserv, magicUrl($appel), $cal_year,$cal_month,$cal_day, $i, 'O' )).'</td>';	  
          }
          else
          {
	    echo '<td>'.lienImage("lock.jpg", lienSpecal("add", $calendar, $id_reserv, magicUrl($appel), $cal_year,$cal_month,$cal_day, $i ));
            echo lienImage("lockall.jpg", lienSpecal("add", $calendar, $id_reserv, magicUrl($appel), $cal_year,$cal_month,$cal_day, $i, 'O' )).'</td>';
          }
	}
  
  echo '<tr>';  

}

echo '</table><br />';
// --

}
else
{
  // Affichage du message
  echo '<div align=center>'.$ctrl_dispo.'</div>';

}

// Affichage des jours du mois
/*
 * for ($i=1; $i <=cal_days_in_month(CAL_GREGORIAN, $cal_month, $cal_year);$i++) {
 * if ($i == $cal_day) echo $i." | "; else echo lienJour($id_reserv, $cal_year,
 * $cal_month, $i, $appel, $i )." | "; }
 */
// --

// Affichage de minic alendrier
if (!isset($minical_year) ) 	$minical_year 	= $cal_year;
if (!isset($minical_month) ) 	$minical_month 	= $cal_month;

$lien_edit_day 		= XOOPS_URL."/modules/resmanager/edit_day.php";
$extra = 					"&id_reserv=".$id_reserv.
									"&appel=".magicUrl($appel).
									"&minical_year=".$minical_year.
									"&minical_month=".$minical_month;

$minical_year_prev 	= $minical_month<=3?$minical_year-1:$minical_year;
$minical_month_prev = $minical_month<=3?9+$minical_month:$minical_month-3;

$minical_year_next 	= $minical_month>9?$minical_year+1:$minical_year;
$minical_month_next = $minical_month>9?$minical_month-9:$minical_month+3;

$lien_prev = 	$lien_edit_day."?".
             	"minical_month=".$minical_month_prev.
			 			 	"&minical_year=".$minical_year_prev.
 							"&id_reserv=".$id_reserv.
							"&appel=".magicUrl($appel).
							"&cal_day=".$cal_day.
			 				"&cal_month=".$cal_month.
			 				"&cal_year=".$cal_year;
			 
$lien_next = 	$lien_edit_day."?".
             	"minical_month=".$minical_month_next.
			 				"&minical_year=".$minical_year_next.
 							"&id_reserv=".$id_reserv.
							"&appel=".magicUrl($appel).
			 				"&cal_day=".$cal_day.
			 				"&cal_month=".$cal_month.
			 				"&cal_year=".$cal_year;
	

echo "<table width=100% >";
echo "<tr>";
		
echo "<td>";		
echo creMinical($minical_year, $minical_month,$lien_edit_day,$extra, $lien_prev, null);
echo "</td>";
echo "<td align=center>";		
echo creMinical($minical_month==12?$minical_year+1:$minical_year, 
				$minical_month==12?1:$minical_month+1,
				$lien_edit_day,$extra, null, null
				);
echo "</td>";
echo "<td align=right>";
echo creMinical($minical_month>=11?$minical_year+1:$minical_year, 
				$minical_month>=11?$minical_month-10:$minical_month+2,
				$lien_edit_day,$extra, null, $lien_next
				);
					   
echo "</td>";

echo "</table>";		
// --








// Pied de page
include(XOOPS_ROOT_PATH."/footer.php");

//debugSqlBloc();

?>
