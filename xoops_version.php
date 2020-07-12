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

$modversion['name'] = _MI_RESMANAGER_NAME;
$modversion['version'] = "1.2";
$modversion['description'] = _MI_RESMANAGER_DESC;
$modversion['credits'] = "Credits";
$modversion['author'] = "Loudo";
$modversion['help'] = "http://loudo.agora-system.com";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "logo_resmanager1.jpg";
$modversion['dirname'] = "resmanager";

// bd
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][0] = 'resman_categorie';
$modversion['tables'][1] = 'resman_reservation';
$modversion['tables'][2] = 'resman_demande';
$modversion['tables'][3] = 'resman_cal';
$modversion['tables'][4] = 'resman_demcal';
$modversion['tables'][5] = 'resman_specal';
$modversion['tables'][6] = 'resman_infores';
$modversion['tables'][7] = 'resman_val_infores';

//Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Option détail catégorie
$modversion['config'][1]['name'] = 'detailcat';
$modversion['config'][1]['title'] = '_MI_DETAILCAT';
$modversion['config'][1]['description'] = '_MI_DETAILCATDESC';
$modversion['config'][1]['formtype'] = 'yesno';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = '0';

// Longueur max image
$modversion['config'][2]['name'] = 'max_imgheight';
$modversion['config'][2]['title'] = '_MI_MAX_HEIGHT';
$modversion['config'][2]['description'] = '_MI_DESC_MAXHEIGHT';
$modversion['config'][2]['formtype'] = 'textbox';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = '1024';

// Largeur max image
$modversion['config'][3]['name'] = 'max_imgwidth';
$modversion['config'][3]['title'] = '_MI_MAX_WIDTH';
$modversion['config'][3]['description'] = '_MI_DESC_MAXWIDTH';
$modversion['config'][3]['formtype'] = 'textbox';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = '1024';

// Taille en ko de l'image
$modversion['config'][4]['name'] = 'max_imgsize';
$modversion['config'][4]['title'] = '_MI_MAX_SIZE';
$modversion['config'][4]['description'] = '_MI_DESC_MAXSIZE';
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'int';
$modversion['config'][4]['default'] = '100000';

// Menu
$modversion['hasMain'] = 1;

$modversion['sub'][1]['name'] = _MI_RESMANAGER_SUBMENU1;
$modversion['sub'][1]['url'] = "make_dem.php?op=lstcat";
$modversion['sub'][2]['name'] = _MI_RESMANAGER_SUBMENU2;
$modversion['sub'][2]['url'] = "lst_dem.php";

// Blocks
$modversion['blocks'][1]['file'] = "resmanager_block1.php";
$modversion['blocks'][1]['name'] = _MI_MYMODULE_BNAME1." 1";
$modversion['blocks'][1]['description'] = _MI_MYMODULE_DESCR_BNAME1;
$modversion['blocks'][1]['show_func'] = "b_resmanager_show"; // fonction affichage du bloc
$modversion['blocks'][1]['edit_func'] = "b_resmanager_edit"; // fonction édition options du bloc
$modversion['blocks'][1]['options'] = "9|17|1|popup"; // options (séparation par | si plusieurs)
$modversion['blocks'][1]['template'] = 'resmanager_block1.html';

$modversion['templates'][2]['file'] = "accueil.html";
$modversion['templates'][2]['description'] = "accueil";

// Notification
$modversion['hasNotification'] = 1;

$modversion['notification']['category'][1]['name'] = 'suividem';
$modversion['notification']['category'][1]['title'] = _MI_RESMAN_SUIVIDEM_NOTIFY;
$modversion['notification']['category'][1]['description'] = _MI_RESMAN_SUIVIDEM_NOTIFYDSC;
$modversion['notification']['category'][1]['subscribe_from'] = '';
$modversion['notification']['category'][1]['item_name'] = 'iddem';
$modversion['notification']['category'][1]['allow_bookmark'] = 0;

$modversion['notification']['event'][1]['name'] = 'new_dem';
$modversion['notification']['event'][1]['category'] = 'suividem';
$modversion['notification']['event'][1]['title'] = _MI_RESMAN_SUIVIDEM_NEWDEM_NOTIFY;
$modversion['notification']['event'][1]['caption'] = _MI_RESMAN_SUIVIDEM_NEWDEM_NOTIFYCAP;
$modversion['notification']['event'][1]['description'] = _MI_RESMAN_SUIVIDEM_NEWDEM_NOTIFYDSC;
$modversion['notification']['event'][1]['mail_template'] = 'suividem_newdem_notify';
$modversion['notification']['event'][1]['mail_subject'] = _MI_RESMAN_SUIVIDEM_NEWDEM_NOTIFYSBJ;

$modversion['notification']['event'][3]['name'] = 'val_dem';
$modversion['notification']['event'][3]['category'] = 'suividem';
$modversion['notification']['event'][3]['title'] = _MI_RESMAN_SUIVIDEM_VALDEM_NOTIFY;
$modversion['notification']['event'][3]['caption'] = _MI_RESMAN_SUIVIDEM_VALDEM_NOTIFYCAP;
$modversion['notification']['event'][3]['description'] = _MI_RESMAN_SUIVIDEM_VALDEM_NOTIFYDSC;
$modversion['notification']['event'][3]['mail_template'] = 'suividem_valdem_notify';
$modversion['notification']['event'][3]['mail_subject'] = _MI_RESMAN_SUIVIDEM_VALDEM_NOTIFYSBJ;

$modversion['notification']['event'][4]['name'] = 'ref_dem';
$modversion['notification']['event'][4]['category'] = 'suividem';
$modversion['notification']['event'][4]['title'] = _MI_RESMAN_SUIVIDEM_REFDEM_NOTIFY;
$modversion['notification']['event'][4]['caption'] = _MI_RESMAN_SUIVIDEM_REFDEM_NOTIFYCAP;
$modversion['notification']['event'][4]['description'] = _MI_RESMAN_SUIVIDEM_REFDEM_NOTIFYDSC;
$modversion['notification']['event'][4]['mail_template'] = 'suividem_refdem_notify';
$modversion['notification']['event'][4]['mail_subject'] = _MI_RESMAN_SUIVIDEM_REFDEM_NOTIFYSBJ;

$modversion['notification']['event'][5]['name'] = 'ann_dem';
$modversion['notification']['event'][5]['category'] = 'suividem';
$modversion['notification']['event'][5]['title'] = _MI_RESMAN_SUIVIDEM_ANNDEM_NOTIFY;
$modversion['notification']['event'][5]['caption'] = _MI_RESMAN_SUIVIDEM_ANNDEM_NOTIFYCAP;
$modversion['notification']['event'][5]['description'] = _MI_RESMAN_SUIVIDEM_ANNDEM_NOTIFYDSC;
$modversion['notification']['event'][5]['mail_template'] = 'suividem_anndem_notify';
$modversion['notification']['event'][5]['mail_subject'] = _MI_RESMAN_SUIVIDEM_ANNDEM_NOTIFYSBJ;

$modversion['notification']['category'][2]['name'] = 'suivires';
$modversion['notification']['category'][2]['title'] = _MI_RESMAN_SUIVIRES_NOTIFY;
$modversion['notification']['category'][2]['description'] = _MI_RESMAN_SUIVIRES_NOTIFYDSC;
$modversion['notification']['category'][2]['subscribe_from'] = '';
$modversion['notification']['category'][2]['item_name'] = 'idres';
$modversion['notification']['category'][2]['allow_bookmark'] = 0;

$modversion['notification']['event'][2]['name'] = 'new_userdem';
$modversion['notification']['event'][2]['category'] = 'suivires';
$modversion['notification']['event'][2]['title'] = _MI_RESMAN_SUIVIRES_USERDEM_NOTIFY;
$modversion['notification']['event'][2]['caption'] = _MI_RESMAN_SUIVIRES_USERDEM_NOTIFYCAP;
$modversion['notification']['event'][2]['description'] = _MI_RESMAN_SUIVIRES_USERDEM_NOTIFYDSC;
$modversion['notification']['event'][2]['mail_template'] = 'suivires_userdem_notify';
$modversion['notification']['event'][2]['mail_subject'] = _MI_RESMAN_SUIVIRES_USERDEM_NOTIFYSBJ;

$modversion['notification']['event'][6]['name'] = 'ann_userdem';
$modversion['notification']['event'][6]['category'] = 'suivires';
$modversion['notification']['event'][6]['title'] = _MI_RESMAN_SUIVIRES_ANNDEM_NOTIFY;
$modversion['notification']['event'][6]['caption'] = _MI_RESMAN_SUIVIRES_ANNDEM_NOTIFYCAP;
$modversion['notification']['event'][6]['description'] = _MI_RESMAN_SUIVIRES_ANNDEM_NOTIFYDSC;
$modversion['notification']['event'][6]['mail_template'] = 'suivires_anndem_notify';
$modversion['notification']['event'][6]['mail_subject'] = _MI_RESMAN_SUIVIRES_ANNDEM_NOTIFYSBJ;
?>

