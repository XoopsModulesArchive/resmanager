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
if ( file_exists("../language/".$xoopsConfig['language']."/main.php") ) 
{
	include "../language/".$xoopsConfig['language']."/main.php";
} else 
{
	include "../language/english/main.php";
}

include_once(XOOPS_ROOT_PATH."/class/uploader.php");
include_once("../class/ResManagerCat.class.php");
include_once("../class/ResManagerCal.class.php");
include_once("../class/ResManagerRes.class.php");
include_once("../class/ResManagerInfores.class.php");
include_once("../class/ResManagerDem.class.php");

include_once("../include/functions.php");

// initialisation des constantes
initConstante();

// globales
global $xoopsDB, $xoopsModule;

// En tete
xoops_cp_header();


// Mise en forme
$myts 	=				&MyTextSanitizer::getInstance();


// Mise en forme
$myts 	=				&MyTextSanitizer::getInstance();


// Recuperation des données 
if ( isset($_POST['idres']) )
{
  extract($_POST);
  $data_saisie = $_POST;
}
else
{
  extract($_GET);
  $data_saisie = $_GET;  
}

// Classe catégorie
$res = new ResManagerRes($xoopsDB);
$cal = new ResManagercal($xoopsDB);
$cat = new ResManagerCat($xoopsDB);
$dem = new ResManagerDem($xoopsDB);
$infores = new ResManagerInfores($xoopsDB);

// variables initialisées
$tab_error = array();
$tab = array();

// Cas Edition
if ( isset($edit) )
{
  // Valeur renvoyée par la liste
	$res->id = $idres;
		
	// Lecture de la catégorie
	$res->getReserv();
	
	// affectation des variables
	$nomres 	= $res->nom;
	$descrres 	= $res->descr;
	$typeres  	= $res->type;
	$nboccres 	= $res->nbocc;
	$statusres  = $res->status;
	$idcatres  	= $res->idcat;
	$validres   = $res->valid;
	$active_res = $res->active; 
	$occpersres = $res->occpers;
	
	if ($res->type == RES_CALENDRIER) {
	
	$cal->id_reserv = $res->id;
	//$cal->getCal();
	$cal->getCalAllHour();
	
	$date_deb  		= $cal->date_deb;
	$date_fin  		= $cal->date_fin;
	$open_sem 		= $cal->getOpensem();
	$min_res  		= $cal->min_res;
	$heure_deb_lun 		= $cal->heure_deb_lun;
	$heure_fin_lun 		= $cal->heure_fin_lun;
	$heure_deb_mar 		= $cal->heure_deb_mar;
	$heure_fin_mar 		= $cal->heure_fin_mar;
	$heure_deb_mer 		= $cal->heure_deb_mer;
	$heure_fin_mer 		= $cal->heure_fin_mer;
	$heure_deb_jeu 		= $cal->heure_deb_jeu;
	$heure_fin_jeu 		= $cal->heure_fin_jeu;
	$heure_deb_ven 		= $cal->heure_deb_ven;
	$heure_fin_ven 		= $cal->heure_fin_ven;
	$heure_deb_sam 		= $cal->heure_deb_sam;
	$heure_fin_sam 		= $cal->heure_fin_sam;
	$heure_deb_dim 		= $cal->heure_deb_dim;
	$heure_fin_dim 		= $cal->heure_fin_dim;					    
	}
	
	
}
// Cas sauvegarde
else if ( isset($save) )
{
	// Valeur renvoyée par la liste
  $res->id 			= $idres;
  $res->descr		= $myts->oopsAddSlashes($descrres);
  $res->type		= $typeres;
  $res->nbocc		= $nboccres;
  $res->idcat		= $idcatres;
  $res->valid   	= $validres;
  $res->occpers		= $occpersres;
  $res->active		= $active_res;
    
  if ($typeres == RES_CALENDRIER) {
     $cal->id_reserv 		= $idres;	 
	 	 $cal->setOpensem($open_sem);
  	 $cal->min_res 			= $min_res;

  	 $cal->date_deb_f 		= $date_deb;
  	 $cal->date_fin_f 		= $date_fin;	

	   $cal->heure_deb_dim	 	  = $heure_deb_dim;
  	 $cal->heure_fin_dim 			= $heure_fin_dim;
	   $cal->heure_deb_lun	 	  = $heure_deb_lun;
  	 $cal->heure_fin_lun 			= $heure_fin_lun;  	
	   $cal->heure_deb_mar	 	  = $heure_deb_mar;
  	 $cal->heure_fin_mar 			= $heure_fin_mar;	
	   $cal->heure_deb_mer	 	  = $heure_deb_mer;
  	 $cal->heure_fin_mer 			= $heure_fin_mer;	
	   $cal->heure_deb_jeu	 	  = $heure_deb_jeu;
  	 $cal->heure_fin_jeu 			= $heure_fin_jeu;	
	   $cal->heure_deb_ven	 	  = $heure_deb_ven;
  	 $cal->heure_fin_ven 			= $heure_fin_ven;	
	   $cal->heure_deb_sam	 	  = $heure_deb_sam;
  	 $cal->heure_fin_sam 			= $heure_fin_sam;



	
	  // formatage pour affichage des données
  	$date_deb		= toTimestamp('-', $date_deb);
  	$date_fin		= toTimestamp('-', $date_fin);
  }

  // formatage pour affichage des données  
  $nomres 		= $myts->previewTarea($nomres);
  $descrres 	= $myts->previewTarea($descrres);
  
  
  // Contrôle de saisie
  $tab_error_res = $res->checkSaisie();
  if ($typeres == RES_CALENDRIER)  
    $tab_error_cal = $cal->checkSaisie();
  else 
    $tab_error_cal = array();
    // $tab_error_cal = null;
	  

  // fusion des deux tableaux d'erreurs  
  $tab_error = array_merge($tab_error_res, $tab_error_cal);
    
  if ( count($tab_error) > 0 )
    affTabError($tab_error);
  else
	{  
    // Maj
    if (!$res->updateReserv())
	  {
	  // Message erreur
	  $tab_error[] = _MD_ACCESBD_KO;
	  affTabError($tab_error);
	  }
	  else
	  {
	 
	  // Maj données supplémentaires 	
	  if ( ! $infores->updateAllInfo($data_saisie, $res->id) )
	    {
	      // Message erreur
	      $tab_error[] = _MD_ACCESBD_KO;
	      affTabError($tab_error);
	    }
	  else
	    {
	 
	      if ($typeres == RES_CALENDRIER)
	        {
		
		      if ($cal->UpdateCal()) 
		        {
		          // Retour ecran
	            redirect_header("index.php",3,_MD_MAJRESOK);		  
		        }
		      else
		        {
 	            // Message erreur
	  		      $tab_error[] = _MD_ACCESBD_KO;
	  		      affTabError($tab_error);
		        }
		     }
		     else
	       {
		        // Retour ecran
	          redirect_header("index.php",3,_MD_MAJRESOK);		  
		     }   
		  }
		}
  }
}
// Cas suppression
else if ( isset($del) )
{
  // Valeur renvoyée par la liste
  $res->id = $idres;
  $cal->id_reserv= $idres;
  
  // Supprimer seulement si aucune demande
  $dem = new ResManagerDem($xoopsDB);
  $dem->id_reserv = $idres;
  
  if ( $dem->countResDem() == 0 )
  {
    // Suppression
    if ($res->suppReserv() and $cal->suppCal() and $infores->delAllInfo($idres) ) {
      // Retour ecran
      redirect_header("index.php",3,_MD_SUPPRESOK);
    }
	else
	{
      // Message erreur
      themecenterposts('<b>'._MD_MESS_DB.'</b>', _MD_ACCESBD_KO );	
	  echo '<br />';
	}
  }
  else
    // Message erreur
    redirect_header("majres.php",3,_MD_SUPPRESKO);
    
}
//  cas annuler
else if ( isset($annuler) )
{
// affectation des variables
	$nomres 		= '';
	$descrres 	= '';
	$typeres  	= 0;
	$nboccres 	= 1;
	$statusres  = 0;
	$idcatres  	= 0;
	$validres   = 0;
	$occpersres = 1;
	$active_res = 0;
	
	$cal->open_sem 	= "0111110";
  $open_sem   		= $cal->getOpensem();
  $active_res 		= 1;  
	$heure_deb_dim	= 9;
	$heure_fin_dim	= 17;
	$heure_deb_lun	= 9;
	$heure_fin_lun	= 17;
	$heure_deb_mar	= 9;
	$heure_fin_mar	= 17;
	$heure_deb_mer	= 9;
	$heure_fin_mer	= 17;
	$heure_deb_jeu	= 9;
	$heure_fin_jeu	= 17;
	$heure_deb_ven	= 9;
	$heure_fin_ven	= 17;
	$heure_deb_sam	= 9;
	$heure_fin_sam	= 17;
  

}



// Ecran de saisie de catégorie
include '../include/majres.inc.php';

// Liste des demandes
// Titre
echo '<b>'._MD_LST_ALLDEM.'<b><br /><br />';

// Liste des demandes

// Tableau
echo '<table width="100%" cellspacing="1" class="outer">';
echo '<tr>';
echo '<th>'._MD_TITLE_TABDEM1.'</th>';
echo '<th>'._MD_TITLE_TABDEM2.'</th>';
echo '<th>'._MD_TITLE_TABDEM3.'</th>';
echo '<th>'._MD_TITLE_TABDEM4.'</th>';
echo '<th>'._MD_TITLE_TABDEM5.'</th>';
echo '<th>'._MD_TITLE_TABDEM6.'</th>';
echo '<th>'._MD_TITLE_TABDEM7.'</th>';
echo '</tr>';

// Administrateur ==> toutes les demandes 
// user           ==> ses demandes
if (checkAdmin($xoopsUser, $xoopsModule) and isset($idres) )
{
	$dem->id_reserv = $idres;
    $tab = $dem->getResDem();
  
}

if ( $tab and ! isset($annuler) )
{
 for ($i=0;$i<count($tab);$i++)
 {
   // Différencier ligne pair et impair
   echo '<tr class='.(($i%2)==0?'odd':'even').'>';  
   echo '<td>'.$tab[$i]['id_dem'].'</td>';
   echo '<td>'.date('d/m/y',$tab[$i]['date_dem']).'</td>';
   echo '<td>'.$tab[$i]['nom_cat'].'</td>';
   echo '<td>'.$tab[$i]['nom_reserv'].'</td>';
   echo '<td>'.xoops_getLinkedUnameFromId($tab[$i]['uid']).'</td>';
   //echo '<td>'.$tab_etat_dem[$tab[$i]['status_dem']].'</td>';
   echo '<td>'.affImage($tab_etat_dem_img[$tab[$i]['status_dem']]).'</td>';
	 
	 // lien vers detail demande
	 // envoyer le lien pour revenir
	 $appel = magicUrl("admin/majres.php?edit=ok&idres=".$idres);
	 // trigger_error($appel, E_USER_NOTICE);
	 echo '<td>'.'<a href=../edit_demcal.php?op=detail&appel='.$appel.'&iddem='.$tab[$i]['id_dem'].'>'._MD_DETAIL.'</a></td>';
	 echo '</tr>';
 }
}

echo '</table>';


// Pied de page
xoops_cp_footer();

?>
