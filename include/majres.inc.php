<?php 

    function affHeureJournee($lib_heure_deb, $heure_deb, $lib_heure_fin, $heure_fin, $tab_heure, $my_form, $lib_ligne )
    {
      // Heure deb heure fin
      $button_tray = new XoopsFormElementTray($lib_ligne ,'');
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
include XOOPS_ROOT_PATH . "/class/xoopsformloader.php"; 
// création du formulaire
$my_form = new XoopsThemeForm(_MD_TMAJRES, "majres", "majres.php"); 
// Edit
if (isset($edit)) {
    // id
    $my_form->addElement(new XoopsFormHidden("idres", $idres)); 
    // nom
    $my_form->addElement(new XoopsFormLabel(_MD_NOMRES, $nomres));
    $my_form->addElement(new XoopsFormHidden("nomres", $nomres));
} 
// Liste
else {
    $list_id = new XoopsFormSelect(_MD_NOMRES, "idres", isset($idres)?$idres:"");
    $list_id->addOptionArray($res->getAllReserv());
    $my_form->addElement($list_id);
} 

if ( ( ( isset($del) or isset($save) or isset($annuler) )  and count($tab_error) > 0) or isset($edit) )
 {
    
	// catégorie
	$list_idcat = new XoopsFormSelect(_MD_NOMCAT, "idcatres", $idcatres);
	$list_idcat->addOptionArray($cat->getAllCat());
	$my_form->addElement($list_idcat); 
	// description
	$my_form->addElement(new xoopsFormDhtmlTextArea (_MD_DESCRRES, "descrres", $descrres), (isset($edit)?true:false)); 
	// Type
	$my_form->addElement(new XoopsFormHidden("typeres", $typeres)); 
	// valide
	$list_valid = new XoopsFormSelect(_MD_VALIDRES, "validres", $validres);
	$list_valid->addOption(0, _MD_KO);
	$list_valid->addOption(1, _MD_OK);
	$my_form->addElement($list_valid, true); 
	// nbocc
	$my_form->addElement(new XoopsFormText(($typeres == RES_UNIQUE?_MD_NBOCCRES:_MD_NBOCCRES_TRANCHE), "nboccres", 25, 3, $nboccres), (isset($edit)?true:false)); 
	// nbocc par personne
	$my_form->addElement(new XoopsFormText(_MD_OCCPERSRES, "occpersres", 25, 3, $occpersres), (isset($edit)?true:false)); 
	
	// Nbre demandes à valider
	$dem = new ResManagerDem($xoopsDB);
	$dem ->id_reserv = $idres;
	$my_form->addElement(new XoopsFormLabel(_MD_NBDEMVAL,$dem->countValDem()));
	// Nbre de demandes à valider
	$my_form->addElement(new XoopsFormLabel(_MD_DEMTOVAL,$dem->countToValDem()));
	
	// Nbre de dispo seulement pour les uniques
	if ($typeres == RES_UNIQUE)
	{
	  // Nbre dispo
	  $nb_valid = $dem->countValDem();
	  $nb_free = ($res->nbocc)-$nb_valid;
	  $my_form->addElement(new XoopsFormLabel(_MD_FREERES,$nb_free<=0?affImage('full.png'):affImage('ok_bouton.gif')." (".$nb_free.")"));
	}
	
	
	
	// partie calendrie
	if ($typeres == RES_CALENDRIER) {
	    // début calendrier
	    $my_form->addElement(new XoopsFormTextDateSelect(_MD_OPENRES, "date_deb", 15, $date_deb), (isset($edit)?true:false)); 
	    // Fin calendrier
	    $my_form->addElement(new XoopsFormTextDateSelect(_MD_CLOSERES, "date_fin", 15, $date_fin), (isset($edit)?true:false)); 
	    // open_sem
	    $radio_b = new XoopsFormCheckBox(_MD_OPEN_SEM, 'open_sem[]', $open_sem);
	    $radio_b->addOptionArray($tab_jour_short);
	    $my_form->addElement($radio_b); 
	    // minimum réservation
	    $list_min = new XoopsFormSelect(_MD_MIN_RES, "min_res", $min_res);
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
      $my_form = affHeureJournee("heure_deb_dim", $heure_deb_dim, "heure_fin_dim", $heure_fin_dim, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[0] );
      $my_form = affHeureJournee("heure_deb_lun", $heure_deb_lun, "heure_fin_lun", $heure_fin_lun, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[1] );
      $my_form = affHeureJournee("heure_deb_mar", $heure_deb_mar, "heure_fin_mar", $heure_fin_mar, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[2] );
      $my_form = affHeureJournee("heure_deb_mer", $heure_deb_mer, "heure_fin_mer", $heure_fin_mer, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[3] );
      $my_form = affHeureJournee("heure_deb_jeu", $heure_deb_jeu, "heure_fin_jeu", $heure_fin_jeu, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[4] );
      $my_form = affHeureJournee("heure_deb_ven", $heure_deb_ven, "heure_fin_ven", $heure_fin_ven, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[5] );
      $my_form = affHeureJournee("heure_deb_sam", $heure_deb_sam, "heure_fin_sam", $heure_fin_sam, $tab_heure, $my_form, _MD_HEURE_DEB." "._MD_HEURE_FIN." ".$tab_jour[6] );

	} 
	// active
	$list_active = new XoopsFormSelect(_MD_ACTIVERES, "active_res", $active_res);
	$list_active->addOption(0, _MD_KO);
	$list_active->addOption(1, _MD_OK);
	$my_form->addElement($list_active, true); 
	
	// Information supplémentaire
	$tab_infores = $infores->renderInfoVal($idres);
	
	for ($i=0;$i< count($tab_infores);$i++)
  {
		$my_form->addElement($tab_infores[$i]['data'],($tab_infores[$i]['oblig']=='true'?true:false));
	}
  // --
}

// création bouton submit
$button_tray = new XoopsFormElementTray('' , ''); 
// bouton ouvrir
// 

if (!isset($edit) and count($tab_error) == 0) {
    $button_tray->addElement(new XoopsFormButton('', 'edit', _MD_EDIT, 'submit'));
} else {
    $button_tray->addElement(new XoopsFormButton('', 'save', _MD_ENR, 'submit')); 
    // Supprimer seulement si aucune demande
    $dem = new ResManagerDem($xoopsDB);
    $dem->id_reserv = $idres;
    if ($dem->countResDem() == 0)
        $button_tray->addElement(new XoopsFormButton('', 'del', _MD_SUPP, 'submit'));

    $button_tray->addElement(new XoopsFormButton('', 'annuler', _MD_ANNULER, 'submit'));
	
	if ($typeres == RES_CALENDRIER) {
	  // Bouton calendrier
	  $lien_retour = magicUrl("admin/majres.php?idres=".$idres."&edit=ok");
	  $lien_cal = lienImage("calendrier.jpg","../edit_day.php?id_reserv=".$idres."&appel=".$lien_retour);
	  $button_tray->addElement(new XoopsFormLabel("",$lien_cal));
	}
} 

$my_form->addElement($button_tray); 
// affichage du formulaire, sauf si affichage par template
$my_form->display();

?>
