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
include_once("../include/functions.php");

// initialisation des constantes
initConstante();

// globales
global $xoopsDB, $xoopsModule;

// Mise en forme
$myts 	=				&MyTextSanitizer::getInstance();

// En tete
xoops_cp_header();


echo '<b>'._MD_TYPERES_QUESTION.'</b><br /><br />';

// Liste des types de réservation 
// for ($i=0;$i< count($tab_type_res);$i++)
// Afficher seulement res calendrier et simpe
for ($i=0;$i< 2;$i++)
{

  echo ' - <a href=addres.php?typeres='.$i.'>'.$tab_type_res[$i].'</a><br /><br />';
  // echo '';

}

// Pied de page
xoops_cp_footer();

?>
