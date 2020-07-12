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

// TODO Avant de bloquer v�rifier qu'il n'y a pas d�j� des demandes valid�es
// TODO avant de valider une sp�cificit� v�rifier que l'heure n'est pas en dehors de la fourchette
// TODO avant de valider une journ�e v�rifier que la journ�e n'est pas d�j� bloqu�e par le param�trage $cal

include("header.php");
include(XOOPS_ROOT_PATH."/header.php");

function lienRetour($res, $year, $month, $day, $appel )
{
  $chaine = "";
  $chaine = $chaine."edit_day.php?";
  $chaine = $chaine."id_reserv=".$res;
  $chaine = $chaine."&cal_day=".$day;
  $chaine = $chaine."&cal_month=".$month;
  $chaine = $chaine."&cal_year=".$year;
  $chaine = $chaine."&appel=".$appel;

  return $chaine; 
}


// S�curisation de la page
securePage($xoopsUser, $xoopsModule);

// r�cup�ration des donn�es
extract($_GET);

// Lien retour
$retour = lienRetour($id_res, $year_r, $month_r, $day_r, $appel);

// R�servation 
$res = new ResManagerRes($xoopsDB);
$res->id = $id_res;

// R�servation inconnue
if (!isset($id_res) or !$res->getReserv())
  redirect_header($retour,3,_MD_RES_INCONNU);

// All res
if ( isset($allres) )
{
  $cat = new ResManagerCat($xoopsDB);
  $cat->id = $res->idcat;
  $lst_res = $cat->getAllResOfCat();
  
}
// A reservation
else 
{
  $lst_res[0] = $id_res; 
}

// Suivi erreur
$err_specal = 0;

// Balayage du tableau
for ($i=0; $i < count($lst_res);$i++)
{

  $year 	= (isset($year)  ?$year:null);
  $month 	= (isset($month) ?$month:null);
  $day 		= (isset($day)	 ?$day:null);
  $time 	= (isset($time)	 ?$time:null);  

  $specal       = new ResManagerSpecal($xoopsDB);
  $specal->id_reserv 	        = $lst_res[$i];
  $specal->year 		= $year;
  $specal->month 		= $month;
  $specal->day 			= $day;
  $specal->time 		= $time;
  
  switch( $op )
  {
  // Ajout
  case "add" :
  
    if (!$specal->existSpecal()) 
      if ( !$specal->addSpecal() ) 
        $err_specal = $err_specal + 1;

  break;
  
  // Suppression
  case "del" :
  
  if ( $specal->existSpecal() ) 
    if ( !$specal->suppSpecal() )
      $err_specal = $err_specal + 1;
      
  break;
  
  // d�fault
  default :
    // Code op�ration invalide
    redirect_header($retour,3,_MD_OPERATION_INCONNUE);
  break;
           
  }

}

if ( $err_specal == 0 and $op == "add")
  redirect_header($retour,3,_MD_SPEC_OK);                

if ( $err_specal == 0 and $op == "del")
  redirect_header($retour,3,_MD_SPEC_DEL_OK);

if ( $err_specal > 0 )
  redirect_header($retour,3,_MD_ACCESBD_KO);                   

//debugSqlBloc();

// Pied de page
include(XOOPS_ROOT_PATH."/footer.php");

?>
