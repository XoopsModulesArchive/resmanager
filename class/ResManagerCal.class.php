  <?php
  if ( !defined("RESMANAGER_CLASS_CAL") ) {
	define("RESMANAGER_CLASS_CAL",1);

  require_once "ResManagerStmt.class.php";
  	
  Class ResManagerCal
  {
  			
  var $id_reserv;
  var $open_sem;
  var $min_res;
  var $date_deb;
  var $date_fin;
  var $date_deb_f;								// date début formatée
  var $date_fin_f;								// date fin formatée
  
  var $heure_deb_lun;
  var $heure_fin_lun;
  var $heure_deb_mar;
  var $heure_fin_mar;
  var $heure_deb_mer;
  var $heure_fin_mer;
  var $heure_deb_jeu;
  var $heure_fin_jeu;
  var $heure_deb_ven;
  var $heure_fin_ven;
  var $heure_deb_sam;
  var $heure_fin_sam;
  var $heure_deb_dim;
  var $heure_fin_dim;
  
	
  var $db;										// base de donnée
  		
  // Constructeur
  function ResManagerCal($base)
  {
    $this->db 			= $base;
  }
  			  
  // Ajouter une categorie
  function addCal()
  {
   	 $nom_table	= $this->db->prefix('resman_cal');
	 
	 $this->date_deb = toTimestamp('-', $this->date_deb_f);
 	 $this->date_fin = toTimestamp('-', $this->date_fin_f);
	 
     $sql = new ResManagerStmt("insert into ".$nom_table.
		 													 "(id_reserv_cal, 					".
															 " date_deb_cal,	 					".
															 " date_fin_cal,	 					".															 
															 " open_sem_cal,	 					".
															 " min_res_cal,							".
															 " heure_deb_lun,								".
															 " heure_fin_lun, 							".																		
															 " heure_deb_mar,								".
															 " heure_fin_mar, 							".																		
															 " heure_deb_mer,								".
															 " heure_fin_mer, 							".																		
															 " heure_deb_jeu,								".
															 " heure_fin_jeu, 							".																		
															 " heure_deb_ven,								".
															 " heure_fin_ven, 							".																		
															 " heure_deb_sam,								".
															 " heure_fin_sam, 							".																		
															 " heure_deb_dim,								".
															 " heure_fin_dim ) 							".																		
															 " values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
     
     
     if (!$result = $this->db->queryF($sql->bindParamVar("isssiiiiiiiiiiiiiii",$this->id_reserv, $this->date_deb,
	 																				 $this->date_fin,
	 																				 $this->open_sem,
																					 $this->min_res,
																					 $this->heure_deb_lun,
																					 $this->heure_fin_lun,
																					 $this->heure_deb_mar,
																					 $this->heure_fin_mar,
																					 $this->heure_deb_mer,
																					 $this->heure_fin_mer,
																					 $this->heure_deb_jeu,
																					 $this->heure_fin_jeu,
																					 $this->heure_deb_ven,
																					 $this->heure_fin_ven,
																					 $this->heure_deb_sam,
																					 $this->heure_fin_sam,
																					 $this->heure_deb_dim,
																					 $this->heure_fin_dim																					 																					 																					 																					 																					 																					 																					
																					 )) ) 
		 {
		 		// Req Ko
				return false;
		 }
		 
		 // id categorie
		 return  true;
  }
  
  // Mettre à jour le calendrier
  function updateCal()
  {
   	 $nom_table	= $this->db->prefix('resman_cal');
	 
 	 $this->date_deb = toTimestamp('-', $this->date_deb_f);
 	 $this->date_fin = toTimestamp('-', $this->date_fin_f);
	 
     $sql = new ResManagerStmt("update ".$nom_table.
		                           " set open_sem_cal  = ?,		".
								   							 "     date_deb_cal = ?,        ".
															 "     date_fin_cal = ?,			".
															 " heure_deb_lun = ?,								".
															 " heure_fin_lun = ?, 							".																		
															 " heure_deb_mar = ?,								".
															 " heure_fin_mar = ?, 							".																		
															 " heure_deb_mer = ?,								".
															 " heure_fin_mer = ?, 							".																		
															 " heure_deb_jeu = ?,								".
															 " heure_fin_jeu = ?, 							".																		
															 " heure_deb_ven = ?,								".
															 " heure_fin_ven = ?, 							".																		
															 " heure_deb_sam = ?,								".
															 " heure_fin_sam = ?, 							".																		
															 " heure_deb_dim = ?,								".
															 " heure_fin_dim = ? 							".
															 "    where id_reserv_cal = ?");
     
       
     if (!$result = $this->db->queryF($sql->bindParamVar("sssiiiiiiiiiiiiiii",			$this->open_sem,
	 																		$this->date_deb,
		 																	$this->date_fin,
															 				$this->heure_deb_lun,
															 				$this->heure_fin_lun,																
															 				$this->heure_deb_mar,
															 				$this->heure_fin_mar,																
															 				$this->heure_deb_mer,
															 				$this->heure_fin_mer,																
															 				$this->heure_deb_jeu,
															 				$this->heure_fin_jeu,																
															 				$this->heure_deb_ven,
															 				$this->heure_fin_ven,																
															 				$this->heure_deb_sam,
															 				$this->heure_fin_sam,																
															 				$this->heure_deb_dim,
															 				$this->heure_fin_dim, 																	
																			$this->id_reserv)) ) 
		 {
		 		// Req Ko
		 		
				return false;
		 }
		 
		 return  true;
  
  }
  
  // Supp un calendrier
  function suppCal()
  {
   	 $nom_table	= $this->db->prefix('resman_cal');
     $sql = new ResManagerStmt("delete from ".$nom_table." where id_reserv_cal = ?");
     
       
     if (!$result = $this->db->queryF($sql->bindParamVar("i", $this->id_reserv)) ) 
		 {
		 		// Req Ko
		 		
				return false;
		 }
		 
		 return  true;
	}
	
	// Lire un calendrier
	// lit les heures fin et début pour une journée passé en paramètre
  function getCal($dow)
  {
  	
		 global $tab_suff_jour;
		  
   	 $nom_table	= $this->db->prefix('resman_cal');
     $sql = new ResManagerStmt("select open_sem_cal, 	".
	 						   " date_deb_cal, ".
							   " date_fin_cal, ".
		 													 "	     min_res_cal, 	".
		 													 "       heure_deb_".$tab_suff_jour[$dow]." as heure_deb_cal, ".
		 													 "       heure_fin_".$tab_suff_jour[$dow]." as heure_fin_cal ".		 													 
															 " from ".$nom_table." where id_reserv_cal = ?");
     
     $result = $this->db->queryF($sql->bindParamVar("i", $this->id_reserv));
     
     if ( $this->db->getRowsNum($result) == 1 )
		 {
		    // Recuperation des valeurs
		 		$row = $this->db->fetchArray($result);
		 		$this->open_sem 					= $row['open_sem_cal'];
		 		$this->min_res 						= $row['min_res_cal'];
		 		$this->heure_deb 					= $row['heure_deb_cal'];
		 		$this->heure_fin 					= $row['heure_fin_cal'];				 		 		
		 		$this->date_deb 					= $row['date_deb_cal'];				 		 		
		 		$this->date_fin 					= $row['date_fin_cal'];				 		 		
				return true;
		 }
		 else
		 {
		     // Req Ko
				 
				 return  false;
		 
		 }
	}
	
	// Lire un calendrier
  function getCalAllHour()
  {
  	
   	 $nom_table	= $this->db->prefix('resman_cal');
     $sql = new ResManagerStmt("select open_sem_cal, 	".
	 						   " date_deb_cal, ".
							   " date_fin_cal, ".
								 "	     min_res_cal, 	 ".
								 "       heure_deb_lun,  ".
								 "       heure_fin_lun,  ".
								 "       heure_deb_mar,  ".
								 "       heure_fin_mar,  ".
								 "       heure_deb_mer,  ".
								 "       heure_fin_mer,  ".
								 "       heure_deb_jeu,  ".
								 "       heure_fin_jeu,  ".
								 "       heure_deb_ven,  ".
								 "       heure_fin_ven,  ".
								 "       heure_deb_sam,  ".
								 "       heure_fin_sam,  ".
								 "       heure_deb_dim,  ".
								 "       heure_fin_dim   ".
								 " from ".$nom_table." where id_reserv_cal = ?");
     
     $result = $this->db->queryF($sql->bindParamVar("i", $this->id_reserv));
     
     if ( $this->db->getRowsNum($result) == 1 )
		 {
		    // Recuperation des valeurs
		 		$row = $this->db->fetchArray($result);
		 		$this->open_sem 							= $row['open_sem_cal'];
		 		$this->min_res 								= $row['min_res_cal'];
		 		$this->date_deb 							= $row['date_deb_cal'];				 		 		
		 		$this->date_fin 							= $row['date_fin_cal'];				 		 		
		 		$this->heure_deb_lun 					= $row['heure_deb_lun'];
		 		$this->heure_fin_lun 					= $row['heure_fin_lun'];		 		
		 		$this->heure_deb_mar 					= $row['heure_deb_mar'];
		 		$this->heure_fin_mar 					= $row['heure_fin_mar'];		 		
		 		$this->heure_deb_mer 					= $row['heure_deb_mer'];
		 		$this->heure_fin_mer 					= $row['heure_fin_mer'];		 		
		 		$this->heure_deb_jeu 					= $row['heure_deb_jeu'];
		 		$this->heure_fin_jeu 					= $row['heure_fin_jeu'];		 		
		 		$this->heure_deb_ven 					= $row['heure_deb_ven'];
		 		$this->heure_fin_ven 					= $row['heure_fin_ven'];		 		
		 		$this->heure_deb_sam 					= $row['heure_deb_sam'];
		 		$this->heure_fin_sam 					= $row['heure_fin_sam'];		 		
		 		$this->heure_deb_dim 					= $row['heure_deb_dim'];
		 		$this->heure_fin_dim 					= $row['heure_fin_dim'];		 		

        $this->date_deb_f             = TimestampToIso($row['date_deb_cal']);
        $this->date_fin_f             = TimestampToIso($row['date_fin_cal']);
        
				return true;
		 }
		 else
		 {
		     // Req Ko
				 
				 return  false;
		 
		 }
	}	
	
	// Lire toutes les catégories
  function getAllCal()
  {
   	 $nom_table	= $this->db->prefix('resman_cal');
   	 
     $sql = new ResManagerStmt("select open_sem_cal, 	".
	 							" date_deb_cal, ".
								" date_fin_cal, ".
		 													 "	     min_res_cal, 	".
		 													 "       heure_deb_cal, ".
		 													 "       heure_fin_cal	".
															 " from ".$nom_table);   	 
     
         
     $result = $this->db->queryF($sql->requete);
     
     // boucle sur le tableau de résultat
     $tab_res	= array();
     
		 while ( $myrow = $this->db->fetchRow($result) ) 
		 {
		   		$tab_res[]['open_sem'] 						= $row['open_sem_cal'];
		 		$tab_res[]['min_res'] 						= $row['min_res_cal'];
		 		$tab_res[]['heure_deb'] 					= $row['heure_deb_cal'];
		 		$tab_res[]['heure_fin'] 					= $row['heure_fin_cal'];
		 		$tab_res[]['date_deb'] 						= $row['date_deb_cal'];
		 		$tab_res[]['date_fin'] 						= $row['date_fin_cal'];				
     }
     
     return $tab_res;
    
	}
	
	// Retourne un tableau des sélectionnés
	function getOpensem()
	{
	
	  $tab = array();
	  
  
	  for($i=0; $i < 7 ;$i++)
	  {
			if ( substr($this->open_sem,$i,1) == 1 )
			  $tab[]=$i;
	  
	  }
	  
	  return $tab;
	}
	
	// Initialise open_sem
	function setOpensem($sel)
	{
	
	  $tab = array();
	  $this->open_sem = "0000000";
	  
	  for($i=0;$i<count($sel);$i++)
	  {
			$this->open_sem[$sel[$i]] = "1";
	  
	  }
	  
	  return $tab;
	
	
	}
	
	// Contrôle si journée ouverte ou non
	function isOpen($day)
	{

	  if ( substr($this->open_sem, $day, 1) == 1 )
	    return true;
	  else
	    return false;
	}
	
	  // Contrôle la saisie des paramètres calendriers
  function checkSaisie()
  {
  	// Tableau des erreurs
		$error = array();
		$date_ko = 0;

  	// format date ouverture
  	$date_deb_f = explode('-',$this->date_deb_f);
  	if ( ! checkDate( $date_deb_f[1], $date_deb_f[2], $date_deb_f[0]) )
  	{
  	  $error[]= _MD_FORMAT_DATE_KO. ' : '._MD_OPENRES;
  	  $date_ko++;
  	}
  	
		// format date fermeture
  	$date_fin_f = explode('-',$this->date_fin_f);
  	if ( ! checkDate( $date_fin_f[1], $date_fin_f[2], $date_fin_f[0]) )
  	{
  	  $error[]= _MD_FORMAT_DATE_KO. ' : '._MD_CLOSERES;
  	  $date_ko++;
    }
    
		// date clôture > date ouverture
  	if ( $date_ko == 0 )
  	{
       $date_deb_t = toTimestamp('-', $this->date_deb_f);
 	     $date_fin_t = toTimestamp('-', $this->date_fin_f);
    
  	  // if ( $this->date_deb_f >= $this->date_fin_f)
  	  if ( $date_deb_t >= $date_fin_t)
	    $error[]= _MD_OPEN_SUP_CLOSE;
    }
      	
  	// Concordance des heures
  	// TODO Tester les heures de toutes les journées
  	/*if ( $this->heure_deb >= $this->heure_fin  )
  	{
  	  $error[]= _MD_HEURE_FIN_ERROR;
  	}*/
  	
    return $error;


	
	
  }     	
}
}	
?>
