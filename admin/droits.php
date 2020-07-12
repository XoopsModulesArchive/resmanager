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

// Gestion des groupes
include_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';
include '../class/ResManagerCat.class.php';

// globales
global $xoopsDB, $xoopsModule;

// Mise en forme
$myts 	=				&MyTextSanitizer::getInstance();

// En tete
xoops_cp_header();

// Id du module
$module_id = $xoopsModule->getVar('mid');

// Liste des catégories
$cat            = new ResmanagerCat($xoopsDB);
$item_list      = $cat->getAllCat();

// Mise en forme écran
$form = new XoopsGroupPermForm(_MD_PERM_TITLE, $module_id, 'CATPERM', _MD_PERM_DESC);

foreach ($item_list as $item_id => $item_name) 
{
  $form->addItem($item_id, $item_name);
}


echo $form->render(); 


// Pied de page
xoops_cp_footer();

?>
