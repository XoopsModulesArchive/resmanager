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

include_once(XOOPS_ROOT_PATH."/class/uploader.php");
include_once("../class/ResManagerCat.class.php");
include_once("../include/functions.php");


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
// cas ajout
if (isset($add)) {
    // Ajout de la catégorie
    $cat->nom = $myts->oopsAddSlashes($nomcat);
    $cat->descr = $myts->oopsAddSlashes($descrcat);

    // Fichier à télécharger
    $field = $_POST["xoops_upload_file"][0] ;
    
    if ( ( $img_upload = uploadImage($field, $xoopsModuleConfig, $_FILES) ) )
    {
      
      if (!$cat->addCat()) 
      {
        // Mise en forme pour affichage
        $nomcat = $myts->previewTarea($nomcat);
        $descrcat = $myts->previewTarea($descrcat);
        
      } 
      else 
      {
        $nomcat = $myts->previewTarea($nomcat);
        $descrcat = $myts->previewTarea($descrcat); 
       
        // Renommage par rapport au nom de la catégorie
        // Mise à jour dans la table si chargement effectué
        if ( $img_upload != 'warning_upload_20' &&   $img_upload != 'warning_upload_10' )
        {
          $ext = preg_replace( "/^.+\.([^.]+)$/sU" , "\\1" , $img_upload);
          $img_dir = XOOPS_ROOT_PATH . "/modules/resmanager/images/";
          rename($img_dir.$img_upload, $img_dir.'cat'.$cat->id.'.'.$ext);
          $cat->img = 'cat'.$cat->id.'.'.$ext;
          $cat->updateImgCat();
        }
        
        // Insertion ok redirection sur cette page
        redirect_header("index.php", 3, _MD_ADDOK);
      }  
    }
    else
    {
      // Affichage message erreur
      xoops_error(_MD_UPLOAD_ERROR);
      
      // Mise en forme pour affichage
      $nomcat = $myts->previewTarea($nomcat);
      $descrcat = $myts->previewTarea($descrcat);
      
    }
} 



// Ecran de saisie de type
include '../include/addcat.inc.php';

// Pied de page
xoops_cp_footer();

?>
