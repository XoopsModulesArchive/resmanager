<?php
function affHeureJournee($lib_heure_deb, $heure_deb, $lib_heure_fin, $heure_fin, $tab_heure, $my_form, $lib_ligne) {
	// Heure deb heure fin
	$button_tray = new XoopsFormElementTray($lib_ligne, '');
	$lst_heure_deb = new XoopsFormSelect('', $lib_heure_deb, $heure_deb);
	$lst_heure_deb->addOptionArray($tab_heure);
	$lst_heure_fin = new XoopsFormSelect('', $lib_heure_fin, $heure_fin);
	$lst_heure_fin->addOptionArray($tab_heure);
	$button_tray->addElement($lst_heure_deb);
	$button_tray->addElement($lst_heure_fin);
	$my_form->addElement($button_tray);
	return $my_form;
	// --
}

// include du formloader
include XOOPS_ROOT_PATH."/class/xoopsformloader.php";

// création du formulaire
$my_form = new XoopsThemeForm(_MD_TADDRES, "addres", "addres.php");

// id
$my_form->addElement(new XoopsFormHidden("idres", isset ($idres) ? $idres : ""));

// nom
$my_form->addElement(new XoopsFormText(_MD_NOMRES, "nomres", 50, 100, isset ($nomres) ? $nomres : ""), true);

// catégorie
$list_id = new XoopsFormSelect(_MD_NOMCAT, "idcatres", isset ($idcatres) ? $idcatres : "");
$list_id->addOptionArray($cat->getAllCat());
$my_form->addElement($list_id);

// description
$my_form->addElement(new xoopsFormDhtmlTextArea(_MD_DESCRRES, "descrres", isset ($descrres) ? $descrres : ""), true);

// Type
$my_form->addElement(new XoopsFormHidden("typeres", $typeres));

// nbocc
$my_form->addElement(new XoopsFormText(($typeres == RES_UNIQUE ? _MD_NBOCCRES : _MD_NBOCCRES_TRANCHE), "nboccres", 25, 3, $nboccres), true);

// nbocc par pers
$my_form->addElement(new XoopsFormText(_MD_OCCPERSRES, "occpersres", 25, 3, $occpersres), true);

// valide
$list_valid = new XoopsFormSelect(_MD_VALIDRES, "validres", $validres);
$list_valid->addOption(0, _MD_KO);
$list_valid->addOption(1, _MD_OK);
$my_form->addElement($list_valid, true);

// partie calendrie
if ($typeres == RES_CALENDRIER) {

	// début calendrier
	$my_form->addElement(new XoopsFormTextDateSelect(_MD_OPENRES, "date_deb", 15, isset ($date_deb) ? $date_deb : ""), true);

	// Fin calendrier
	$my_form->addElement(new XoopsFormTextDateSelect(_MD_CLOSERES, "date_fin", 15, isset ($date_fin) ? $date_fin : ""), true);

	// open_sem	
	$radio_b = new XoopsFormCheckBox(_MD_OPEN_SEM, 'open_sem[]', $open_sem);
	$radio_b->addOptionArray($tab_jour_short);
	$my_form->addElement($radio_b, true);

	// minimum réservation
	$list_min = new XoopsFormSelect(_MD_MIN_RES, "min_res", isset ($min_res) ? $min_res : "");
	$list_min->addOptionArray($tab_min_res);
	$my_form->addElement($list_min, true);

	// heure_deb
	/*
	$lst_heure_deb = new XoopsFormSelect(_MD_HEURE_DEB, "heure_deb", $heure_deb);
	$lst_heure_deb->addOptionArray($tab_heure);
	$my_form->addElement($lst_heure_deb, true);
		 
	// heure_fin
	$lst_heure_fin = new XoopsFormSelect(_MD_HEURE_FIN, "heure_fin", $heure_fin);
	$lst_heure_fin->addOptionArray($tab_heure);
	$my_form->addElement($lst_heure_fin, true);
	*/

	$my_form  = affHeureJournee("heure_deb_dim", $heure_deb_dim, "heure_fin_dim", $heure_fin_dim, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[0]);
	$my_form  = affHeureJournee("heure_deb_lun", $heure_deb_lun, "heure_fin_lun", $heure_fin_lun, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[1]);
	$my_form  = affHeureJournee("heure_deb_mar", $heure_deb_mar, "heure_fin_mar", $heure_fin_mar, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[2]);
	$my_form  = affHeureJournee("heure_deb_mer", $heure_deb_mer, "heure_fin_mer", $heure_fin_mer, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[3]);
	$my_form  = affHeureJournee("heure_deb_jeu", $heure_deb_jeu, "heure_fin_jeu", $heure_fin_jeu, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[4]);
	$my_form  = affHeureJournee("heure_deb_ven", $heure_deb_ven, "heure_fin_ven", $heure_fin_ven, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[5]);
	$my_form  = affHeureJournee("heure_deb_sam", $heure_deb_sam, "heure_fin_sam", $heure_fin_sam, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[6]);

}

// active
$list_active = new XoopsFormSelect(_MD_ACTIVERES, "active_res", $active_res);
$list_active->addOption(0, _MD_KO);
$list_active->addOption(1, _MD_OK);
$my_form->addElement($list_active, true);

// Information supplémentaire
$tab_infores = $infores->renderInfo();

for ($i = 0; $i < count($tab_infores); $i ++) {
	$my_form->addElement($tab_infores[$i]['data'], ($tab_infores[$i]['oblig'] == 'true' ? true : false));
}
// --

// création bouton submit
$button_tray = new XoopsFormElementTray('', '');
$button_tray->addElement(new XoopsFormButton('', 'add', _MD_ADDRES, 'submit'));
$my_form->addElement($button_tray);

// affichage du formulaire, sauf si affichage par template
$my_form->display();
?>

