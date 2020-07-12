<?
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
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


// TODO Si appel n'est pas envoyé alors fermer afficher fermer 
// et fermer la fenetre avec un morceau de javascript

include("header.php");
include(XOOPS_ROOT_PATH."/header.php");

// Recuperation des données 
if ( isset($_GET['op'] ) ) 
  extract($_GET,EXTR_SKIP); 
else
  extract($_POST,EXTR_SKIP);

// Lien retour
// transformation de la magic url
if (isset($appel)) {
 $appel = magicToUrl($appel);   
}

// Liste des demandes
$dem = new ResManagerDem($xoopsDB);
$cat = new ResManagerCat($xoopsDB);
$res = new ResManagerRes($xoopsDB);
$demcal = new ResManagerDemcal($xoopsDB);

// lecture avant traitement
$dem->id = $iddem;
$dem->getDem();
$demcal->id_dem = $iddem;
$demcal->getDemcal();
$res->id = $dem->id_reserv;
$res->getReserv();
$cat->id = $res->idcat;
$cat->getCat();

// L'administrareur voit toutes les demandes
// le membre seulement les siennes
// donc si utilisateur et pas sa demande ==> erreur
if ($dem->id_user <> $xoopsUser->uid() && (!checkAdmin($xoopsUser, $xoopsModule) ) )
{
 // Vous ne pouvez pas accéder à cette demande
 redirect_header($appel,3,_MD_DEMDENIED);
}

switch ($op)
{

  // validation
  case "valider" :
	trigger_error('Cas valider ', E_USER_NOTICE);   

	// controle admin
	if (!checkAdmin ($xoopsUser, $xoopsModule))
		redirect_header($appel,3,_MD_VALID_DENIED);

	// Lien retour
	if (isset($appel))
	  echo '<a href='.$appel.'> << '._MD_RETOUR.'</a><br /><br />';

	// demande déjà validée
	if ( $dem->status == DEMANDE_VALIDE )
		themecenterposts(_MD_MESSAGE_EDITDEM, _MD_DEM_ALREADY_VALID);
	// Contrôle les dispo et si réservation ouverte
	else 
	{	// Contrôles pour demande calendrier
		if ($res->type == RES_CALENDRIER)
		{
			//if ($demcal->checkValid(&$mess_err,0,$res->id)) 
			if ($demcal->checkValid("",0,$res->id))
			{
			
				// Nombre de validés > nbre autorisés par tranche horaire
				if ( $demcal->countValDemcal($dem) >= $res->nbocc )  
				{
					$mess_err = _MD_RESERVFULL;	
					$etat = false;
				}
					// Nombre de demandes pour un user supérieur à l'autorisation
				else if ( $demcal->countValUserDemcal($dem) >= $res->occpers )
				{
					$mess_err = _MD_RESERVFULLUSER;
					$etat = false;
				}
				else 
					$etat = true;
			}
			else
			{
				$mess_err = $demcal->getErrMess();
				$etat = false;
			}
		}
		else
			// Contrôles pour demande normale
			{
				// $etat = $dem->checkValid(&$mess_err);
				$etat = $dem->checkValid("");
				$mess_err = $dem->getErrMess();
			}
		
		if ( !$etat )
		{
			themecenterposts(_MD_MESSAGE_EDITDEM, $mess_err);  
			echo '<br />';
		}
		else
		{ 
			
			
			// Mise à jour de la base 
			$dem->status = DEMANDE_VALIDE;
			$dem->mess_refus = $myts->oopsAddSlashes($mess_refus);
			
			if ( $dem->updateDem() )
			{
                                // Avertir le membre de la validation de sa demande
                                $notification_handler =& xoops_gethandler('notification'); 
                                $extra_tags = array("X_ADMIN"=> getUserInfoFromUid($xoopsUser->uid(), 'uname'),
                                              "X_IDDEM"=>$dem->id,
                                              "X_LIENDEM"=>$dem->getLienDem());
                                $notification_handler->triggerEvent ('suividem', $dem->id, 'val_dem', $extra_tags, $user_list=array(), $module_id=null, 0);
               
                                
				themecenterposts(_MD_MESSAGE_EDITDEM, _MD_VALDEM_OK);
				echo '<br />';
			}
			else
			{
				themecenterposts(_MD_MESSAGE_EDITDEM, _MD_ACCESBD_KO);
				echo '<br />';
			}
		}
	}
  break;

  // refus
  case "refuser" :
    trigger_error('Cas refuser ', E_USER_NOTICE);   
	
    // controle admin
    if (!checkAdmin ($xoopsUser, $xoopsModule))
     redirect_header($appel,3,_MD_REFUS_DENIED);
 
    // Lien retour
    if (isset($appel))
      echo '<a href='.$appel.'> << '._MD_RETOUR.'</a><br /><br />';
	  		
    // demande déjà refusée
    if ( $dem->status == DEMANDE_REFUSEE )
      {
      themecenterposts(_MD_MESSAGE_EDITDEM, _MD_DEM_ALREADY_REFUSEE);
      echo '<br />';
      }
   
    // le refus doit être saisi
    if (empty($mess_refus) )
    {
      themecenterposts(_MD_MESSAGE_EDITDEM, _MD_REFUS_MESS_KO);
      echo '<br />';
    }
    else
    {
      // Mise à jour de la base 
      $dem->status = DEMANDE_REFUSEE;
      $dem->mess_refus = $myts->oopsAddSlashes($mess_refus);
     
      if ( $dem->updateDem() )
      {
        // Avertir le membre du refus de sa demande
        $notification_handler =& xoops_gethandler('notification'); 
        $extra_tags = array("X_ADMIN"=> getUserInfoFromUid($xoopsUser->uid(), 'uname'),
                      "X_IDDEM"=>$dem->id,
                      "X_LIENDEM"=>$dem->getLienDem());
        $notification_handler->triggerEvent ('suividem', $dem->id, 'ref_dem', $extra_tags, $user_list=array(), $module_id=null, 0);
      
        themecenterposts(_MD_MESSAGE_EDITDEM, _MD_REFUS_OK);
        echo '<br />';
      }
      else
      {
        themecenterposts(_MD_MESSAGE_EDITDEM, _MD_ACCESBD_KO);
        echo '<br />';
      }
    }
	  
  break;  
  
  // annulation
  case "annuler" :
    trigger_error('Cas annuler ', E_USER_NOTICE);
	  
    // Contrôle user si pas administrateur
    if ($dem->id_user <> $xoopsUser->uid() and !checkAdmin ($xoopsUser, $xoopsModule) )
      redirect_header($appel,3,_MD_DEMDENIED);

    // Lien retour
    if (isset($appel))
      echo '<a href='.$appel.'> << '._MD_RETOUR.'</a><br /><br />';
    
    // Annuler une demande
    $dem->status = DEMANDE_ANNULEE;


    // if ($dem->suppDem())
    if ($dem->updateDem())
    {
      if ( checkAdmin($xoopsUser, $xoopsModule) )
      {
        // Avertir le membre de l'annulation de la demande
        $notification_handler =& xoops_gethandler('notification'); 
        $extra_tags = array("X_ADMIN"=> getUserInfoFromUid($xoopsUser->uid(), 'uname'),
                      "X_IDDEM"=>$dem->id,
                      "X_LIENDEM"=>$dem->getLienDem());
        $notification_handler->triggerEvent ('suividem', $dem->id, 'ann_dem', $extra_tags, $user_list=array(), $module_id=null, 0);
      }
      else
      {
        // Avertir l'administrateur qu'une demande a été annulée
        $notification_handler =& xoops_gethandler('notification'); 
        $extra_tags = array("X_USERDEM"=> getUserInfoFromUid($dem->id_user, 'uname'),
                            "X_IDDEM"=>$dem->id,
                            "X_LIENDEM"=>$dem->getLienDem());
        $notification_handler->triggerEvent ('suivires', $dem->id_reserv, 'ann_userdem', $extra_tags, $user_list=array(), $module_id=null, 0);
        
      }
    
      themecenterposts(_MD_MESSAGE_EDITDEM, _MD_ANNULATION_OK);
      echo '<br />';
    }
    else
    {
      themecenterposts(_MD_MESSAGE_EDITDEM, _MD_ACCESBD_KO);
      echo '<br />';
    }
          
  break;
  
  // detail
  case "detail" :
    // Lien retour
	if (isset($appel))
	  echo '<a href='.$appel.'> << '._MD_RETOUR.'</a><br /><br />';
	// suite apres le switch
  break;

}

  
// Affichage demande
include("include/edit_dem.inc.php");

  
include(XOOPS_ROOT_PATH."/footer.php");

//debugSqlBloc();

?>
