<?php 
// ------------------------------------------------------------------------ //
// XOOPS - PHP Content Management System                      				//
// Copyright (c) 2000 XOOPS.org                           					//
// <http://www.xoops.org/>                             						//
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// //
// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// //
// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //

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

include_once("../class/ResManagerRes.class.php");
include_once("../class/ResManagerCat.class.php");
include_once("../class/ResManagerCal.class.php");
include_once("../class/ResManagerSpecal.class.php");

include_once("../include/functions.php");

// Maj réservation
function update_reserv_func($param)
{

// globales
global $xoopsDB, $xoopsModule;

$res = new ResManagerRes($xoopsDB);
$cal = new ResManagerCal($xoopsDB);

// Reservation à mettre à jour
$list_id = $param['idres'];

// Tableau de messages
$tab_messages = array();

for ($i=0;$i<count($list_id);$i++)
{

  // Lecture de la réservation
  $res->id = $list_id[$i];
  if ( $res->getReserv() )
  {
      // Mise à jour des informations demandées
      if ( $param['upd_radio_id_cat'] == 1 )
        $res->idcat = $param['id_cat'];
      if ( $param['upd_radio_nbocc'] == 1)
        $res->nbocc		= $param['nbocc'];
      if ( $param['upd_radio_occpers'] == 1)
        $res->occpers	= $param['occpers'];
      if ( $param['upd_radio_valid'] == 1)
        $res->valid		= $param['valid'];
      if ( $param['upd_radio_active'] == 1)
        $res->active	= $param['active'];
      // --
      
      // Controle d'une réservation
      $err_reserv = $res->checkSaisie();
      if (count($err_reserv) > 0 )
        return $err_reserv;
      // --
      
      // Mise à jour réservation
      if ( !$res->updateReserv() )
        $maj_res = false;
      else
        $maj_res = true;
      // --

      // Réservation type calendrier      
      if ($res->type == RES_CALENDRIER)
      {
        $cal->id_reserv = $list_id[$i];
        if ( $cal->getCalAllHour() )
        {
          if ( $param['upd_radio_date_deb'] == 1)
            $cal->date_deb_f = $param['date_deb'];
          if ( $param['upd_radio_date_fin'] == 1)
            $cal->date_fin_f = $param['date_fin']; 
          if ( $param['upd_radio_heure_deb_lun'] == 1)
          {
              $cal->heure_deb_lun = $param['heure_deb_lun'];
              $cal->heure_fin_lun = $param['heure_fin_lun'];
          }
          if ( $param['upd_radio_heure_deb_mar'] == 1)
          {
              $cal->heure_deb_mar = $param['heure_deb_mar'];
              $cal->heure_fin_mar = $param['heure_fin_mar'];
          }
          if ( $param['upd_radio_heure_deb_mer'] == 1)
          {
              $cal->heure_deb_mer = $param['heure_deb_mer'];
              $cal->heure_fin_mer = $param['heure_fin_mer'];
          }
          if ( $param['upd_radio_heure_deb_jeu'] == 1)
          {
              $cal->heure_deb_jeu = $param['heure_deb_jeu'];
              $cal->heure_fin_jeu = $param['heure_fin_jeu'];
          }
          if ( $param['upd_radio_heure_deb_ven'] == 1)
          {
              $cal->heure_deb_ven = $param['heure_deb_ven'];
              $cal->heure_fin_ven = $param['heure_fin_ven'];
          }
          if ( $param['upd_radio_heure_deb_sam'] == 1)
          {
              $cal->heure_deb_sam = $param['heure_deb_sam'];
              $cal->heure_fin_sam = $param['heure_fin_sam'];
          }
          if ( $param['upd_radio_heure_deb_dim'] == 1)
          {
              $cal->heure_deb_dim = $param['heure_deb_dim'];
              $cal->heure_fin_dim = $param['heure_fin_dim'];
          }           
          if ( $param['upd_radio_open_sem'] == 1)
              $cal->setOpensem($param['open_sem']);
                  
        }
        else return array(0=>"Table ResManagerCal =&gt; "._MD_ACCESBD_KO);
        
        // Controle d'une réservation
        $err_reserv = $cal->checkSaisie();
        if (count($err_reserv) > 0 )
          return $err_reserv;
        // --
      
        // Mise à jour calendrier
        if ( !$cal->updatecal() )
          $maj_res = false;
        else
          $maj_res = true;
        // --
      }        
  
      $tab_messages[] = ( $maj_res == true ? ($res->nom." =&gt; "._MD_MAJRESOK): ($res->nom." =&gt; "._MD_ACCESBD_KO));
  
  }
  else return array(0=>"Table ResManagerRes =&gt; "._MD_ACCESBD_KO);
}

return $tab_messages;

}

// Maj specal
function update_specal_func($param)
{

// globales
global $xoopsDB, $xoopsModule, $tab_suff_jour;

$res = new ResManagerRes($xoopsDB);

// Reservation à mettre à jour
$list_id = $param['idres'];

// Tableau de messages
$tab_messages = array();

// Date saisie
$date_deb = toTimestamp('-',$param['date_deb']);
$date_fin = toTimestamp('-',$param['date_fin']);

if ( $date_deb >= $date_fin )
  return array(0=>_MD_OPEN_SUP_CLOSE);

// Journées à mettre à jour
$tab_jour = makeOpensem($param['open_sem']);

// Message résultat ok
$message_res = ($param['lock']=='LOCK'?_MD_SPEC_OK:_MD_SPEC_DEL_OK);

for ($i=0;$i<count($list_id);$i++)
{

  // Statut maj
  $maj_res = true;

  // Lecture de la réservation
  $res->id = $list_id[$i];
  if ( $res->getReserv() )
  {
      // Mise à jour par journée
      if ( $param['upd_radio_open_sem'] == 1 )
      {
        // balayage des journées
        for ( $j=$date_deb;$j<=$date_fin;$j=$j+86400)
        {
          // Au format calendrier
          // dow : 0 dim
          // dow : 6 sam
          $cal = TimestampToCal($j);
          
          // Mise à jour demandée
          if ( $tab_jour[$cal['dow']] == 1)
          {
            //$tab_messages[] = TimestampToIso($j);
            
            $specal             = new ResManagerSpecal($xoopsDB);
            $specal->id_reserv 	= $list_id[$i];
            $specal->year 		  = $cal['year'];
            $specal->month 		  = $cal['month'];
            $specal->day 			  = $cal['day'];
            $specal->time 		  = null;

            // Ajout blocage   
            if ( $param['lock'] == 'LOCK')
            {         
              if (!$specal->existSpecal()) 
                if ( !$specal->addSpecal() ) 
                  $maj_res = false;
            }
            else if ( $param['lock'] == 'UNLOCK')
            {
               if ( $specal->existSpecal() ) 
                 if ( !$specal->suppSpecal() )
                   $maj_res = false;
            }
                
          }
        }
      }
      // Mise à jour par heure
      else if ( $param['upd_radio_open_sem'] == 0 )
      {
        // balayage des journées
        for ( $j=$date_deb;$j<=$date_fin;$j=$j+86400)
        {
        
          // Au format calendrier
          // dow : 0 dim
          // dow : 6 sam
          $cal = TimestampToCal($j);
          
          if ( $param['upd_radio_heure_deb_'.$tab_suff_jour[$cal['dow']]] == 1)
          {
            
            // Heure début et heure fin demandée          
            $heure_deb = $param['heure_deb_'.$tab_suff_jour[$cal['dow']]];
            $heure_fin = $param['heure_fin_'.$tab_suff_jour[$cal['dow']]];
            
            // Ajout ou supp des specal pour chaque heure
            for ($k=$heure_deb;$k<=$heure_fin;$k++)
            {
            
                // $tab_messages[] = TimestampToIso($j)." ".$k;
            
                $specal             = new ResManagerSpecal($xoopsDB);
                $specal->id_reserv 	= $list_id[$i];
                $specal->year 		  = $cal['year'];
                $specal->month 		  = $cal['month'];
                $specal->day 			  = $cal['day'];
                $specal->time 		  = $k;
    
                // Ajout blocage   
                if ( $param['lock'] == 'LOCK')
                {         
                  if (!$specal->existSpecal()) 
                    if ( !$specal->addSpecal() ) 
                      $maj_res = false;
                }
                else if ( $param['lock'] == 'UNLOCK')
                {
                   if ( $specal->existSpecal() ) 
                     if ( !$specal->suppSpecal() )
                       $maj_res = false;
                }
            }

          }

        }

      }

      $tab_messages[] = ( $maj_res == true ? ($res->nom." =&gt; ".$message_res): ($res->nom." =&gt; "._MD_ACCESBD_KO));

  }
  else return array(0=>"Table ResManagerRes =&gt; "._MD_ACCESBD_KO);
}

return $tab_messages;

}

// initialisation des constantes
initConstante();

// globales
global $xoopsDB, $xoopsModule;

// Mise en forme
$myts 	=				&MyTextSanitizer::getInstance();


// Classes
$res = new ResManagerRes($xoopsDB);
$cat = new ResManagerCat($xoopsDB);

// En tete
xoops_cp_header();

// Ecran de saisie de type
if ( (isset($_GET['menu']) and $_GET['menu'] == "res") or !isset($_GET['menu']) or isset($_POST['update_reserv']) )
  $menu = 'res';
  
if ( (isset($_GET['menu']) and $_GET['menu'] == 'specal') or  isset($_POST['update_specal']) )
  $menu = 'specal';
  
// Menu
echo "<table width='100%' cellspacing='1' class='outer' >";
echo "<tr><td class='".($menu=='res'?'even':'odd')."'><a href='update_reserv.php?menu=res'>".($menu=='res'?'&gt; ':'')._MD_MASS_UPD_RES.($menu=='res'?' &lt;':'')."</a></td>";
echo "<td class='".($menu=='specal'?'even':'odd')."' ><a href='update_reserv.php?menu=specal'>".($menu=='specal'?'&gt; ':'')._MD_MASS_UPD_SPECAL.($menu=='specal'?' &lt;':'')."</a></td></tr>";
echo "</table><br />";

// Mise à jour du paramétrage général d'une réservation
if ( isset($_POST['update_reserv']) )
  {
    $mess_tab = update_reserv_func($_POST);
    if ( count($mess_tab) > 0 )
      affTabMessage(_MD_MASS_UPD_RES, $mess_tab);
  }
else if ( isset($_POST['update_specal'])  )
  {
    $mess_tab = update_specal_func($_POST);
    if ( count($mess_tab) > 0 )
      affTabMessage(_MD_MASS_UPD_SPECAL, $mess_tab);
  }  
// Ecran de saisie de type
if ($menu == "res")
  include "../include/update_reserv.inc.php";
else if ( $menu == "specal" )
  include "../include/update_specal.inc.php";

// Pied de page
xoops_cp_footer();

//debugSqlBloc();


?>
