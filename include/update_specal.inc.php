<?php


// include du formloader
include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once (XOOPS_ROOT_PATH."/class/uploader.php");

function getCheckBoxUpd($lib) {
	$maj_radio = new XoopsFormRadioYN(_MD_CHECK_BOX_MAJ, 'upd_radio_'.$lib, 0);
	return $maj_radio;
}

function affHeureJournee($lib_heure_deb, $heure_deb, $lib_heure_fin, $heure_fin, $tab_heure, $lib_ligne) {
	// Heure deb heure fin
	$button_tray = new XoopsFormElementTray($lib_ligne, ' : ');
	$lst_heure_deb = new XoopsFormSelect('', $lib_heure_deb, $heure_deb);
	$lst_heure_deb->addOptionArray($tab_heure);
	$lst_heure_fin = new XoopsFormSelect('', $lib_heure_fin, $heure_fin);
	$lst_heure_fin->addOptionArray($tab_heure);
	$button_tray->addElement($lst_heure_deb);
	$button_tray->addElement($lst_heure_fin);
	$button_tray->addElement(getCheckBoxUpd($lib_heure_deb), false);
	// $my_form->addElement($button_tray);
	return $button_tray;
	// --
}

// création du formulaire
$my_form = new XoopsThemeForm(_MD_MASS_UPD_SPECAL, "update_specal", "update_reserv.php");

// Réservation à mettre à jour
// $list_id = new XoopsFormSelect(_MD_NOMRES, "idres", $_POST['idres'],  10, true);
// $list_id->setDescription('<span style="font-size:x-small;">'._MD_MASS_UPD_SPECAL_DESC.'</span>');
// $list_id->addOptionArray($res->getAllReserv());
// $my_form->addElement($list_id);

$elt_tray1 = new xoopsFormElementTray(_MD_NOMRES, ' <br /><br />');
$elt_tray1->setDescription('<span style="font-size:x-small;">'._MD_MASS_UPD_SPECAL_DESC.'</span>');
$list_id = new XoopsFormSelect("", "idres", isset ($_POST['idres']) ? $_POST['idres'] : "", 10, true);
$list_id->addOptionArray($res->getAllReservCal());
$elt_tray1->addElement($list_id);
$lock = new XoopsFormRadio("", "lock", 'LOCK');
$lock->addOptionArray(array ('LOCK' => _MD_MASS_UPD_LOCK, 'UNLOCK' => _MD_MASS_UPD_UNLOCK));
$elt_tray1->addElement($lock);
$my_form->addElement($elt_tray1);

// début calendrier
$elt_tray5 = new xoopsFormElementTray(_MD_OPENRES, ' : ');
$elt_tray5->addElement(new XoopsFormTextDateSelect('', "date_deb", 15, (isset ($_POST['date_deb']) ? toTimestamp('-', $_POST['date_deb']) : ""), false));
$my_form->addElement($elt_tray5);

// Fin calendrier
$elt_tray6 = new xoopsFormElementTray(_MD_CLOSERES, ' : ');
$elt_tray6->addElement(new XoopsFormTextDateSelect('', "date_fin", 15, (isset ($_POST['date_fin']) ? toTimestamp('-', $_POST['date_fin']) : ""), false));
$my_form->addElement($elt_tray6);

$my_form->insertBreak("");

// open_sem
$elt_tray7 = new xoopsFormElementTray(_MD_OPEN_SEM, ' : ');
$radio_b = new XoopsFormCheckBox('', 'open_sem[]', isset ($_POST['open_sem']) ? $_POST['open_sem'] : "");
$radio_b->addOptionArray($tab_jour_short);
$elt_tray7->addElement($radio_b);
$elt_tray7->addElement(getCheckBoxUpd('open_sem'), false);
$my_form->addElement($elt_tray7);

$my_form->insertBreak("");
/*
$my_form->addElement(affHeureJournee("heure_deb_dim", $_POST['heure_deb_dim'], "heure_fin_dim", $_POST['heure_deb_dim'], $tab_heure,  _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[0] ));
$my_form->addElement(affHeureJournee("heure_deb_lun", $_POST['heure_deb_lun'], "heure_fin_lun", $_POST['heure_fin_lun'], $tab_heure,  _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[1] ));
$my_form->addElement(affHeureJournee("heure_deb_mar", $_POST['heure_deb_mar'], "heure_fin_mar", $_POST['heure_fin_mar'], $tab_heure,  _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[2] ));
$my_form->addElement(affHeureJournee("heure_deb_mer", $_POST['heure_deb_mer'], "heure_fin_mer", $_POST['heure_fin_mer'], $tab_heure,  _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[3] ));
$my_form->addElement(affHeureJournee("heure_deb_jeu", $_POST['heure_deb_jeu'], "heure_fin_jeu", $_POST['heure_fin_jeu'], $tab_heure,  _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[4] ));
$my_form->addElement(affHeureJournee("heure_deb_ven", $_POST['heure_deb_ven'], "heure_fin_ven", $_POST['heure_fin_ven'], $tab_heure,  _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[5] ));
$my_form->addElement(affHeureJournee("heure_deb_sam", $_POST['heure_deb_sam'], "heure_fin_sam", $_POST['heure_deb_sam'], $tab_heure,  _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[6] ));
*/
$my_form->addElement(affHeureJournee("heure_deb_dim", isset ($_POST['heure_deb_dim']) ? $_POST['heure_deb_dim'] : 0, "heure_fin_dim", isset ($_POST['heure_fin_dim']) ? $_POST['heure_fin_dim'] : 23, $tab_heure, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[0]));
$my_form->addElement(affHeureJournee("heure_deb_lun", isset ($_POST['heure_deb_lun']) ? $_POST['heure_deb_lun'] : 0, "heure_fin_lun", isset ($_POST['heure_fin_lun']) ? $_POST['heure_fin_lun'] : 23, $tab_heure, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[1]));
$my_form->addElement(affHeureJournee("heure_deb_mar", isset ($_POST['heure_deb_mar']) ? $_POST['heure_deb_mar'] : 0, "heure_fin_mar", isset ($_POST['heure_fin_mar']) ? $_POST['heure_fin_mar'] : 23, $tab_heure, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[2]));
$my_form->addElement(affHeureJournee("heure_deb_mer", isset ($_POST['heure_deb_mer']) ? $_POST['heure_deb_mer'] : 0, "heure_fin_mer", isset ($_POST['heure_fin_mer']) ? $_POST['heure_fin_mer'] : 23, $tab_heure, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[3]));
$my_form->addElement(affHeureJournee("heure_deb_jeu", isset ($_POST['heure_deb_jeu']) ? $_POST['heure_deb_jeu'] : 0, "heure_fin_jeu", isset ($_POST['heure_fin_jeu']) ? $_POST['heure_fin_jeu'] : 23, $tab_heure, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[4]));
$my_form->addElement(affHeureJournee("heure_deb_ven", isset ($_POST['heure_deb_ven']) ? $_POST['heure_deb_ven'] : 0, "heure_fin_ven", isset ($_POST['heure_fin_ven']) ? $_POST['heure_fin_ven'] : 23, $tab_heure, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[5]));
$my_form->addElement(affHeureJournee("heure_deb_sam", isset ($_POST['heure_deb_sam']) ? $_POST['heure_deb_sam'] : 0, "heure_fin_sam", isset ($_POST['heure_fin_sam']) ? $_POST['heure_fin_dim'] : 23, $tab_heure, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[6]));

// Maj reservation
$my_form->addElement(new XoopsFormButton('', 'update_specal', _MD_ENR, 'submit'));

$my_form->display();
?>


