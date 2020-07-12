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

// En tete
xoops_cp_header();

// Mise en forme
$myts 	=				&MyTextSanitizer::getInstance();



// Recuperation des données 
extract($_POST);

// Classe catégorie
$cat = new ResManagerCat($xoopsDB, $xoopsLogger);

// Cas Edition
if ( isset($edit) )
{
  // Valeur renvoyée par la liste
	$cat->id = $idcat;
		
	// Lecture de la catégorie
	$cat->getCat();
	
	// affectation des variables
	$nomcat 	= $cat->nom;
	$descrcat = $cat->descr;
}
// Cas sauvegarde
else if ( isset($save) )
{
	// Valeur renvoyée par la liste
  $cat->id 			= $idcat;
  $cat->descr		= $myts->oopsAddSlashes($descrcat);
  // Maj
  $cat->updateCat();
  // Retour ecran
  redirect_header("index.php",3,_MD_ENROK);
}
// Cas suppression
else if ( isset($del) )
{
  // Valeur renvoyée par la liste
  $cat->id = $idcat;
  
  // contrôler qu'aucune reservation dans la catégorie
  $res = new ResManagerRes($xoopsDB);
	$res->idcat = $idcat;
	
	if ($res->countCatRes() == 0 )
	{	  
          // Suppression
          $cat->suppCat();
          
          // Suppression des permissions
          $module_id = $xoopsModule->getVar('mid');
          xoops_groupperm_deletebymoditem ($module_id, 'CATPERM', $res->idcat);
    
          // Retour ecran
          redirect_header("index.php",3,_MD_SUPPOK);
  }
  else
    // Message erreur
    redirect_header("majcat.php",3,_MD_SUPPCATKO);
}
//  cas annuler
else if ( isset($annuler) )
{
// affectation des variables
	$nomcat 		= '';
	$descrcat 	= '';
}




// Ecran de saisie de catégorie
include '../include/majcat.inc.php';


// Pied de page
xoops_cp_footer();

//debugSqlBloc();

?>
