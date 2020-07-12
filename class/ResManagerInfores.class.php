<?php
  if ( !defined("RESMANAGER_CLASS_INFORES") ) 
  {
	
	define("RESMANAGER_CLASS_INFORES",1);

  require_once "ResManagerStmt.class.php";

Class ResManagerInfores {
    var $id; 
    var $lib;
    var $type;
    var $oblig;
    var $db; // base de donnée
    
    // Constructeur
    function ResManagerInfores($base)
    {
        $this->db = $base;
    }
     
    // Extraire les informations à saisir pour cette réservation
    function renderInfo()
    {
    	
  	
        $nom_table = $this->db->prefix('resman_infores');
        
        $sql = new ResManagerStmt("select id_infores, 		".
        													" lib_infores,          ".
        													" type_infores,					".
        													" oblig_infores,				".
        													" taille_infores,				".
        													" max_infores from						".
        													$nom_table);

        $result = $this->db->queryF($sql->requete); 
        
        // boucle sur le tableau de résultat
        $tab_res = array();

        while ($myrow = $this->db->fetchArray($result)) 
        {
       
        		if ( $myrow['type_infores'] == 'TEXT' )
        		{
        			$tab['data'] = new XoopsFormText($myrow['lib_infores'], $myrow['id_infores'], $myrow['taille_infores'], $myrow['max_infores'], "");
        			$tab['oblig'] = $myrow['oblig_infores'];
        			$tab_res[] = $tab;
        		}
        		
        		if ( $myrow['type_infores'] == 'TEXTAREA' )
        		{
        			$tab['data'] = new XoopsFormTextarea($myrow['lib_infores'], $myrow['id_infores'], 	"");
        			$tab['oblig'] = $myrow['oblig_infores'];
        			$tab_res[] = $tab;
        		}
        		
        		if ( $myrow['type_infores'] == 'DATE' )
        		{
        			$tab['data'] = new XoopsFormTextDateSelect($myrow['lib_infores'], $myrow['id_infores'], 15, null);
        			$tab['oblig'] = $myrow['oblig_infores'];
        			$tab_res[] = $tab;
        		}
        } 
				
        return $tab_res;
    }

    // Extraire les informations à saisir pour cette réservation
    // Avec les valeurs déjà saisies
    function renderInfoVal($idres)
    {
    	
  	
        $nom_table = $this->db->prefix('resman_infores');
        $nom_table1 = $this->db->prefix('resman_val_infores');
        
        $sql = new ResManagerStmt("select valinfo.id_infores,  		 ".
        													" lib_infores,   					       ".
        													" type_infores,					         ".
        													" oblig_infores,				         ".
        													" taille_infores,				         ".
        													" id_res,                        ".
        													" valinfo.val valeur,					         ".
        													" max_infores from						".
        													$nom_table." info , ".$nom_table1." valinfo ".
        													" where valinfo.id_res = ".$idres. " and ".
        													" info.id_infores = valinfo.id_infores");
        													
        
        $result = $this->db->queryF($sql->requete); 
        
        // boucle sur le tableau de résultat
        $tab_res = array();

        while ($myrow = $this->db->fetchArray($result)) 
        {
       
        		if ( $myrow['type_infores'] == 'TEXT' )
        		{
        			$tab['data'] = new XoopsFormText($myrow['lib_infores'], $myrow['id_infores'], $myrow['taille_infores'], $myrow['max_infores'], $myrow['valeur']);
        			$tab['oblig'] = $myrow['oblig_infores'];
        			$tab_res[] = $tab;
        		}
        		
        		if ( $myrow['type_infores'] == 'TEXTAREA' )
        		{
        			$tab['data'] = new XoopsFormTextarea($myrow['lib_infores'], $myrow['id_infores'], 	$myrow['valeur']);
        			$tab['oblig'] = $myrow['oblig_infores'];
        			$tab_res[] = $tab;
        		}
        		
        		if ( $myrow['type_infores'] == 'DATE' )
        		{
        			$tab['data'] = new XoopsFormTextDateSelect($myrow['lib_infores'], $myrow['id_infores'], 15, toTimestamp('-',$myrow['valeur']));
        			$tab['oblig'] = $myrow['oblig_infores'];
        			$tab_res[] = $tab;
        		}
        } 
				
        return $tab_res;
    }

    // Ajouter une valeur
    function addInfo($id_infores, $idres, $val )
    {
      $nom_table = $this->db->prefix('resman_val_infores');
      $sql = new ResManagerStmt('insert into '.$nom_table." ( id_infores, id_res, val ) values ( ?, ?, ?) ");
      
      if (!$result = $this->db->queryF($sql->bindParamVar("sis", $id_infores, $idres,$val ))) 
      {
            // Req Ko
            return false;
      } 

      return true;
    }
    
    // Mettre à jour une valeur
    function updateInfo($id_infores, $idres, $val )
    {
      $nom_table = $this->db->prefix('resman_val_infores');
      $sql = new ResManagerStmt('update '.$nom_table." set val = ? where id_infores = ? and id_res = ? ");
      
      if (!$result = $this->db->queryF($sql->bindParamVar("ssi", $val, $id_infores, $idres ))) 
      {
            // Req Ko
            return false;
      } 

      return true;
    }
    
    // Ajouter toutes les valeurs
    function addAllInfo($data, $idres)
    {
    		$myts =	&MyTextSanitizer::getInstance();
    	
    	  $nom_table = $this->db->prefix('resman_infores');
        
        $sql = new ResManagerStmt("select id_infores, type_infores 		".
																	" from						    ".
        													$nom_table);

        $result = $this->db->queryF($sql->requete); 
        
        while ($myrow = $this->db->fetchArray($result)) 
        {
        	if ( ! $this->addInfo($myrow['id_infores'], $idres, 
        	($myrow['type_infores']=='TEXTAREA'?$myts->oopsAddSlashes($data[$myrow['id_infores']]):$data[$myrow['id_infores']]) ))
        	{
        		$this->delAllInfo($idres);
        	  return false;
        	}

    	  }
    	  
    	  return true;
    }
    
    // Mettre à jour toutes les informations
    function updateAllInfo($data, $idres)
    {
    		//print_r($data);
    		//echo($idres);
    	
    		$myts =	&MyTextSanitizer::getInstance();
    	
    	  $nom_table = $this->db->prefix('resman_infores');
        
        $sql = new ResManagerStmt("select id_infores, type_infores 		".
																	" from						    ".
        													$nom_table);

        $result = $this->db->queryF($sql->requete); 
        
        while ($myrow = $this->db->fetchArray($result)) 
        {
        	if ( ! $this->updateInfo($myrow['id_infores'], $idres, 
        	($myrow['type_infores']=='TEXTAREA'?$myts->oopsAddSlashes($data[$myrow['id_infores']]):$data[$myrow['id_infores']]) ))
        	{
        		if ( ! $this->addInfo($myrow['id_infores'], $idres, 
        	  ($myrow['type_infores']=='TEXTAREA'?$myts->oopsAddSlashes($data[$myrow['id_infores']]):$data[$myrow['id_infores']]) ))
        	  {
        		  $this->delAllInfo($idres);
        	    return false;
        	  }
        	}
        	
        	
    	  }
    	  
    	  return true;
    }         
    
    // Vider toutes les valeurs
    function delAllInfo($idres)
    {
    	  $nom_table = $this->db->prefix('resman_val_infores');
        
        $sql = new ResManagerStmt("delete from      		".
        													$nom_table.
        													" where id_res = ? ");
        
				if (!$result = $this->db->queryF($sql->bindParamVar("i", $idres ))) 
      	{
            // Req Ko
            return false;
      	} 

      	return true;        													
    }         
    
    // Sélectionner les informations dans la base
    function getAllInfo($idres)
    {

        $nom_table = $this->db->prefix('resman_val_infores');
        $nom_table2 = $this->db->prefix('resman_infores');
        
        $sql = new ResManagerStmt("select info.id_infores, 		".
        													" lib_infores,          ".
        													" val, 					".
        													" info.type_infores ".
																	" from						".
        													$nom_table." valinfo, ".$nom_table2." info ".
        													"where info.id_infores = valinfo.id_infores ".
        													" and valinfo.id_res = ".$idres );

        $result = $this->db->queryF($sql->requete); 
        
        // boucle sur le tableau de résultat
        $tab_res = array();

        while ($myrow = $this->db->fetchArray($result)) 
        {
					$tab_res[] = $myrow;        
        } 
				
        return $tab_res;
    }    

}
 
}

?>
