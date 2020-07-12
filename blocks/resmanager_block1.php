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
	
	// TODO ajouter le lien vers la réservation 
	include(XOOPS_ROOT_PATH."/modules/resmanager/include/functions.php");
	include(XOOPS_ROOT_PATH."/modules/resmanager/class/ResManagerSpecal.class.php");
	include(XOOPS_ROOT_PATH."/modules/resmanager/class/ResManagerDemcal.class.php");
	include(XOOPS_ROOT_PATH."/modules/resmanager/class/ResManagerCat.class.php");	
	include(XOOPS_ROOT_PATH."/modules/resmanager/update_funcs.php");
	
	// Upgrade
	resmanager_to_025();
		
	
	function lienHoraireBlock1( $res, $cal_day, $cal_month, $cal_year, $heure, $appel)
	{
  		$chaine = "";
  		$chaine = $chaine.XOOPS_URL."/modules/resmanager/make_demcal.php?";
  		$chaine = $chaine."id_res=".$res;
  		$chaine = $chaine."&cal_day=".$cal_day;
  		$chaine = $chaine."&cal_month=".$cal_month;
  		$chaine = $chaine."&cal_year=".$cal_year;
  		$chaine = $chaine."&cal_heure=".$heure;
  		$chaine = $chaine."&op=selection";
		$chaine = $chaine."&appel_mkdem=".$appel;
		
  
  		return $chaine; 
	}
		
    // fonction pour l’affichage
    function b_resmanager_show ($options) 
	{
		
          global $xoopsDB;
          global $tab_heure;
          global $xoopsUser;
  
          initConstante();
          
          $myts =& MyTextSanitizer::getInstance();
                                                  
          // Date du jour
          $date_jour 			= getdate();
          $cal_year	 	= $date_jour['year'];
          $cal_day 		= $date_jour['mday'];
          $cal_month 		= $date_jour['mon'];  
          // --
  
          // Classe Specal => fermeture spécifiques d'une réservation
          $specal = new ResManagerSpecal($xoopsDB);
          $specal->year 		= $cal_year;
          $specal->month 		= $cal_month;
          $specal->day 		= $cal_day;
          
          if (!isset($options[0]) or empty($options[0]) ) 
          {
                  $heure_deb = 9;
                  $heure_fin = 17;			
          }
          else
                  $heure_deb = $options[0];
  
          if (!isset($options[1]) or empty($options[1]) ) 
          {
                  $heure_deb = 9;
                  $heure_fin = 17;			
          }
          else
                  $heure_fin = $options[1];
          
          // Proposer seulement les heures à venir
          if ($heure_deb < $date_jour['hours'])
            $heure_deb = $date_jour['hours'];
  
          // Si l'heure de fin supérieur à l'heure actuelle 
          // Alors affichage du lendemain
          if ($heure_fin < $date_jour['hours']) 
          {
                  $lendemain = getdate(mktime(0,0,0,$cal_month, $cal_day+1, $cal_year));
                  $cal_year	 	= $lendemain['year'];
                  $cal_day 		= $lendemain['mday'];
                  $cal_month 		= $lendemain['mon'];  
                  $specal->year 		= $cal_year;
                  $specal->month 		= $cal_month;
                  $specal->day 		= $cal_day;
                  
                  if (!isset($options[0]) or empty($options[0]) ) 
                  {
                          $heure_deb = 9;
                          $heure_fin = 17;			
                  }
                  else
                          $heure_deb = $options[0];
  
                  if (!isset($options[1]) or empty($options[1]) ) 
                  {
                          $heure_deb = 9;
                          $heure_fin = 17;			
                  }
                  else
                          $heure_fin = $options[1];
  
                                          
          }		
          
          // Lecture de l'ensemble des catégories
          $allcat = new ResManagerCat($xoopsDB);
          $tab_cat = $allcat->getAllCat();
          
          $tab_time = $specal->getTabTime($heure_deb,$heure_fin, $options[2]);
          // --
  
          // Liste des utilisateurs ayant fait une demande
          $demcal = new ResManagerDemcal($xoopsDB);
          $demcal->year = $cal_year;
          $demcal->month = $cal_month;
          $demcal->day = $cal_day;
          $tab_dem = $demcal->getTabDemTimeAllRes();		// Liste des demandes
          $tab_dem_res 	= array();											// Liste user ayant fait une demande
          $liste = "";
  
          // Mise en forme d'un tableau indexé sur réservation et heure
          $rup_res 		= null;
          $rup_heure 	= null;
          
          if ($tab_dem) 
          {
          
          for ($i=0; $i<count($tab_dem); $i++)
          {
                  if (($rup_res != $tab_dem[$i]['id_reserv_dem'] and $rup_res != null) or 
                     ($rup_heure != $tab_dem[$i]['time_demcal'] and $rup_heure != null))
                  {
                          $tab_dem_res[$rup_res][$rup_heure] = $liste;
                          $liste = "";
                  }
  
                  $rup_res = $tab_dem[$i]['id_reserv_dem'];
                  $rup_heure = $tab_dem[$i]['time_demcal'];		
  
                  // En fonction du paramétrage affichage d'un lien pour voir les demandes ou 
                  // affichage du premier commentaire ou affichage du premier user
                  if ( $options[3] == "popup" )
                  {
                          $user = new XoopsUser();
                          $liste .= "<tr class=even ><td>".$user->getUnameFromId($tab_dem[$i]['id_user_dem'])."</td>".
                                                                  "<td>".$tab_dem[$i]['id_dem']."</td>".
                                                                  "<td>".$myts->oopsHtmlSpecialChars($tab_dem[$i]['comm_dem'])."</td></tr>";
                  }
                  else if ( $options[3] == "comment" )
                  {
                    if ( empty($liste) )
                      $liste .= "<font size=1>".$myts->oopsHtmlSpecialChars(substr($tab_dem[$i]['comm_dem'],0,30))."</font>";
            }
            else if ( $options[3] == "user" )
            {
                  if ( empty($liste) )
                    $liste .= xoops_getLinkedUnameFromId($tab_dem[$i]['id_user_dem']);
                  
            }
                  
          }		
  
          $tab_dem_res[$rup_res][$rup_heure] = $liste;
          }
          // --    
          
          $block = array();
          //$myts =& MyTextSanitizer::getInstance();
          
          $message ="";
          
          $appel = "edit_day_cat.php?".
          "minical_month=".$cal_month.
          "&minical_year=".$cal_year.
          "&heure_deb=".$heure_deb.
          "&heure_fin=".$heure_fin.
          "&id_cat=".$options[2].
          "&cal_day=".$cal_day.
          "&cal_month=".$cal_month.
          "&cal_year=".$cal_year.
          "&typeaff=".$options[3];	
  
  
  
          $message .= "<div align=center>".affDate($cal_year, $cal_month, $cal_day)."</div>";
  
          // Affichage d'une sélection des catégories			
          // $message.= "<div align=center><h4>".$cat['nom_cat']."</h4></div>";
          // liste des catégories
          $lst_cat = "<div align=center><select name=categorie value=".$heure_deb." onchange=\"location='";
          $lst_cat .= XOOPS_URL."/modules/resmanager/edit_day_cat.php?minical_month=".$cal_month;
          $lst_cat .= "&minical_year=".$cal_year;
          $lst_cat .= "&heure_deb=".$heure_deb;		 
          $lst_cat .= "&cal_day=".$cal_day;
          $lst_cat .= "&cal_month=".$cal_month;		 
          $lst_cat .= "&cal_year=".$cal_year;		 		 
          $lst_cat .= "&typeaff=".$options[3];
          $lst_cat .= "&heure_fin=".$heure_fin;
          $lst_cat .= "&id_cat='+this.options[this.selectedIndex].value \" >";							

  
          
          foreach ($tab_cat as $key=>$acat)
          {

            if ($key == $options[2] )
              $lst_cat .= "<option selected value=".$key." > ".$acat." </option>";
            else
              $lst_cat .= "<option value=".$key." > ".$acat." </option>";
         
          }
          
          $lst_cat .= "</select></div>";
          $message .= $lst_cat;
          // -- 
          
          if (!empty($tab_time))
          { 
          foreach ( $tab_time as $cat )
          {
  
                  // Liste heure début
                  $lst_heure = _MD_HEURE_DEB." : <select name=heure_deb value=".$heure_deb." onchange=\"location='";
                  $lst_heure .= XOOPS_URL."/modules/resmanager/edit_day_cat.php?minical_month=".$cal_month;
                  $lst_heure .= "&minical_year=".$cal_year;
                  $lst_heure .= "&heure_fin=".$heure_fin;		 
                  $lst_heure .= "&id_cat=".$options[2];
                  $lst_heure .= "&cal_day=".$cal_day;
                  $lst_heure .= "&cal_month=".$cal_month;		 
                  $lst_heure .= "&cal_year=".$cal_year;
                  $lst_heure .= "&typeaff=".$options[3];		 		 
                  $lst_heure .= "&heure_deb='+this.options[this.selectedIndex].value \">";	
                  foreach ($tab_heure as $heure)
                  {
                  if ($heure == $options[0] )
                  $lst_heure .= "<option selected value=".$heure." > ".$heure." </option>";
                  else
                  $lst_heure .= "<option value=".$heure." > ".$heure." </option>";
                  }
                  $lst_heure .= "</select>";
                  $message .= $lst_heure;
                  // --
  
                  // Liste heure fin
                  $lst_heure = _MD_HEURE_FIN." : <select name=heure_deb value=".$heure_deb." onchange=\"location='";
                  $lst_heure .= XOOPS_URL."/modules/resmanager/edit_day_cat.php?minical_month=".$cal_month;
                  $lst_heure .= "&minical_year=".$cal_year;
                  $lst_heure .= "&heure_deb=".$heure_deb;		 
                  $lst_heure .= "&id_cat=".$options[2];
                  $lst_heure .= "&cal_day=".$cal_day;
                  $lst_heure .= "&cal_month=".$cal_month;		 
                  $lst_heure .= "&cal_year=".$cal_year;		 		 
                  $lst_heure .= "&typeaff=".$options[3];
                  $lst_heure .= "&heure_fin='+this.options[this.selectedIndex].value \">";	
                  foreach ($tab_heure as $heure)
                  if ($heure == $options[1] )
                  $lst_heure .= "<option selected value=".$heure." > ".$heure." </option>";
                  else
                  $lst_heure .= "<option value=".$heure." > ".$heure." </option>";
                  $lst_heure .= "</select>";
                  $message .= $lst_heure;
                  // -- 
  
                  $message.= '<table cellspacing="1" class="outer" width=100%>';
          
                  $first = true;
                  $i = 0;
                  
                  foreach($cat['time'] as $key=>$time)
                  {
                          if ($first) 
                          {
                                  // Nom réservation
                                  $first = false;
                                  $message .= "<tr class=even><td></td>";
                                  foreach ($time['res'] as $keyres=>$res)
                                  {
                              // $retour = "../../index.php";
                                          // $retour = $_SERVER['PHP_SELF'];
                                          $lien = XOOPS_URL."/modules/resmanager/edit_day.php?id_reserv=".$keyres."&appel=".magicUrl($appel).
                                                            "&cal_year=".$cal_year."&cal_month=".$cal_month."&cal_day=".$cal_day;
                                          $message.= "<td align=center ><a href=".$lien.">".$res['nom_res']."</a></td>";
                                  }
                                  $message .= "</tr>";
                                  $i++;
                          }
                  
                          $message.= "<tr class=".(($i%2)==0?'even':'odd').">";
                          $message .= "<td ><b>".$key." "._MB_RESMANAGER_HEURE."</b></td>";	
                  
                          foreach ($time['res'] as $keyres=>$res)
                          {	
  
                                  
                                  $lien = lienHoraireBlock1($keyres, $cal_day, $cal_month, $cal_year,$key, magicUrl($appel));
                                  $message .= "<td align=center valign=top height=40 >".($res['status']==0?affImage("full.png"):lienImage("ok_bouton.gif", $lien));
                            // Affichage sous le dessin en fonction du paramétrage
                            if (!empty($tab_dem_res[$keyres][$key]) and is_object($xoopsUser) and $options[3] == "popup")
                              $message .= "<br /><a href='#' onclick='javascript:openWithSelfMain(\"".XOOPS_URL."/modules/resmanager/aff_fen_lstdem.php?message=".$tab_dem_res[$keyres][$key]."\",\"\",400,200);'>"._MD_SEE."</a></td>";
                            else if ( !empty($tab_dem_res[$keyres][$key]) and ( $options[3] == "comment" or $options[3] == "user") and is_object($xoopsUser)  )
                              $message .= "<br />".$tab_dem_res[$keyres][$key]."</td>";
                            
                          }	
                          $message .= "</tr>";
                          $i++;
                  }
                  
                  
                  $message .= " </table>"; 		
          }
          }
          
          $lien_edit_day_cat = XOOPS_URL."/modules/resmanager/edit_day_cat.php";
          $extra = 	"&id_cat=".$options[2].
                                  "&heure_deb=".$heure_deb.
                                  "&heure_fin=".$heure_fin.
                                  "&minical_year=".$cal_year.
                                  "&minical_month=".$cal_month.
                                  "&typeaff=".$options[3];
          
          $minical_year_prev 	= $cal_month<=3?$cal_year-1:$cal_year;
          $minical_month_prev = $cal_month<=3?9+$cal_month:$cal_month-3;
          
          $minical_year_next 	= $cal_month>9?$cal_year+1:$cal_year;
          $minical_month_next = $cal_month>9?$cal_month-9:$cal_month+3;
  
          $lien_prev = 			$lien_edit_day_cat."?".
                  "minical_month=".$minical_month_prev.
                                                                                  "&minical_year=".$minical_year_prev.
                                                                                  "&heure_deb=".$heure_deb.
                                                                                  "&heure_fin=".$heure_fin.
                                                                                  "&id_cat=".$options[2].
                                                                                  "&typeaff=".$options[3];
                                   
          $lien_next = 	$lien_edit_day_cat."?".
                          "minical_month=".$minical_month_next.
                                                                  "&minical_year=".$minical_year_next.
                                                                  "&heure_deb=".$heure_deb.
                                                                  "&heure_fin=".$heure_fin.
                                                                  "&id_cat=".$options[2].
                                                                  "&typeaff=".$options[3];
          
          $message .= "<table width=100% >";
          $message .= "<tr>";
                          
          $message .= "<td>";		
          $message .= creMinical($cal_year, $cal_month,$lien_edit_day_cat,$extra, $lien_prev, null);
          $message .= "</td>";
          $message .= "<td align=center>";		
          $message .= creMinical($cal_month==12?$cal_year+1:$cal_year, 
                                                     $cal_month==12?1:$cal_month+1,
                                                     $lien_edit_day_cat,$extra, null, null
                                                     );
          $message .= "</td>";
          $message .= "<td align=right>";
          $message .= creMinical($cal_month>=11?$cal_year+1:$cal_year, 
                                                     ($cal_month>=11?($cal_month-10):$cal_month+2),
                                                     $lien_edit_day_cat,$extra, null, $lien_next
                                                     );
                                                     
          $message .= "</td>";
          
          $message .= "</table>";
          
          // Initialisation session
          unset($_SESSION['tab_horaire_sel']);
			
          $block['resmanager']['message'] = $message;
		
	  return $block;
    
    }

    // fonction édition option
    function b_resmanager_edit($options) 
		{
		global $xoopsDB;
		$cat = new ResManagercat($xoopsDB);

		// Type affichage		
		$type_aff = array();
		$type_aff["popup"] 		= _MB_RESMANAGER_POPUP;
		$type_aff["comment"] 	= _MB_RESMANAGER_COMM;
		$type_aff["user"]			= _MB_RESMANAGER_USER;
			
		$form = "";
		$form .= _MB_RESMANAGER_HEURE_DEB." : <input type=text name=options[] value=".$options[0].">";
		$form .= "<br />"._MB_RESMANAGER_HEURE_FIN." : <input type=text name=options[] value=".$options[1].">";
		$form .= "<br />"._MB_RESMANAGER_CAT." : ".affListe("options[]",$cat->getAllCat(), isset($options[2])?$options[2]:1); 
	  $form .= "<br />"._MB_RESMANAGER_TYPEAFF_BLOCK." : ".affListe("options[]",$type_aff, isset($options[3])?$options[3]:"popup"); 
	  
    return $form;
    }

?>
