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

// Template
$xoopsOption['template_main'] = "accueil.html";

// Variable contenant les données à afficher dans le template
$contenu_page = array();

// Titres
$contenu_page[0]['title'] = _MD_ACCEUIL1;
$contenu_page[1]['title'] = _MD_ACCEUIL2;
$contenu_page[2]['title'] = _MD_ACCEUIL3;
$contenu_page[3]['title'] = _MD_ACCEUIL4;

// Menu
$contenu_page[0]['lines'][0] = "<a 
href='".XOOPS_URL."/modules/resmanager/make_dem.php?op=lstcat' 
>"._MD_RESMANAGER_SUBMENU1."</a>";
$contenu_page[0]['lines'][1] = "<a 
href='".XOOPS_URL."/modules/resmanager/lst_dem.php' 
>"._MD_RESMANAGER_SUBMENU2."</a>";

// Dernière réservation calendrier
$res = new ResManagerRes($xoopsDB);
$tabres_cal = $res->getLastResCal();
$contenu_page[1]['lines'] = $tabres_cal;


// Dernière réservation uniques
$tabres_unique = $res->getLastResUnique();
$contenu_page[2]['lines'] = $tabres_unique;

// Liste des demandes de l'utilisateur
$dem = new ResManagerDem($xoopsDB);

if (checkAdmin($xoopsUser, $xoopsModule) )
  $tab_dem = $dem->getAllDem(0, 5);
else if ( $xoopsUser )
  {
    $dem->id_user = $xoopsUser->uid();
    $tab_dem = $dem->getUserDem(0, 5);
  }
  
// Mise en forme du statut demande
for($i=0;$i<count($tab_dem);$i++)
{  
  $img= affImage($tab_etat_dem_img[$tab_dem[$i]['status_dem']]);
  $tab_dem[$i]['status_dem']  = $img;
}

$contenu_page[3]['lines'] = $tab_dem;

// Affectation variable
$xoopsTpl->assign('contenu_page', $contenu_page);
$xoopsTpl->assign('lang_suite', _MD_SUITE);
$xoopsTpl->assign('res_cal', RES_CALENDRIER);
$xoopsTpl->assign('res_unique', RES_UNIQUE);


include(XOOPS_ROOT_PATH."/footer.php");
?>
