<?php

    // include du formloader
    include XOOPS_ROOT_PATH."/class/xoopsformloader.php";

    // création du formulaire
    $my_form = new XoopsThemeForm("", "makedemcal", "make_demcal.php");

 	// sauvegarde des infos nécessaires à la réservation
	//$my_form->addElement( new XoopsFormHidden("id_res", $id_res));
	//$my_form->addElement( new XoopsFormHidden("cal_heure", $cal_heure));
	//$my_form->addElement( new XoopsFormHidden("cal_day", $cal_day));
	//$my_form->addElement( new XoopsFormHidden("cal_month", $cal_month));
	//$my_form->addElement( new XoopsFormHidden("cal_year", $cal_year));
	if (isset($appel))
		$my_form->addElement( new XoopsFormHidden("appel", $appel));
	if (isset($appel_mkdem))
		$my_form->addElement( new XoopsFormHidden("appel_mkdem", $appel_mkdem));

       
  // description
  //$element_descr = new XoopsFormLabel(_MD_DESCRRES,$res->descr);
	//$my_form->addElement($element_descr);

	// type
	//$my_form->addElement(new XoopsFormLabel(_MD_TYPERES,$tab_type_res[RES_CALENDRIER]));

	// TODO Afficher si dispo ce n'est pas le plus urgent 
	// car c juste une sécurité supplémentaire s'il y avait 
	// manipulation des adresses

	// validation
	//$my_form->addElement(new XoopsFormLabel(_MD_VALIDRES,($res->valid==0?_MD_KO:_MD_OK)));

	// Date et heure réservation
	//$my_form->addElement(new XoopsFormLabel(_MD_DATEHEURE_RESERV,affDate($cal_year, $cal_month, $cal_day, $cal_heure)));


    // création bouton submit avec action
	$button_tray = new XoopsFormElementTray('' ,'');
    // Action
    $list_op = new XoopsFormSelect("", "op", $op);
	$list_op->addOption("demande",_MD_OPERESERV );
	// Ajout des boutons
  	$button_tray->addElement($list_op);
	$button_tray->addElement(new XoopsFormButton('', 'submit', _MD_BOUTONOK, 'submit'));
	  
    $my_form->addElement($button_tray);

    // affichage du formulaire, sauf si affichage par template
    $my_form->display();

?>
