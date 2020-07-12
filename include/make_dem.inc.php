<?php

  // include du formloader
  include XOOPS_ROOT_PATH."/class/xoopsformloader.php";

  // création du formulaire
  $my_form = new XoopsThemeForm($res->nom, "makedem", "make_dem.php");

  // id
	$my_form->addElement( new XoopsFormHidden("idres", $idres));
	$my_form->addElement( new XoopsFormHidden("idcat", $idcat));

  // description
	$my_form->addElement(new XoopsFormLabel(_MD_DESCRRES,$res->descr));

	// type
	$my_form->addElement(new XoopsFormLabel(_MD_TYPERES,$tab_type_res[RES_UNIQUE]));

	// Nbre total
	$my_form->addElement(new XoopsFormLabel(_MD_NBOCCRES,$res->nbocc));
		
	// Nbre total
	$my_form->addElement(new XoopsFormLabel(_MD_OCCPERSRES,$res->occpers));
		
	// Nbre dispo
	$dem = new ResManagerDem($xoopsDB);
	$dem ->id_reserv = $idres;
	$nb_valid = $dem->countValDem();
	$nb_free = ($res->nbocc)-$nb_valid;
	$my_form->addElement(new XoopsFormLabel(_MD_FREERES,$nb_free<=0?affImage('full.png'):affImage('ok_bouton.gif')));


	// Validation nécessaire
	$my_form->addElement(new XoopsFormLabel(_MD_VALIDRES,($res->valid==0?_MD_KO:_MD_OK)));
	
	// Commentaire
	$my_form->addElement(new XoopsFormTextArea (_MD_COMMENTAIRE, "com_dem", isset($com_dem)?$com_dem:""),false);


	// Affichage des info supp
	$info = $infores->getAllInfo($idres);
	
	for ($i=0;$i< count($info);$i++)
  {
  	
  	if ( $info[$i]['type_infores'] == 'TEXTAREA' ) 
  	  $val_aff = $myts->makeTareaData4Preview($info[$i]['val']);
  	elseif ( $info[$i]['type_infores'] == 'DATE' ) 
  	  {
  	  	$date_tab = explode('-', $info[$i]['val']);
  	  	$val_aff = affDate($date_tab[0],$date_tab[1],$date_tab[2]);
  	  }
  	else
  	  $val_aff = $info[$i]['val'];

		$my_form->addElement(new XoopsFormLabel($info[$i]['lib_infores'],$val_aff ));
	}
	// --

  // création bouton submit avec action
  // action
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
