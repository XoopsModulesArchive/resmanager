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

include("header.php");
include(XOOPS_ROOT_PATH."/header.php");


// Recuperation des données 
//if ( isset($_GET['op'] ) ) 
  extract($_GET,EXTR_SKIP); 
//else
//  extract($_POST);

// Gestion barre navigation
$nbenr_page = 10;

if ( ! isset($start) ) 
  {
    $start = 0;
    $dem = new ResManagerDem($xoopsDB); 
		if (checkAdmin($xoopsUser, $xoopsModule) )
  		$tab = $dem->getAllDem(0, 0);
		else
  	{
    	$dem->id_user = $xoopsUser->uid();
    	$tab = $dem->getUserDem(0, 0);
  	}
  	$total_count = count($tab);
  }
// --  
    

// Titre
if (checkAdmin($xoopsUser, $xoopsModule) )
  echo '<b>'._MD_LST_ALLDEM.'</b><br /><br />';
else
  echo '<b>'._MD_TITLE_LSTDEM.'</b><br /><br />';

// Affichage d'une liste
if ( $total_count > $nbenr_page )
{ 
  include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
  $pagenav = new XoopsPageNav($total_count, $nbenr_page, $start, 'start', 'total_count='.$total_count);
  echo $pagenav->renderNav()."<br />";
}
// --

// Liste des demandes
$dem = new ResManagerDem($xoopsDB, $xoopsLogger);

// Tableau
echo '<table width="100%" cellspacing="1" class="outer">';
echo '<tr>';
echo '<th>'._MD_TITLE_TABDEM1.'</th>';
echo '<th>'._MD_TITLE_TABDEM2.'</th>';
echo '<th>'._MD_TITLE_TABDEM3.'</th>';
echo '<th>'._MD_TITLE_TABDEM4.'</th>';
if ( checkAdmin($xoopsUser, $xoopsModule) )  echo '<th>'._MD_TITLE_TABDEM5.'</th>';
echo '<th>'._MD_TITLE_TABDEM6.'</th>';
echo '<th>'._MD_TITLE_TABDEM7.'</th>';
echo '</tr>';

// Administrateur ==> toutes les demandes 
// user           ==> ses demandes
if (checkAdmin($xoopsUser, $xoopsModule) )
  $tab = $dem->getAllDem($start, $nbenr_page);
else
  {
    $dem->id_user = $xoopsUser->uid();
    $tab = $dem->getUserDem($start, $nbenr_page);
  }


if ( $tab )
{
 for ($i=0;$i<count($tab);$i++)
 {
   // Différencier ligne pair et impair
   echo '<tr class='.(($i%2)==0?'odd':'even').'>';  
   echo '<td>'.$tab[$i]['id_dem'].'</td>';
   echo '<td>'.date('d/m/y',$tab[$i]['date_dem']).'</td>';
   echo '<td>'.$tab[$i]['nom_cat'].'</td>';
   echo '<td>'.$tab[$i]['nom_reserv'].'</td>';
   if ( checkAdmin($xoopsUser, $xoopsModule) ) echo '<td>'.$tab[$i]['uname'].'</td>';
   //echo '<td>'.$tab_etat_dem[$tab[$i]['status_dem']].'</td>';
   echo '<td>'.affImage($tab_etat_dem_img[$tab[$i]['status_dem']]).'</td>';
   
   if ($tab[$i]['type_reserv'] ==  RES_CALENDRIER)
     echo '<td>'.'<a href=edit_demcal.php?op=detail&appel=lst_dem.php&iddem='.$tab[$i]['id_dem'].'>'._MD_DETAIL.'</a></td>';    
   else
     echo '<td>'.'<a href=edit_dem.php?op=detail&appel=lst_dem.php&iddem='.$tab[$i]['id_dem'].'>'._MD_DETAIL.'</a></td>';
	
	 echo '</tr>';
 }
}

echo '</table>';
  
include(XOOPS_ROOT_PATH."/footer.php");

?>
