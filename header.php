<?php
// $Id: header.php,v 1.4 2005/01/07 23:04:07 loudo Exp $
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

include "../../mainfile.php";
include "include/functions.php";
include "update_funcs.php";

// initialisation des constantes
initConstante();

// Upgrade
if ( ! resmanager_to_025() )
  echo _MD_ACCESBD_KO;

if ( ! resmanager_to_052() )
  echo _MD_ACCESBD_KO;
  
if ( !resmanager_to_053() )
  echo _MD_ACCESBD_KO;

// Variables globales xoops utiles
global $xoopsUser, $xoopsModule, $xoopsLogger;

// classes
include 'class/ResManagerRes.class.php';
include 'class/ResManagerCat.class.php';
include 'class/ResManagerDem.class.php';
include 'class/ResManagerDemcal.class.php';
include 'class/ResManagerCal.class.php';
include 'class/ResManagerSpecal.class.php';
include 'class/ResManagerInfores.class.php';

// Mise en forme
$myts =	&MyTextSanitizer::getInstance();


?>
