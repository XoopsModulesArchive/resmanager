<?php

    // include du formloader
    include XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    include_once(XOOPS_ROOT_PATH."/class/uploader.php");
	
    // création du formulaire
    $my_form = new XoopsThemeForm(_MD_TADDCAT, "addcat", "addcat.php");
    $my_form->setExtra( "enctype='multipart/form-data'" ) ; 

    // id cat
    $my_form->addElement( new XoopsFormHidden("idcat", (isset($idcat)?$idcat:"") ) );

    // nom
    $my_form->addElement(new XoopsFormText(_MD_NOMCAT, "nomcat", 50, 100, (isset($nomcat)?$nomcat:"")), true);

    // description
    //$my_form->addElement(new XoopsFormTextArea (_MD_DESCRCAT, "descrcat", $descrcat),true);
    $my_form->addElement(new xoopsFormDhtmlTextArea(_MD_DESCRCAT, "descrcat", (isset($descrcat)?$descrcat:"")),true);
    

    // Image pour la catégorie
    $img_box = new XoopsFormFile(_MD_IMGCAT, "my_file", $xoopsModuleConfig['max_imgsize']);
    $img_box->setExtra( "size ='65'") ;
    $my_form->addElement($img_box);


    // création bouton submit
    $button_tray = new XoopsFormElementTray('' ,'');
    $button_tray->addElement(new XoopsFormButton('', 'add', _MD_ADDCAT, 'submit'));
    $my_form->addElement($button_tray);



    // affichage du formulaire, sauf si affichage par template
    $my_form->display();

?>
