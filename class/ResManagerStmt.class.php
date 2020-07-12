<?php
  if ( !defined("RESMANAGER_CLASS_STMT") ) {
	define("RESMANAGER_CLASS_STMT",1);

			Class ResManagerStmt
			{
			
			  // Requete
			  var $requete = null;
			  
		
			  // Prepare requete
			  function ResManagerStmt($prepString)
			  {
			    // echo $prepString;
			    $this->requete = $prepString;
			  }
			
			  // Bind paramaetre avec variables
			  // Variable 1 			=> format
			  // Variables >= 2   => valeurs
			  function bindParamVar()
			  { 
			  
			    $reqTemp = $this->requete; // On conserve le modele de requete
					
					// balayage des paramètres								    
			    for ($i=0;$i < func_num_args(); $i++)
			    {
			    
  		      if ( $i == 0 ) $typage = func_get_arg($i); // Typage
			      else
			      {
			        $val     = func_get_arg($i);
			        $reqTemp = substr($reqTemp,0, strpos($reqTemp,"?") ).($typage[$i-1]=="s"?"'":"").$val.($typage[$i-1]=="s"?"'":"").substr($reqTemp,strpos($reqTemp,"?")+1);
			        // Remplacement de ?
			        
			      }			      
			    }
			  

			  return $reqTemp;
			  
				}
				
        // Bind parametre avec tableau
			  // indice 0      => format
			  // indice >= 1   => valeurs
			  function bindParamTab($tabParam)
			  { 
			  
			    $reqTemp = $this->requete; // On conserve le modele de requete
					
					// balayage des paramètres								    
			    for ($i=0;$i < count($tabParam); $i++)
			    {
			    
  		      if ( $i == 0 ) $typage = $tabParam[$i]; // Typage
			      else
			      {
			        $val     = $tabParam[$i];
			        $reqTemp = substr($reqTemp,0, strpos($reqTemp,"?") )."'".$val."'".substr($reqTemp,strpos($reqTemp,"?")+1);
			        // Remplacement de ?
			        // A faire gérer les formats
			        
			      }			      
			    }
			  
			  return $reqTemp;
			  
				}
		}						
}	      
?>
