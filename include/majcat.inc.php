<?php

    // include du formloader
    include XOOPS_ROOT_PATH."/class/xoopsformloader.php";

    // création du formulaire
    $my_form = new XoopsThemeForm(_MD_TMAJCAT, "majcat", "majcat.php");

		// Edit
    if ( isset($edit) )
    {
		  // id cat
		  $my_form->addElement( new XoopsFormHidden("idcat", $idcat));
		  // nom
      $my_form->addElement(new XoopsFormLabel(_MD_NOMCAT, $nomcat));
      $my_form->addElement( new XoopsFormHidden("nomcat", $nomcat));
    }
    // Liste
    else
    {
   	  $list_id = new XoopsFormSelect(_MD_NOMCAT, "idcat", isset($idcat)?$idcat:"");
		  $list_id->addOptionArray($cat->getAllCat());
		  $my_form->addElement($list_id);
    }
    

    // description
    //$my_form->addElement(new XoopsFormTextArea (_MD_DESCRCAT, "descrcat", $descrcat),(isset($edit)?true:false));
    if (isset($edit))
      $my_form->addElement(new xoopsFormDhtmlTextArea(_MD_DESCRCAT, "descrcat", isset($descrcat)?$descrcat:""),(isset($edit)?true:false));

    // création bouton submit
    $button_tray = new XoopsFormElementTray('' ,'');
    
    // bouton ouvrir 
    if ( !isset($edit))
		  $button_tray->addElement(new XoopsFormButton('', 'edit', _MD_EDITCAT, 'submit'));
		else
		{
		  $button_tray->addElement(new XoopsFormButton('', 'save', _MD_ENRCAT, 'submit'));
		  
			// Supprimer seulement si aucune reservation
		  $res = new ResManagerRes($xoopsDB);
			$res->idcat = $idcat;
		  if ($res->countCatRes() == 0 )
		    $button_tray->addElement(new XoopsFormButton('', 'del', _MD_SUPPCAT, 'submit'));				
		    
		  
			$button_tray->addElement(new XoopsFormButton('', 'annuler', _MD_ANNULER, 'submit'));				  
		}
		
    $my_form->addElement($button_tray);

    // affichage du formulaire, sauf si affichage par template
    $my_form->display();

?>
