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

// différents include
include_once("../class/ResManagerStmt.class.php");
include_once("../include/functions.php");
initconstante();

include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include_once XOOPS_ROOT_PATH."/include/xoopscodes.php";
include_once XOOPS_ROOT_PATH.'/class/module.errorhandler.php';

// http://www.xoops.org/misc/api/kernel/core/MyTextSanitizer.html
// http://www.xoops.org/misc/api/kernel/core/ErrorHandler.html
$myts 	=				&MyTextSanitizer::getInstance();
$eh 		= 			new ErrorHandler();

// fonction ayant obligatoirement le nom de votre module
// c'est elle qui sera affichée par défaut lors du click sur l'icône du module
function resmanager()
{
	global $xoopsDB, $xoopsModule, $tab_type_res;
	xoops_cp_header();

	// Titre Menu
	echo "<b>"._MD_TITLE."</b><br /><br />";

	// Menu
  echo " - <a href='addcat.php'>"._MD_MENU2."</a><br />";
  echo " - <a href='majcat.php'>"._MD_MENU3."</a><br /><br />";
  
  echo " - "._MD_MENU4." : <a href='addres.php?typeres=0' >".$tab_type_res[0]."</a>".
                       " / <a href='addres.php?typeres=1' >".$tab_type_res[1]."</a><br />";
                       
  echo " - <a href='majres.php'>"._MD_MENU5."</a><br />";
  echo " - <a href='update_reserv.php'>"._MD_MENU6."</a><br /><br />";
	echo " - <a href='droits.php'>"._MD_MENU1."</a><br />";
  echo " - <a href='../../system/admin.php?fct=preferences&op=showmod&mod=".getmoduleid("resmanager")."' >"._PREFERENCES."</a><br />";
	echo "<br />";
	
	xoops_cp_footer();
}

// Affichage menu
resmanager();


?>
