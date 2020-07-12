<?php

    // include du formloader
    include XOOPS_ROOT_PATH."/class/xoopsformloader.php";

    // création du formulaire
    $my_form = new XoopsThemeForm(_MD_TITLE_TITLE_NODEM.' '.$iddem, "editdem", "edit_dem.php");

	// Sauvegarder l'ecran appelant
	if ( isset($appel) ) 
	{
		$my_form->addElement( new XoopsFormHidden("appel", $appel));    
	}

	// Sauvegarde id demande
	$my_form->addElement( new XoopsFormHidden("iddem", $iddem));
       
    // Catégorie
	$my_form->addElement(new XoopsFormLabel(_MD_NOMCAT,$cat->nom));

	// Réservation
	$my_form->addElement(new XoopsFormLabel(_MD_NOMRES,$res->nom));

  	// Membre demande
  	if ( checkAdmin($xoopsUser, $xoopsModule) )
      $my_form->addElement(new XoopsFormLabel(_MD_NOM_MEMBRE,xoops_getLinkedUnameFromId($dem->id_user)));

	// Date demande
	$my_form->addElement(new XoopsFormLabel(_MD_DATE_DEM,date('d/m/Y',$dem->date)));
	
	// Date et heure réservation
	if ($res->type == RES_CALENDRIER )
	  $my_form->addElement(new XoopsFormLabel(_MD_DATEHEURE_RESERV,affDate($demcal->year, $demcal->month, $demcal->day, $demcal->time)));
	  
	// Commentaire
	$my_form->addElement(new XoopsFormLabel(_MD_COMMENTAIRE,$myts->previewTarea($dem->comm)));
	
	// Status demande
	$my_form->addElement(new XoopsFormLabel(_MD_STATUS_DEM,affImage($tab_etat_dem_img[$dem->status])));		
		
	// Date de validation
	if ( $dem->status == DEMANDE_VALIDE )
	  $my_form->addElement(new XoopsFormLabel(_MD_DATE_VAL,isset($dem->date_val)?date('d/m/Y',$dem->date_val):date('d/m/Y')));

	// status refusée alors affichage message
  //  if ( $dem->status == DEMANDE_REFUSEE and  !checkAdmin($xoopsUser, $xoopsModule) )
	//  {
  //	    $my_form->addElement(new XoopsFormLabel(_MD_MESS_REFUS,$myts->previewTarea($dem->mess_refus)));
	//  }
		
	// Saisie du message de refus
	if (checkAdmin($xoopsUser, $xoopsModule))
	{
	  $my_form->addElement(new XoopsFormTextArea (_MD_MESS_REFUS, "mess_refus", $dem->mess_refus),false);
	}
	else
	  $my_form->addElement(new XoopsFormLabel(_MD_MESS_REFUS,$myts->previewTarea($dem->mess_refus)));

		
    // création bouton submit avec action
    // action
	$button_tray = new XoopsFormElementTray('' ,'');

    // Action
    $list_op = new XoopsFormSelect("", "op", $op);
		
	// Bouton admin
	if ( checkAdmin($xoopsUser, $xoopsModule) )
	{
	  if ( $dem->status == DEMANDE_A_VALIDER or $dem->status == DEMANDE_REFUSEE)
	    $list_op->addOption("valider", _MD_VAL );
			  
	  if ( $dem->status == DEMANDE_VALIDE or $dem->status == DEMANDE_A_VALIDER )
	    $list_op->addOption("refuser", _MD_REFUS );
		  
	  // si demande de l'administrateur alors possibilité d'annuler sa réservation
	  // if ($dem->id_user == $xoopsUser->uid())
	    $list_op->addOption("annuler", _MD_ANNULER );
	}
	// Bouton membre
	else
	{
	  $list_op->addOption("annuler", _MD_ANNULER );
	}
		
	// Ajout des boutons
    $button_tray->addElement($list_op);
	$button_tray->addElement(new XoopsFormButton('', 'submit', _MD_BOUTONOK, 'submit'));
	  
    $my_form->addElement($button_tray);

    // affichage du formulaire, sauf si affichage par template
    $my_form->display();

?>
